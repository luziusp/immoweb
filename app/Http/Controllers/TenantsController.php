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

          public function edit()
            {
              return view('pages.tenants.edit');
            }


          public function destroy($id)
          {
            Tenants::deleteTenant($id);
            $tenants = Tenants::getAll();

            return view('pages.tenants.index', ['tenants' =>  $tenants]);
          }

public function update (request $request, $id){
  $data = request()->except(['_token', '_method', 'id']);

  Tenants::whereId($id)->update($data);
 
  return back();
}
            public function store (request $request){
         
 
             Tenants::create($request->all());
              return back();
  
            }
          
}
