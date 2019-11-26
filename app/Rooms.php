<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rooms extends Model
{

  public function find($id){
    $room = DB::table('appartment')->where('id',  $id)->get();
    return $room;

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
