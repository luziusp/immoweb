<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class billingController extends Controller
{
    public function index(){

            $openInvoices = DB::table('invoice')->where('isPayed',  false)->get();
            $invoiceAddresses = DB::table('billing_address')->get();

                   return view('billing', ['openInvoices' => $openInvoices]);

    }

    
}
