@extends('layouts.app')

@section('content')
  <div class="container box">

  <h3 align="left">Vertragsübersicht</h3></br>
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
        <th scope="col">Beschreibung</th>
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
            <td scope="col"><a href={{route('contracts.show', [$contract->id])}} type="button" class="btn btn-primary" >Details</a></td>


            <td scope="col">
            @if ($contract->id)
                <form action="{{ url("/contracts/$contract->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-warning disabled">Löschen</button>
                </form>
            </td>
            <td scope="col">
            <!-- Button with sending attributes to modal-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editContract">Bearbeiten</button>
            </td>
            @endif
        </tr>
  @endforeach


</table>
<!-- OLD, delete?-->
<!--<a class="btn btn-primary" href={{route('contracts.create')}}>Wohnung hinzufügen</a>-->

<!-- Button to open new Contract creation -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newContract">
Vertrag hinzufügen
</button>


<!-- Modals-->
<!-- Modal  Create-->
<div class="modal fade" id="newContract" tabindex="-1" role="dialog" aria-labelledby="newContractLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newContractLabel">Neuer Vertrag erstellen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('contracts.store') }}" method="post">
      <div class="modal-body">
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
      <br>
      <label for="squareMeters">Wohnfläche</label>
      <input type="text" class="form-control" placeholder="m²" name="squareMeters" id="squareMeters" required>
      <br>
      <label for="familyname">Mieter</label>
      <input type="text" class="form-control" placeholder="Name" name="familyname" id="familyname" required>
      <br>
      <label for="startDate">Von</label>
      <input type="date" class="form-control" placeholder="Vertragsstart" name="startDate" id="startDate" required>
      <br>
      <label for="terminationDate">Bis</label>
      <input type="date" class="form-control" placeholder="Vertragsende" name="terminationDate" id="terminationDate" required>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button  class="btn btn-primary" type="submit">Speichern</button>
      </div>
      </form>
    </div>
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
      <form action="{{ route('contracts.update')/<?php echo $contract->id; ?> }}" method="post">
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

      <div class="modal-footer">
      <!-- Buttons for Update NOT WORKING -->
                <form id="userForm" action="/contracts/{{ $contract->id }}" method="post">
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
</div>
</div>





@endsection