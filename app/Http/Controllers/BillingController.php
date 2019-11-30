<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Billing;

class BillingController extends Controller
{
    public function index(){

                    $openInvoices = Billing::getAllOpenInvoices();
                   return view('pages/billing.index', ['openInvoices' => $openInvoices]);

    }


}
