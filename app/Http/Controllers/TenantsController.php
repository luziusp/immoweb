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

        public function show($id)
          {
            $tenant = Tenants::find($id);
            return view('pages.tenants.show', ['tenant' => $tenant]);
          }

        public function create()
          {
            return view('pages.tenants.create');
          }

         
          public function delete($id)
          {
            Tenants::deleteTenant($id);
            $tenants = Tenants::getAll();

            return view('pages.tenants.index', ['tenants' => $tenants]);
          }

}
