@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragsdetails</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
      @foreach($contract as $contract)
        <label for="title">Nr.</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->id; ?>"  >
        <br>
        <label for="name">Beschreibung</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->id; ?>">
        <br>
        <label for="lastName">Mieter</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->id; ?>">
        <br>
        <label for="birthday">Von</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->startDate; ?>">
        <br>
        <label for="phone">Bis</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->terminationDate; ?>">
        <br>
        <label for="email">Mietzinseingänge</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->id; ?>">
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editContract">Bearbeiten</button>
        <button type="submit" class="btn btn-warning disabled">Löschen</button>
        <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
        @endforeach
      </div>

    <div class="col-4">
    </div>
    </div>
    <!-- Modal  Edit-->
    <div class="modal fade" id="editContract" tabindex="-1" role="dialog" aria-labelledby="editContract" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editContract">Vertragsdaten bearbeiten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="save.php" method="post">
          <div class="modal-body">

          <br>
          <span id="modal-myvar"></span>
          <br>

          <label for="Description">Beschreibung</label>
          <div class="form-group">
            <select class="form-control">
            <option>Seeblick</option>
            <option>Hauptstrasse</option>
            <option>Altbau</option>
            <option>Erdgeschoss</option>
          </select>
          </div>

          <label for="id">ID</label>
          <input class="form-control" type="text" value="<?php echo $contract->id; ?>" id="id" required>
          <br>
            <label for="familyName">Name</label>
            <input type="text" class="form-control">
            <br>
            <label for="squareMeters">Wohnfläche</label>
            <input type="text" class="form-control">
            <br>
            <label for="rentCost">Nettomiete</label>
            <input type="text" class="form-control">
            <br>
            <label for="additionalCost">Nebenkosten</label>
            <input type="text" class="form-control">
            <br>
            <label for="title">Bruttomiete</label>
            <input type="text" class="form-control"  name="title" id="title" required>
            <br>

          </div>
          </form>
          <div class="modal-footer">
          <!-- Buttons for Update NOT WORKING -->
                    <form id="userForm" action="/contracts/{{ $contract->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-danger">Speichern</button>     </div>
        </div>
      </div>
    </div>
  </div>




@endsection