<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Billing;
use App\Contracts;
use PDF;

class BillingController extends Controller
{
    public function index(){
                    $contracts = Contracts::getAll();
                    $openInvoices = Billing::getAllOpenInvoices();
                    $payedInvoices = Billing::getAllPayedInvoices();

                   return view('pages.billing.index', compact('openInvoices', 'payedInvoices', 'contracts'));

    }
    public function show($id)
      {
        $contracts = Contracts::getAll();
        $openInvoice = Billing::find($id);
        return view('pages.billing.show', compact('openInvoice', 'contracts'));
      }

    public function create()
      {

        //$yearlyInvoices = Billing::getAllInvoices();
        //return view('pages.billing.create', compact('yearlyInvoices'));

        $yearlyInvoices = Billing::getAllInvoices();
        $pdf = PDF::loadView('pages.billing.create', compact('yearlyInvoices'));
        return $pdf->download('Gesamtabrechnung.pdf');

      }


      public function destroy($id)
      {
        Billing::deleteBilling($id);
        $contracts = Contracts::getAll();
        $openInvoices = Billing::getAllOpenInvoices();
        $payedInvoices = Billing::getAllPayedInvoices();

        return back(); //('pages.billing.index', compact('openInvoices', 'payedInvoices', 'contracts'));
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
