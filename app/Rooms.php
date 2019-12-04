<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rooms extends Model
{

  protected $table = 'appartment';

  protected $fillable =['appartmentName', 'noOfRooms', 'squareMeters', 'Description', 'rentCost', 'additionalCost', 'additionalCost'];

  //Defining relationship to contract
  public function contract()
  {
    return $this->hasOne('App\Contracts', 'contractFk');
  }






  public static function find($id){
    $room = DB::table('appartment')->where('id',  $id)->get();
    return $room;

   }
   public static function getAll(){
    $rooms = DB::table('appartment')->where('isActive',  true)->get();;
    return $rooms;
   }
  /*
    public static function addRooms($appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
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
*/
        public function store(Request $request)
        {

         // Rooms::create($request->all());
            // Validate the request...
    
            
            $room = new Rooms;
    
            $room->appartmentName = $request->appartmentName;
            $room->noOfRooms = $request->noOfRooms;
            $room->squareMeters = $request->squareMeters;
            $room->Description = $request->Description;
            $room->rentCost = $request->rentCost;
            $room->additionalCost = $request->additionalCost;

            $room->isActive = true;


            $room->save();
            
        }

        public function update(array $attributes = array(), array $options = array())
        {
            // Validate the request...
    
            $room = App\Rooms::find($attributes->id);
    
            $room->appartmentName = $values->appartmentName;
            $room->noOfRooms = $values->noOfRooms;
            $room->squareMeters = $values->squareMeters;
            $room->Description = $values->Description;
            $room->rentCost = $values->rentCost;
            $room->additionalCost = $values->additionalCost;

            $room->isActive = true;


            $room->save();
        }


        public static function deleteRoom($id){
        DB::table('appartment')->where('id', '=', $id)->update(['isActive' => false]);

        }
        public static function updateRoom($id, $appartmentName, $noOfRooms, $squareMeters, $Description, $rentCost, $additionalCost){
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
