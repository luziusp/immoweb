<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rooms extends Model
{

  protected $table = 'appartment';
  public static function find($id){
    $room = DB::table('appartment')->where('id',  $id)->get();
    return $room;

   }
   public static function getAll(){
    $rooms = DB::table('appartment')->where('isActive',  true)->get();;
    return $rooms;
   }
  
    public static function add($appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
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
        public static function delete($id){
        DB::table('appartment')->where('id', '=', $id)->update(['isActive' => false]);

        }
        public static function update($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
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
