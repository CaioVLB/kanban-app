<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Models\Board;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class BoardController extends Controller
{
  //public function __construct()

  public function store(BoardRequest $request)
  {
    try {
      $validated = $request->validated();

      $data = [
        'owner_id' => 2,
        'title' => $validated['title'],
        'description' => $validated['description'],
      ];

      $board = Board::create($data);

      return response()->json([
        'success' => 'Quadro criado com sucesso',
        'board_created' => [
          'id' => $board->id,
          //'owner_id' => $board->owner_id,
          'title' => $board->title,
          //'description' => $board->description,
        ]
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'processing_failure' => 'Não foi possível criar o quadro no momento.',
        'exception' => $e->getMessage(),
      ], 500);
    }
  }
}
