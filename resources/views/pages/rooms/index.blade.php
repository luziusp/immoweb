@extends('layouts.app')

@section('content')
<div class="container box">
<h3 align="left">Wohnungsübersicht</h3></br>
<div class="panel panel-default">
</div>


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
                <button type="submit" onclick="return confirm('Are you sure?')">Löschen</button>
                </form>
            </td>
            <td scope="col"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAppartment" data-id="@room">Edit</button>
            </td>
            @endif
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
      <form action="save.php" method="post">
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
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-primary" type="submit">Speichern</button>
      </div>
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
      <form action="save.php" method="post">
      <div class="modal-body">
      
      <label for="appartmentId">ID</label>
      <input class="form-control" type="text" placeholder="$room->id" readonly>
      <br>
        <label for="appartmentName">Name</label>
        <input type="text" class="form-control" placeholder="$room->appartmentName" name="appartmentName" id="appartmentName" required>
        <br>
  
        <label for="Description">Beschreibung</label>
        <div class="form-group">
          <select class="form-control"  id="Description" placeholder="$room->Description" required>
          <option>Seeblick</option>
          <option>Hauptstrasse</option>
          <option>Altbau</option>
          <option>Erdgeschoss</option>
        </select>
        </div>

        <label for="squareMeters">Wohnfläche</label>
        <input type="text" class="form-control" placeholder="$room->squareMeters" name="squareMeters" id="squareMeters" required>
        <br>
        <label for="rentCost">Nettomiete</label>
        <input type="text" class="form-control" placeholder="$room->rentCost" name="rentCost" id="rentCost" required>
        <br>
        <label for="additionalCost">Nebenkosten</label>
        <input type="text" class="form-control" placeholder="$room->additionalCost" name="additionalCost" id="additionalCost" required>
        <br>
        <label for="title">Bruttomiete</label>
        <input type="text" class="form-control" placeholder="$room->additionalCost" name="title" id="title" required>
        <br>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-primary" type="submit">Speichern</button>
      </div>
    </div>
  </div>
</div>







</div>
@endsection
