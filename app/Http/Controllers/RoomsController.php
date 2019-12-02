<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rooms;

class RoomsController extends Controller
{
        public function index(){
                $rooms = Rooms::getAll();

                       return view('pages.rooms.index', ['rooms' => $rooms]);
        }

        public function show()
          {
            return view('pages.rooms.show');
          }

        public function create()
          {
            return view('pages.rooms.create');
          }


}
