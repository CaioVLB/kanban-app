<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

  public function index(): View
  {
    return view('');
  }
  /**
   * Display the registration view.
   */
  public function create(): View
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'company_name' => ['required', 'string', 'max:255'],
      'hire_date' => ['required', 'date'],
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'max:14'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    try {
      DB::beginTransaction();

      $company = Company::create([
        'name' => $request->company_name,
        'hire_date' => $request->hire_date,
        'active' => true
      ]);

      $user = User::create([
        'name' => $request->name,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'company_id' => $company->id,
        'profile_id' => ProfileEnum::MANAGER,
      ]);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      return redirect()->back()->withErrors(["error" => 'Ocorreu problema no cadastramento da empresa']);
    }

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
  }
}
