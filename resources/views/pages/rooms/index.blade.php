@extends('layouts.app')

@section('content')
<div class="container box">
<h3 align="left">Wohnungsübersicht</h3></br>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Beschreibung</th>
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
            <td scope="col">{{$room->rentCost}}</td>
            <td scope="col">{{$room->additionalCost}}</td>
            <td scope="col">{{$room->rentCost+$room->additionalCost}}</td>
            <td scope="col"><a href={{route('rooms.show', [$room->id])}} type="button" class="btn btn-primary" >Details</a></td>

            <td scope="col">
            @if ($room->id)
                <form action="{{ url("/rooms/$room->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-warning disabled">Löschen</button>
                </form>
            </td>
            <td scope="col">
            <!-- Button with sending attributes to modal-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAppartment"

            >Bearbeiten</button>
            </td>
            @endif
          </tr>
    @endforeach
    </tbody>
</table>
<!-- OLD, delete?-->
<!--<a class="btn btn-primary" href={{route('rooms.create')}}>Wohnung hinzufügen</a>-->


<!-- Button to open new Appartment creation -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAppartment">
Wohnung hinzufügen
</button>





<!-- Modals-->
<!-- Modal  Create-->
<div class="modal fade" id="newAppartment" tabindex="-1" role="dialog" aria-labelledby="newAppartmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAppartmentLabel">Neue Wohnung erstellen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('rooms.store') }}" method="post">

      <div class="modal-body">
      <br>
        <label for="appartmentName">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="appartmentName" id="appartmentName" required>
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
      </div>
      

     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="submit" class="btn btn-primary" >Speichern</button>
      </div>
      </form>
    </div>
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
      <form action="{{ route('rooms.update')/<?php echo $room->id; ?> }}" method="post">
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
   
      <div class="modal-footer">
      <!-- Buttons for Update NOT WORKING -->
                <form id="userForm" action="/rooms/{{ $room->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                    <button type="submit" class="btn btn-danger">Speichern</button>     </div>
    </div>
    </form>
  </div>
</div>

</div>

@endsection
