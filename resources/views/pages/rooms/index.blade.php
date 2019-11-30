@extends('layouts.app')

@section('content')
  <div class="container box">

  <h3 align="left">Wohnungsübersicht</h3></br>
  <div class="panel panel-default">
  <div class="panel-heading">Nach Wohnung suchen</div>
  <div class="panel-body">
  <div class="form-group">
  <input type="text" name="search" id="search" class="form-control" placeholder="Suchen" />
  </div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Objekt-Typ</th>
        <th scope="col">Wohnfläche</th>
        <th scope="col">Nettomiete</th>
        <th scope="col">Nebenkosten</th>
        <th scope="col">Bruttomiete</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

      @foreach($rooms as $room )

        <tr>
            <td scope="col">{{$room->id}}</td>
            <td scope="col">{{$room->appartmentName}}</td>
            <td scope="col">{{$room->squareMeters}}</td>
            <td scope="col">Nettokosten</td>
            <td scope="col">Nebenkosten</td>
            <td scope="col">Bruttomiete</td>
            <td scope="col"><button type="submit" class="btn btn-primary">Details</button>
        </tr>

        @endforeach

    </tbody>
</table>

<button type="submit" class="btn btn-primary">Wohnung hinzufügen</button>

@endsection
