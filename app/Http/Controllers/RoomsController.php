<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
        public function index(){
                $rooms = DB::table('appartment')->where('isActive',  true)->get();;

                       return view('rooms', ['rooms' => $rooms]);
        }

       

}
