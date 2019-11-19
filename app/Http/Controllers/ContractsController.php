<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractsController extends Controller
{
       public function index(){
        $contracts = DB::table('contract')->where('isActive',  true)->get();

               return view('contracts', ['contracts' => $contracts]);

       }


}
