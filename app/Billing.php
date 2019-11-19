<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Billing extends Model
{
    public function addBilling($contractFk, $type, $amount, $dueDate){
        $id = DB::table('invoice')->insertGetId(

         ['contractFk' => $contractFk],
         ['type' => $type],
         ['isActive' => true],
         ['amount' => $amount],
         ['dueDate' => $dueDate],
         ['isPayed' => false]

         );

    }

        public function deleteBilling($id){
        DB::table('invoice')->where('id', '=', $id)->update(['isActive' => false]);

        }

        public function updateBilling($id, $contractFk, $type, $amount, $dueDate, $isPayed){
                             DB::table('invoice')
                                         ->where('id', $id)
                                         ->update(
                                            ['contractFk' => $contractFk],
                                            ['type' => $type],
                                            ['isActive' => true],
                                            ['amount' => $amount],
                                            ['dueDate' => $dueDate],
                                            ['isPayed' => $isPayed]

        );
        }

        public function payBilling($id){
            DB::table('invoice')
                        ->where('id', $id)
                        ->update(
                           
                           ['isPayed' => true]

);
}
public function reopenBilling($id){
    DB::table('invoice')
                ->where('id', $id)
                ->update(
                   
                   ['isPayed' => false]

);
}

}
