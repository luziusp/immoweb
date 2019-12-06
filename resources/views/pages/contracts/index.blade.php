@extends('layouts.app')

<head>
  <title>Verträge - ImmoWeb</title>
</head>

@section('content')
  <div class="container box">

  <h3 align="left">Vertragsübersicht</h3></br>
  <div class="panel panel-default">

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Beschreibung</th>
        <th scope="col">Von</th>
        <th scope="col">Bis</th>
        <th scope="col">Mieter</th>
        <th scope="col"></th>
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
            <td scope="col">{{$contract->tenantMapFk}}</td>

            <td scope="col"><a href={{route('contracts.show', [$contract->id])}} type="button" class="btn btn-primary" >Details</a></td>


            <td scope="col">
            @if ($contract->id)
                <form action="{{ url("/contracts/$contract->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</button>
                </form>
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
      <label for="familyname">Mieter</label>
      <div class="form-group">
        <select class="form-control"id="Description" name="Description" required>
        <option>Mieter1 aus DB (Tenant)</option>
        <option>Mieter2</option>
        <option>Mieter3</option>
        <option>Mieter4</option>
      </select>
      </div>
              <label for="Description">Beschreibung</label>
              <div class="form-group">
                <select class="form-control"id="Description" name="Description" required>
                <option>Wohnung1 aus DB (Room)</option>
                <option>Wohnung2</option>
                <option>Wohnung3</option>
                <option>Wohnung4</option>
              </select>
              </div>
      <label for="startDate">Von</label>
      <input type="date" class="form-control" placeholder="Vertragsstart" name="startDate" id="startDate" required>
      <br>
      <label for="terminationDate">Bis</label>
      <input type="date" class="form-control" placeholder="Vertragsende" name="terminationDate" id="terminationDate" required>
      <br>
        <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>
        <br>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>

        <button type="submit" class="btn btn-success" >Speichern</button>
        </div>
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


      <label for="id">#</label>
      <input class="form-control" type="text" value="<?php echo $contract->id; ?>" id="id" required>
      <br>
        <label for="familyName">Mieter</label>
        <input type="text" class="form-control" required>
        <br>
        <label for="familyName">Beschreibung</label>
        <input type="text" class="form-control" required>
        <br>
        <label for="squareMeters">Wohnfläche</label>
        <input type="text" class="form-control" required>
        <br>
        <label for="rentCost">Nettomiete</label>
        <input type="text" class="form-control" required>
        <br>
        <label for="additionalCost">Nebenkosten</label>
        <input type="text" class="form-control" required>
        <br>
        <label for="title">Bruttomiete</label>
        <input type="text" class="form-control"  name="title" id="title" required>
        <br>
               <br>
        <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>
        <br>

      </div>

      <div class="modal-footer">
      <!-- Buttons for Update NOT WORKING -->
                <form id="userForm" action="/contracts/{{ $contract->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                    <button type="submit" class="btn btn-success">Speichern</button>     </div>
    </div>
    </form>
  </div>
</div>


</div>
</div>
</div>





@endsection
