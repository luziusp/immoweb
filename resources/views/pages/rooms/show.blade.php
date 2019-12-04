@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Wohnungsdetails</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
    @foreach($room as $room)
        <label for="title">Nr.</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->id; ?>" >
        <br>
        <label for="name">Beschreibung</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->Description; ?>" >
        <br>
        <label for="lastName">Wohnfläche</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->squareMeters; ?>" >
        <br>
        <label for="birthday">Nettomiete</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->rentCost; ?>">
        <br>
        <label for="phone">Nebenkosten</label>
        <input readonly type="text" class="form-control" name="title"value="<?PHP echo $room->additionalCost; ?>" >
        <br>
        <label for="email">Bruttomiete</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->rentCost+$room->additionalCost; ?>">
        <br>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAppartment">Bearbeiten</button>
        <button type="button" class="btn btn btn-warning disabled" onclick="return confirm('Mieter wirklich löschen?')">Löschen</button>
        <td scope="col"><a href={{route('rooms.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
        @endforeach
      </div>

    <div class="col-4">
    </div>


    </div>
    <!-- Modal  Edit-->
    <div class="modal fade" id="editAppartment" tabindex="-1" role="dialog" aria-labelledby="editAppartment" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editAppartment">Wohnungsdaten bearbeiten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="save.php" method="post">
          <div class="modal-body">

          <br>
          <span id="modal-myvar"></span>
          <br>
          <label for="appartmentId">ID</label>
          <input class="form-control" type="text" value="<?php echo $room->id; ?>" id="id" readonly>
          <br>
            <label for="appartmentName">Name</label>
            <input type="text" class="form-control" value="<?php echo $room->appartmentName; ?>" name="appartmentName" id="appartmentName" required>
            <br>

            <label for="Description">Beschreibung</label>
            <div class="form-group">
              <select class="form-control"  id="Description" value="<?php echo $room->Description; ?>" required>
              <option>Seeblick</option>
              <option>Hauptstrasse</option>
              <option>Altbau</option>
              <option>Erdgeschoss</option>
            </select>
            </div>

            <label for="squareMeters">Wohnfläche</label>
            <input type="text" class="form-control" value="<?php echo $room->squareMeters; ?>" name="squareMeters" id="squareMeters" required>
            <br>
            <label for="rentCost">Nettomiete</label>
            <input type="text" class="form-control" value="<?php echo $room->rentCost; ?>" name="rentCost" id="rentCost" required>
            <br>
            <label for="additionalCost">Nebenkosten</label>
            <input type="text" class="form-control" value="<?php echo $room->additionalCost; ?>" name="additionalCost" id="additionalCost" required>
            <br>
            <label for="title">Bruttomiete</label>
            <input type="text" class="form-control"  name="title" id="title" required>
            <br>
          </div>
          </form>
          <div class="modal-footer">
          <!-- Buttons for Update NOT WORKING -->
                    <form id="userForm" action="/rooms/{{ $room->id }}" method="post">
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
