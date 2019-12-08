@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Rechnungserfassung</h3></br>
</div>

<div class="container">
  <div class="container box">
    <h3 align="left">Bezahlte Rechnungen</h3></br>
    <table class="table table-striped table-dark" style="border-radius: 20px;">
      <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">RG-Typ</th>
          <th scope="col">Datum</th>
          <th scope="col">CHF</th>


      </tr>
      </thead>

      <tbody>
        @foreach($yearlyInvoices as $yearlyInvoice)
          <tr>
              <td scope="col">{{$yearlyInvoice->id}}</td>
              <td scope="col">{{$yearlyInvoice->type}}</td>
              <td scope="col">{{$yearlyInvoice->dueDate}}</td>
              <td scope="col">{{$yearlyInvoice->amount}}</td>

          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection
