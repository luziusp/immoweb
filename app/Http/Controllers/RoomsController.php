<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rooms;

class RoomsController extends Controller
{
        public function index(){
                $rooms = Rooms:: getAll();

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

          public function destroy($id)
          {
            Rooms::deleteRoom($id);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' => $rooms]);

        
          }
/*
          public function updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
            Rooms::updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' => $rooms]);
          }
<<<<<<< HEAD

          public function createNewRoom($appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
            Rooms::addRooms($appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' => $rooms]);
=======
*/
          public function update (request $request, $id){

          }
          public function store (request $request){
           /*
            Rooms::addRooms(
              $request->appartmentName, 
              $request->noOfRooms, 
              $request->squareMeters, 
              $request->Description, 
              $request->rentCost, 
              $request->additionalCost
            );
            return back();
            */
            return $request->all();
            
>>>>>>> 584b15c5f55b2591cab5d21da9e4b9dfa0d6c375
          }



}
