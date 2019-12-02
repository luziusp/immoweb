<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Billing extends Model
{

    protected $table = 'invoice';

    public static function getAllOpenInvoices(){
        $openInvoices = DB::table('invoice')->where('isPayed',  false)->get();
        return $openInvoices;
    }
    public static function getAllClosedInvoices(){
        $openInvoices = DB::table('invoice')->where('isPayed',  true)->get();
        return $openInvoices;
    }

   public static function find($id){
    $billing = DB::table('invoice')->where('id',  $id)->get();
    return $billing;

   }

    public static function add($contractFk, $type, $amount, $dueDate){
        $id = DB::table('invoice')->insertGetId(

         ['contractFk' => $contractFk],
         ['type' => $type],
         ['isActive' => true],
         ['amount' => $amount],
         ['dueDate' => $dueDate],
         ['isPayed' => false]

         );

    }

        public static function delete($id){
        DB::table('invoice')->where('id', '=', $id)->update(['isActive' => false]);

        }

        public static function update($id, $contractFk, $type, $amount, $dueDate, $isPayed){
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

        public function pay($id){
            DB::table('invoice')
                        ->where('id', $id)
                        ->update(

                           ['isPayed' => true]

);
}
public function reopen($id){
    DB::table('invoice')
                ->where('id', $id)
                ->update(

                   ['isPayed' => false]

);
}

}
