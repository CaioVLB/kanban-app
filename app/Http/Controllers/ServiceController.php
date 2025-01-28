<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
  public function __construct(
    protected Service $service,
    protected Category $category
  ){}


  public function index(int $category_id): View
  {
    $services = $this->service->with('category:id,name')
      ->select('id', 'name', 'price', 'is_active')
      ->where('category_id', $category_id)
      ->orderByDesc('id')
      ->get();

    $category = $this->category->select('id', 'name')
      ->find($category_id);

    return view('service.service', compact('services', 'category'));
  }

  public function store(ServiceRequest $request, int $category_id): RedirectResponse
  {
    try {
      $data = $request->validated();

      $this->service->create([
        'name' => $data['service'],
        'price' => $data['price'],
        'is_active' => true,
        'category_id' => $category_id,
      ]);

      return redirect()->back()->with('success', 'Serviço cadastrado com sucesso!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema no cadastramento do serviço. Tente novamente!']);
    }
  }

  public function update(ServiceRequest $request, int $id): RedirectResponse
  {
    try {
      $data = $request->validated();

      $service = $this->service->findOrFail($id);

      $service->update([
        'name' => $data['service'],
        'price' => $data['price'],
      ]);

      return redirect()->back()->with('success', 'Serviço atualizado com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['error' => 'Serviço não encontrado!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na atualização do Serviço. Tente novamente!']);
    }
  }

  public function modifyStatus(int $id): JsonResponse
  {
    try {
      $category = $this->service->findOrFail($id);

      $category->is_active = !$category->is_active;

      $category->save();

      return response()->json(['success' => 'Disponibilidade alterada!'], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Não foi possível alterar a disponibilidade do Serviço. Tente novamente!'], 500);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      $this->service->findOrFail($id)->delete();

      return redirect()->back()->with('success', 'Serviço excluído com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['error' => 'Serviço não encontrado!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do serviço. Tente novamente!']);
    }
  }
}
