@extends('layouts.app')

@section('content')

<div class="container">
  <div class="container box">
    <h3 align="left">Abrechnungsübersicht</h3></br>
    <table class="table table-striped table-dark table-borderless" style="border-radius: 20px;">
      <thead>
      <tr>
          <th scope="col">RG-Nr.</th>
          <th scope="col">RG-Typ</th>
          <th scope="col">Vertrags-Nr.</th>
          <th scope="col">Rechnungsdatum</th>
          <th scope="col">Betrag</th>
          <th scope="col">Status</th>


      </tr>
      </thead>

      <tbody>
       @foreach($yearlyInvoices as $yearlyInvoice)

       @if(($date = new DateTime($yearlyInvoice->dueDate)) < new DateTime())
         <tr>
             <td scope="col">{{$yearlyInvoice->id}}</td>
             <td scope="col">{{$yearlyInvoice->type}}</td>
             <td scope="col">{{$yearlyInvoice->contractFk}}</td>
             <td scope="col">{{$yearlyInvoice->created_at}}</td>
             <td scope="col">{{$yearlyInvoice->amount}}</td>
             <td scope="col">{{$yearlyInvoice->isPayed}}</td>

         </tr>
         @endif
         @endforeach
     </tbody>
  </table>
  </div>
@endsection
