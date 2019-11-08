<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantsController extends Controller
{
        public function index(){
            return view('tenants')
        }
}
