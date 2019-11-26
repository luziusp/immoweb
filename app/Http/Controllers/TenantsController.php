<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tenants;

class TenantsController extends Controller
{
        public function index(){
                        $tenants = DB::table('tenant')->where('isActive',  true)->get();;

                               return view('tenants', ['tenant' => $tenant]);

        }


}
