<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\View\View;

class DashboardController extends Controller {
  public function dashboard(): View
  {
    $boards = Board::all();
    return view('dashboard.dashboard', compact('boards'));
  }
}
