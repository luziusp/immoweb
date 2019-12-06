<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Billing;

class BillingController extends Controller
{
    public function index(){

                    $openInvoices = Billing::getAllOpenInvoices();
                   return view('pages.billing.index', ['openInvoices' =>  $openInvoices]);

    }
    public function show($id)
      {
        $openInvoice = Billing::find($id);
        return view('pages.billing.show', ['openInvoice' => $openInvoice]);
      }

    public function create()
      {
        return view('pages.billing.create');
      }
      public function destroy($id)
      {
        Billing::deleteBilling($id);
        $openInvoices = Billing::getAllOpenInvoices();
        return view('pages/billing.index', ['openInvoices' =>  $openInvoices]);
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
      /*
     public function updateBilling($id, $contractFk, $type, $amount, $dueDate, $isPayed){
      $openInvoices = Billing::updateBilling($id, $contractFk, $type, $amount, $dueDate, $isPayed);
      return view('pages/billing.index', ['openInvoices' => $openInvoices]);
     }
     */

}
