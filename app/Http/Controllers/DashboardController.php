<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class DashboardController extends Controller
{
  public function __construct(
    protected Board $board
  ){}

  public function dashboard(): View
  {
    $showPasswordChange = false;

    if (auth()->check() && Hash::check('password', auth()->user()->password)) {
      $showPasswordChange = true;
    }

    $boards = $this->board->select('id', 'title')->get();

    return view('dashboard.dashboard', compact('boards', 'showPasswordChange'));
  }
}
