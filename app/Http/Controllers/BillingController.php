<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Billing;
use App\Contracts;

class BillingController extends Controller
{
    public function index(){
                    $contracts = Contracts::getAll();
                    $openInvoices = Billing::getAllOpenInvoices();
                    $payedInvoices = Billing::getAllPayedInvoices();
                    $yearlyInvoices = Billing::getAllYearlyInvoices();
                   return view('pages.billing.index', compact('openInvoices', 'payedInvoices', 'contracts', 'yearlyInvoices'));

    }
    public function show($id)
      {
        $contracts = Contracts::getAll();
        $openInvoice = Billing::find($id);
        return view('pages.billing.show', compact('openInvoice', 'contracts'));
      }

    public function create()
      {
        $yearlyInvoices = Billing::getAllOpenInvoices();
        //return $yearlyInvoices;
       return view('pages.billing.create', compact('yearlyInvoices'));
      }
      public function destroy($id)
      {
        Billing::deleteBilling($id);
        $contracts = Contracts::getAll();
        $openInvoices = Billing::getAllOpenInvoices();
        $payedInvoices = Billing::getAllPayedInvoices();
        $yearlyInvoices = Billing::getAllYearlyInvoices();
        return back(); //('pages.billing.index', compact('openInvoices', 'payedInvoices', 'contracts', 'yearlyInvoices'));
      }

      public function update (request $request, $id){

        $data = request()->except(['_token', '_method', 'id']);

        Billing::whereId($id)->update($data);

        return back();
      }
      public function store (request $request){


        Billing::create($request->all());
        return back();

      }

}
