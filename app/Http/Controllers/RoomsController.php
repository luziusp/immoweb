<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
        public function index(){
                $rooms = DB::table('appartment')->where('isActive',  true)->get();;

                       return view('rooms', ['rooms' => $rooms]);
        }

        public function addRoom($appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
        $id = DB::table('appartment')->insertGetId(

         ['appartmentName' => $appartmentName],
         ['noOfRooms' => $noOfRooms],
         ['squareMeters' => $squareMeters],
         ['Description' => $Description],
         ['rentCost' => $rentCost],
         ['additionalCost' => $additionalCost],
         ['isActive' => true]
         );

        }
        public function deleteRoom($id){
        DB::table('appartment')->where('id', '=', $id)->update(['isActive' => false]);

        }
        public function updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
                             DB::table('appartment')
                                         ->where('id', $id)
                                         ->update(

                                           ['appartmentName' => $appartmentName ],
                                           ['noOfRooms' => $noOfRooms],
                                           ['squareMeters' => $squareMeters],
                                           ['Description' => $Description],
                                           ['rentCost' => $rentCost],
                                           ['additionalCost' => $additionalCost]
                                           );
          }

}
