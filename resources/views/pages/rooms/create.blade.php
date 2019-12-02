@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Wohnungserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
        <label for="title">Nr.</label>
        <input type="number" class="form-control" placeholder="Wohnungsnummer" name="title" id="id" required>
        <br>
        <label for="Description">Beschreibung</label>
        <div class="form-group">
          <select class="form-control"  id="Description" required>
          <option>Seeblick</option>
          <option>Hauptstrasse</option>
          <option>Altbau</option>
          <option>Erdgeschoss</option>
        </select>
        </div>

        <label for="squareMeters">Wohnfläche</label>
        <input type="text" class="form-control" placeholder="Wohnfläche" name="squareMeters" id="squareMeters" required>
        <br>
        <label for="rentCost">Nettomiete</label>
        <input type="text" class="form-control" placeholder="Nettomiete" name="rentCost" id="rentCost" required>
        <br>
        <label for="additionalCost">Nebenkosten</label>
        <input type="text" class="form-control" placeholder="Nebenkosten" name="additionalCost" id="additionalCost" required>
        <br>
        <label for="title">Bruttomiete</label>
        <input type="text" class="form-control" placeholder="Bruttomiete" name="title" id="title" required>
        <br>
        <button type="submit" class="btn btn-primary disabled">Speichern</button>
        <td scope="col"><a href={{route('rooms.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
      </div>

    <div class="col-4">
    </div>


    </div>
  </div>
</div>




@endsection
