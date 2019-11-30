<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts;

class ContractsController extends Controller
{
       public function index(){
        $contracts = Contracts::getAll();

               return view('pages/contracts.index', ['contracts' => $contracts]);

       }


}
