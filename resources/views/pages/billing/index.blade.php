@extends('layouts.app')

@section('content')
<div class="container-header">
    <div class="container-fluid">
        <div class="col-md">
            <div class="container-fluid mt-3">
                <h2 class="card-header">Rechnungen</h2>
              </div>
          </div>
      </div>
  </div>
  <br />

  <div class="container box">
  <h3 align="left">aktuelle Rechnungsübersicht</h3></br>
  <div class="panel panel-default">

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">RG-Typ</th>
        <th scope="col">Datum</th>
        <th scope="col">CHF</th>
        <th scope="col">Verteilschlüssel</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

@foreach( $openInvoices as $invoice)
        <tr>
            <td scope="col">{{$invoice->id}}</td>
            <td scope="col">{{$invoice->type}}</td>
            <td scope="col">{{$invoice->dueDate}}</td>
            <td scope="col">{{$invoice->amount}}</td>
            <td scope="col">Verteilschlüssel RG</td>
            <td scope="col"><button type="submit" class="btn btn-primary">Details</button>
        </tr>
        @endforeach


    </tbody>
</table>

<button type="submit" class="btn btn-primary">Rechnung erfassen</button>

@endsection
