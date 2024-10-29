<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller {
  public function dashboard(): View
  {
    return view('dashboard');
  }
}
