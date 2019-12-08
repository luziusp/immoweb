<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Billing extends Model
{

    protected $table = 'invoice';

    protected $fillable =['contractFk', 'type', 'amount', 'dueDate', 'isPayed', 'isActive'];


    public function contracts()
    {
      return $this->belongsTo('App\Contracts', 'id');
    }


    public static function getAllOpenInvoices(){
        $openInvoices = DB::table('invoice')->where('isPayed',  false)->where('isActive',  true)->get();
        return $openInvoices;
    }
    public static function getAllPayedInvoices(){
        $openInvoices = DB::table('invoice')->where('isPayed',  true)->where('isActive',  true)->get();
        return $openInvoices;
    }

    public static function getAllInvoices(){
        $openInvoices = DB::table('invoice')->where('isActive',  true)->get();
        return $openInvoices;
    }

    public static function getAllYearlyInvoices(){
        $yearlyInvoices = DB::table('invoice')->whereBetween('created_at',  [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
            ])
            ->whereBetween('dueDate',  [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
                ])
            ;




        return $yearlyInvoices;
    }

   public static function find($id){
    $billing = DB::table('invoice')->where('id',  $id)->get();
    return $billing;

   }



        public static function deleteBilling($id){
        DB::table('invoice')->where('id', '=', $id)->update(['isActive' => false]);

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
