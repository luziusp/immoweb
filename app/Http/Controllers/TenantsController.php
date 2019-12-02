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

        public function show()
          {
            return view('pages.tenants.show');
          }

        public function create()
          {
            return view('pages.tenants.create');
          }

          public function store(Request $request)
          {
              $tenant = new tenant();
              $this->validateAndSave($request, $tenant);
              return redirect('tenants')->with('status', 'Mieter erstellt');
          }
          public function edit(Tenant $tenant)
          {

              return view('pages.tenants.edit')
                  ->with('tenant', $tenant);

          }
          public function destroy(Tenant $tenant)
          {
            $tenant->delete();
            return redirect('tenants')->with('status', 'Mieter gelöscht');
          }

}
