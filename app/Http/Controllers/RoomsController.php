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

        public function show($id)
          {
            $room = Rooms::find($id);
            return view('pages.rooms.show', ['room' => $room]);
          }

        public function create()
          {
            return view('pages.rooms.create');
          }

          public function delete($id)
          {
            Rooms::deleteRoom($id);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' => $rooms]);
          }
          public function updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
            Rooms::updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' => $rooms]);
          }



}
