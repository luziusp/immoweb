<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contracts extends Model
{
    


    public function addContract($startDate, $terminationDate, $rentPerMonth, $tenantMapFk, $appartmentFk){
        $id = DB::table('contract')->insertGetId(

         ['startDate' => $startDate],
         ['terminationDate' => $terminationDate],
         ['isActive' => true],
         ['rentPerMonth' => $rentPerMonth],
         ['tenantMapFk' => $tenantMapFk],
         ['appartmentFk' => $appartmentFk]

         );

        }

        public function deleteContract($id){
        DB::table('contract')->where('id', '=', $id)->update(['isActive' => false]);

        }

        public function updateContract($id, $startDate, $tenantMapFk, $appartmentFk){
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
