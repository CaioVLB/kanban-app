<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{

  public function __construct(
    protected Category $category
  ){}

  public function index(): View
  {
    $categories = $this->category->withCount('services')
      ->orderByDesc('id')
      ->get();

    return view('category.category', compact('categories'));
  }

  public function store(CategoryRequest $request): RedirectResponse
  {
    try {
      $this->category->create([
        'name' => $request->category,
        'is_active' => true
      ]);

      return redirect()->back()->with('success', 'Categoria cadastrada com sucesso!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema no cadastramento da categoria. Tente novamente!']);
    }
  }

  public function update(CategoryRequest $request, int $id): RedirectResponse
  {
    try {
      $data = $request->validated();

      $category = $this->category->findOrFail($id);

      $category->update(['name' => $data['category']]);

      return redirect()->back()->with('success', 'Categoria atualizada com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->with('success', 'Categoria não encontrada!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na atualização da categoria. Tente novamente!']);
    }
  }

  public function modifyStatus(int $id): JsonResponse
  {
    try {
      $category = $this->category->findOrFail($id);

      $category->is_active = !$category->is_active;

      $category->save();

      return response()->json(['success' => 'Disponibilidade alterada!'], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Não foi possível alterar a disponibilidade da especialidade. Tente novamente!'], 500);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      $category = $this->category->findOrFail($id);

      if ($category->services->isNotEmpty()) {
        return redirect()->back()->withErrors(['error' => 'Não é possível excluir esta especialidade porque há serviços vinculados a ela. Por favor, exclua ou desvincule os serviços antes de tentar novamente.']);
      }

      $category->delete();

      return redirect()->back()->with('success', 'Categoria excluída com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->with('error', 'Categoria não encontrada!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão da categoria. Tente novamente!']);
    }
  }
}
