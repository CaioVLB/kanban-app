<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class DashboardController extends Controller
{
  public function __construct(
    protected Board $board,
    protected Client $client
  ){}

  public function dashboard(): View
  {
    $showPasswordChange = false;

    if (auth()->check() && Hash::check('password', auth()->user()->password)) {
      $showPasswordChange = true;
    }

    $boards = $this->board->select('id', 'title')->get();
    $clients_count = $this->client->count();

    return view('dashboard.dashboard', compact('boards', 'clients_count', 'showPasswordChange'));
  }
}
