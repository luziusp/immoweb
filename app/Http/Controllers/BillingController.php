<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Billing;

class BillingController extends Controller
{
    public function index(){

        /*
            $openInvoices = DB::table('invoice')->where('isPayed',  false)->get();
            $invoiceAddresses = DB::table('billing_address')->get();
*/ 

$openInvoices = Billing::getAllOpenInvoices();
                   return view('pages/billing.show', ['openInvoices' => $openInvoices]);

    }

    
}
