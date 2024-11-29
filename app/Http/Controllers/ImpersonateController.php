<?php

namespace App\Http\Controllers;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
{
  public function impersonate($user_id)
  {
    if (auth()->user()->profile_id === ProfileEnum::ADMIN) {
      $adminId = auth()->user()->id;
      session()->put('impersonate', $adminId);

      auth()->loginUsingId($user_id);

      return redirect()->route('dashboard');
    }
  }

  public function leaveImpersonating()
  {
    if (!session()->has('impersonate')) {
      abort(403);
    }

    session()->remove('company_id');
    auth()->loginUsingId(session()->get('impersonate'));
    session()->remove('impersonate');

    return redirect()->route('dashboard');
  }
}
