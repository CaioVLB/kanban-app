<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
class ClientController extends Controller
{
  public function index(): View
  {
    return view('client.client');
  }

  public function show(int $id): View
  {
    return view('client.client-dashboard', compact('id'));
  }
}
