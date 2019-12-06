<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts;
use App\Tenants;

class ContractsController extends Controller
{
       public function index(){
        $contracts = Contracts::getAll();
        $tenants = Tenants::getAll();
               return view('pages/contracts.index', ['contracts' => $contracts], ['tenants' =>  $tenants]);

       }
       public function show($id)
         {
          $contract = Contracts::find($id);
          
           return view('pages.contracts.show', ['contract' => $contract]);
         }

       public function create()
         {
           return view('pages.contracts.create');
         }

         public function destroy($id)
         {
           Contracts::deleteContract($id);
           $contracts = Contracts::getAll();

           return view('pages/contracts.index', ['contracts' => $contracts]);
         }

         public function update (request $request, $id){
          $data = request()->except(['_token', '_method', 'id']);
   
          Contracts::whereId($id)->update($data);
         
          return back();
        }
        public function store (request $request){


          Contracts::create($request->all());
          return back();

        }

         /*
           public  function updateContract($id, $startDate, $tenantMapFk, $appartmentFk){
            Contracts::updateContract($id, $startDate, $tenantMapFk, $appartmentFk);
            $contracts = Contracts::getAll();
 
            return view('pages/contracts.index', ['contracts' => $contracts]);
           }
*/
}
