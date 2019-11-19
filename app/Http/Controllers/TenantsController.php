<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantsController extends Controller
{
        public function index(){
                        $tenants = DB::table('tenant')->where('isActive',  true)->get();;

                               return view('tenants', ['tenant' => $tenant]);

        }


}
