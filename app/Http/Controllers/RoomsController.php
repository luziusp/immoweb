<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rooms;

class RoomsController extends Controller
{
        public function index(){
                $rooms = Rooms::getAll();

                       return view('pages/rooms.show', ['rooms' => $rooms]);
        }

       

}
