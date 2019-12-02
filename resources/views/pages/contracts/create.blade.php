@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-5">
        <label for="Description">Beschreibung</label>
        <div class="form-group">
          <select class="form-control"  id="Description" required>
          <option>Seeblick</option>
          <option>Hauptstrasse</option>
          <option>Altbau</option>
          <option>Erdgeschoss</option>
        </select>
        </div>

        <br>
        <label for="squareMeters">Wohnfläche</label>
        <input type="text" class="form-control" placeholder="m²" name="squareMeters" id="squareMeters" required>
        <br>
        <label for="surname">Mieter</label>
        <input type="text" class="form-control" placeholder="Name" name="surname" id="surname" required>
        <br>
        <label for="startDate">Von</label>
        <input type="date" class="form-control" placeholder="Vertragsstart" name="startDate" id="startDate" required>
        <br>
        <label for="terminationDate">Bis</label>
        <input type="date" class="form-control" placeholder="Vertragsende" name="terminationDate" id="terminationDate" required>
      </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <br>
      <button type="submit" class="btn btn-primary disabled">Speichern</button>
      <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
    </div>
    </div>
  </div>
@endsection
