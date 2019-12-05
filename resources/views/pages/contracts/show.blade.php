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
        <label for="title">#</label>
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
        <div class="btn-group">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editContract">Bearbeiten</button>
        <br>
        <div scope="col">
        @if ($contract->id)
            <form action="{{ url("/contracts/$contract->id") }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</button>
            </form>
        </div>
        @endif
        <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-secondary" >Zurück</a></td>
        @endforeach
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
          <label for="id">#</label>
          <input class="form-control" type="text" value="<?php echo $contract->id; ?>" id="id" required>
          <br>
          <label for="Description">Beschreibung</label>
          <div class="form-group">
            <select class="form-control" type="text">
            <option>Seeblick</option>
            <option>Hauptstrasse</option>
            <option>Altbau</option>
            <option>Erdgeschoss</option>
          </select>
          </div>

            <label for="familyName">Mieter</label>
            <input type="text" class="form-control">
            <br>

            <label for="birthday">Von</label>
            <input type="date" class="form-control" name="title" value="<?PHP echo $contract->startDate; ?>">
            <br>
            <label for="phone">Bis</label>
            <input type="date" class="form-control" name="title" value="<?PHP echo $contract->terminationDate; ?>">
            <br>

          </div>
          </form>
          <div class="modal-footer">
          <!-- Buttons for Update NOT WORKING -->
                    <form id="userForm" action="/contracts/{{ $contract->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-success">Speichern</button>     </div>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
