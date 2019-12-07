@extends('layouts.app')

<head>
  <title>Verträge - ImmoWeb</title>
</head>

@section('content')
  <div class="container box">
  <h3 align="left">Vertragsübersicht</h3></br>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Wohnung</th>
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
            <td scope="col">{{$contract->appartmentFk}}</td>
            <td scope="col">{{$contract->startDate}}</td>
            <td scope="col">{{$contract->terminationDate}}</td>
            <td scope="col">{{$contract->tenantFk}}</td>

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
</tbody>
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
        <select class="form-control"id="tenantFk" name="tenantFk" required>
           <?php
           foreach($tenants as $tenant ):
           echo '<option value="'.$tenant->id.'">'.$tenant->surname.'</option>';
           endforeach;
           ?>
        </select>


      </select>
      </div>
              <label for="Description">Wohnung</label>
              <div class="form-group">
                <select class="form-control"id="appartmentFk" name="appartmentFk" required>
                <?php
           foreach($rooms as $room ):
           echo '<option value="'.$room->id.'">'.$room->appartmentName.'</option>';
           endforeach;
           ?>
              </select>
              </div>
      <label for="startDate">Von</label>
      <input type="date" class="form-control" placeholder="Vertragsstart" name="startDate" id="startDate" required>
      <br>
      <label for="terminationDate">Bis</label>
      <input type="date" class="form-control" placeholder="Vertragsende" name="terminationDate" id="terminationDate">
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

@endsection
