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
    public function show($id)
      {
        $billing = Billing::find($id);
        return view('pages.billing.show', ['openInvoice' => $openInvoice]);
      }

    public function create()
      {
        return view('pages.billing.create');
      }
      public function delete($id)
      {
        Billing::deleteBilling($id);
        $openInvoices = Billing::getAllOpenInvoices();
        return view('pages/billing.index', ['openInvoices' => $openInvoices]);
      }


}
