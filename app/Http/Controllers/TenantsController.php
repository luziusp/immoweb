<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantsController extends Controller
{
        public function index(){
                        $tenants = DB::table('tenants')->get();

                               return view('tenants', ['tenants' => $tenants]);

        }
}
