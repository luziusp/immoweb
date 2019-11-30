<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tenants;

class TenantsController extends Controller
{
        public function index(){
                        $tenants = Tenants::getAll();

                               return view('pages.tenants.index', ['tenants' => $tenants]);

        }
        public function details(Tenants $tenants)
          {
            return view('pages.tenants.details', compact('tenants'));
}

        public function create(Tenant $tenants){

            return view('pages.tenants.create');

        }

}
