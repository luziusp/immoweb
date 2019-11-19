<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billingController extends Controller
{
    public function index(){

            $openInvoices = DB::table('invoice')->where('isPayed',  false)->get();
            $invoiceAddresses = DB::table('billing_address')->get();

                   return view('billing', ['openInvoices' => $openInvoices]);

    }

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



}
