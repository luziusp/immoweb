@extends('layouts.app')
<head>
  <title>Wohnungen - ImmoWeb</title>
</head>
@section('content')
<div class="container box">
<h3 align="left">Wohnungsübersicht</h3></br>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Beschreibung</th>
        <th scope="col">Wohnfläche</th>
        <th scope="col">Nettomiete</th>
        <th scope="col">Nebenkosten</th>
        <th scope="col">Bruttomiete</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
      @foreach($rooms as $room )
        <tr>
            <td scope="col">{{$room->id}}</td>
            <td scope="col">{{$room->Description}}</td>
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
                <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</button>
                </form>
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
<!-- End Button to open new Appartment creation -->




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
        <div class="form-group">
                <label for="Description">Beschreibung</label>
                </div>
                <div class="form-group">
                  <select class="form-control" id="Description" name="Description" required>
                  <option></option>
                  <option>Seeblick</option>
                  <option>Hauptstrasse</option>
                  <option>Altbau</option>
                  <option>Erdgeschoss</option>
                </select>
                </div>
        <div class="form-group">
        <label for="squareMeters">Wohnfläche</label>
        <input type="text" class="form-control" placeholder="m²" name="squareMeters" id="squareMeters" required>
        </div>
        <div class="form-group">
                <label for="noOfRooms">Anzahl Zimmer</label>
                <input type="text" class="form-control" placeholder="Anzahl Zimmer" name="noOfRooms" id="noOfRooms" required>
        </div>

        <div class="form-group">
        <label for="rentCost">Nettomiete</label>
        <input type="text" class="form-control" placeholder="Nettomiete" name="rentCost" id="rentCost" required>
        </div>
        <div class="form-group">
        <label for="additionalCost">Nebenkosten</label>
        <input type="text" class="form-control" placeholder="Nebenkosten" name="additionalCost" id="additionalCost" required>
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>
        </div>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="submit" class="btn btn-success" >Speichern</button>
      </div>

      </form>

    </div>
  </div>
</div>

</div>


@endsection
