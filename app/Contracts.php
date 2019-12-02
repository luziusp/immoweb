<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contracts extends Model
{
    protected $table = 'contract';
    public static function find($id){
        $contract = DB::table('contract')->where('id',  $id)->get();
        return $contract;
    
       }
    
public static function getAll(){
    $contracts = DB::table('contract')->where('isActive',  true)->get();
    return $contracts;
}

    public static function addContract($startDate, $terminationDate, $rentPerMonth, $tenantMapFk, $appartmentFk){
        $id = DB::table('contract')->insertGetId(

         ['startDate' => $startDate],
         ['terminationDate' => $terminationDate],
         ['isActive' => true],
         ['rentPerMonth' => $rentPerMonth],
         ['tenantMapFk' => $tenantMapFk],
         ['appartmentFk' => $appartmentFk]

         );

        }

        public static function deleteContract($id){
        DB::table('contract')->where('id', '=', $id)->update(['isActive' => false]);

        }

        public static function updateContract($id, $startDate, $tenantMapFk, $appartmentFk){
                             DB::table('contract')
                                         ->where('id', $id)
                                         ->update(

         ['startDate' => $startDate ],
         ['terminationDate' => $terminationDate],
         ['rentPerMonth' => $rentPerMonth],
         ['tenantMapFk' => $tenantMapFk],
         ['appartmentFk' => $appartmentFk]

                                           );
          }
}
