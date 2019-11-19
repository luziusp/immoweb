<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractsController extends Controller
{
       public function index(){
        $contracts = DB::table('contract')->get();

               return view('contracts', ['contracts' => $contracts]);

       }
}
