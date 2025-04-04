<?php

namespace App\Http\Controllers;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class CompanyController extends Controller
{
  public function index(): View
  {
    $managersAndTheirCompanies = User::where('profile_id', ProfileEnum::MANAGER)
      ->with('company')->orderBy('id', 'desc')->get();

    return view('company.company-list', compact('managersAndTheirCompanies'));
  }

  public function create(): View
  {
    return view('company.company-create-edit');
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'company_name' => ['required', 'string', 'max:255'],
      'cnpj' => ['nullable', 'string', 'regex:/^[A-Z0-9]{2}\.[A-Z0-9]{3}\.[A-Z0-9]{3}\/[A-Z0-9]{4}-[0-9]{2}$/'],
      'corporate_name' => ['required', 'string', 'max:255'],
      'hire_date' => ['required', 'date'],
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    try {
      DB::transaction(function () use ($request) {
        $company = Company::create([
          'name' => $request->company_name,
          'cnpj' => $request->cnpj,
          'corporate_name' => $request->corporate_name,
          'hire_date' => $request->hire_date,
          'active' => true
        ]);

        $user = $company->users()->create([
          'name' => $request->name,
          'cpf' => $request->cpf,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'profile_id' => ProfileEnum::MANAGER,
          'is_active' => true
        ]);

        if ($request->is_collaborator) {
          $user->collaborators()->create([
            'company_id' => $company->id,
          ]);
        }
      });

      return redirect()->back()->with('success', 'Empresa cadastrada com sucesso!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema no cadastramento da empresa.']);
    }
  }

  public function edit(int $id): View
  {
    $managerAndYourCompany = User::where('id', $id)->with('company')->first();
    return view('company.company-create-edit', compact('managerAndYourCompany'));
  }

  public function update(Request $request, $user_id): RedirectResponse
  {
    $request->validate([
      'company_name' => ['required', 'string', 'max:255'],
      'cnpj' => ['nullable', 'string', 'regex:/^[A-Z0-9]{2}\.[A-Z0-9]{3}\.[A-Z0-9]{3}\/[A-Z0-9]{4}-[0-9]{2}$/'],
      'corporate_name' => ['required', 'string', 'max:255'],
      'hire_date' => ['required', 'date'],
      'status_company' => ['required', 'boolean'],
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user_id)],
      'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
    ]);

    try {
      DB::transaction(function () use ($request, $user_id) {
        $manager = User::findOrFail($user_id);
        $company = $manager->company;

        $company->name = $request->company_name;
        $company->cnpj = $request->cnpj;
        $company->corporate_name = $request->corporate_name;
        $company->hire_date = $request->hire_date;
        $company->active = $request->status_company;

        if ($company->isDirty()) {
          $company->save();
        }

        $manager->name = $request->name;
        $manager->cpf = $request->cpf;
        $manager->email = $request->email;

        // Adicionar a senha somente se fornecida
        if ($request->filled('password')) {
          $manager->password = Hash::make($request->password);
        }

        if ($manager->isDirty()) {
          $manager->save();
        }
      });

      return redirect()->back()->with('success', 'Dados da empresa atualizados com sucesso!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na atualização dos dados da empresa.']);
    }
  }

  public function destroy(int $company_id): RedirectResponse
  {
    try {
      if(auth()->user()->profile_id !== ProfileEnum::ADMIN) {
        abort(403, 'Você não tem permissão para excluir empresas.');
      }

      $company = Company::findOrFail($company_id);

      DB::transaction(function () use ($company) {
        $company->delete();
      });

      return redirect()->back()->with('success', 'Empresa excluída com sucesso!');
    } catch(\Exception $e) {
      return redirect()->back()->withErrors(['error', 'Ocorreu um problema na exclusão da empresa!']);
    }
  }
}
