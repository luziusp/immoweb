@extends('layouts.app')

@section('content')
<div class="container-header">
    <div class="container-fluid">
        <div class="col-md">
            <div class="container-fluid mt-3">
                <h2 class="card-header">Verträge</h2>
              </div>
          </div>
      </div>
  </div>
  <br />

  <div class="container box">

  <h3 align="left">aktuelle Vertragsübersicht</h3></br>
  <div class="panel panel-default">
  <div class="panel-heading">Nach Vertrag suchen</div>
  <div class="panel-body">
  <div class="form-group">
  <input type="text" name="search" id="search" class="form-control" placeholder="Suchen" />
  </div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Objekt-Typ</th>
        <th scope="col">Von</th>
        <th scope="col">Bis</th>
        <th scope="col">Mieter</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

@foreach( $contracts as $contract )
        <tr>
            <td scope="col">{{$contract->id}}</td>
            <td scope="col">Objekt-Typ aus Tabelle Wohnung</td>
            <td scope="col">{{$contract->startDate}}</td>
            <td scope="col">{{$contract->terminationDate}}</td>
            <td scope="col">Mietername aus Tabelle Mieter</td>
            <td scope="col"><button type="submit" class="btn btn-primary">Details</button>
        </tr>
  @endforeach


</table>

<button type="submit" class="btn btn-primary">Vertrag hinzufügen</button>

@endsection
