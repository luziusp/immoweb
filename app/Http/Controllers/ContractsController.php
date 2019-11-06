<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractsController extends Controller
{
       public function index(){
           return view('contracts')
       }
}
