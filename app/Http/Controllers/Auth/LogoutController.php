<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutController extends Controller


{
  public function logout () {

         auth()->logout();

         // redirect to homepage
         return redirect('/');

  }
}
