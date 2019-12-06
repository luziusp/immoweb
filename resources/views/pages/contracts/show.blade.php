@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragsdetails</h3></br>
</div>

<div class="container">
  <div class="row">

  <div class="col-4">
    @foreach($contract as $contract)
      <label for="title">#</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->id; ?>"  >
      <br>
      <label for="lastName">Mieter</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->tenantMapFk; ?>">
      <br>
      <label for="Description">Beschreibung</label>
      <input readonly type="text" class="form-control" name="Description" value="Objekt-Typ aus Tabelle Wohnung" >
      <br>
      <label for="birthday">Von</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->startDate; ?>">
      <br>
      <label for="phone">Bis</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->terminationDate; ?>">
      <br>
      <label for="phone">Monatsmiete</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $contract->rentPerMonth; ?>">
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

      <!--End Details-->

      <!--Start Payments-->
      <div class="col-6">
        <h4 align="left">Mietzinseingänge</h4>
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>Jahr</th>
              <th>Monat</th>
              <th>Bezahlt - Offen</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <th>2019</th>
              <th>Dezember</th>
              <th></th>
            </tr>
            <tr>
              <th>2019</th>
              <th>November</th>
              <th>Bezahlt - Offen</th>
            </tr>
            <tr>
              <th>2019</th>
              <th>Oktober</th>
              <th>Bezahlt - Offen</th>
            </tr>
          </tbody>
        </table>
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

          <span id="modal-myvar"></span>

          <label for="id">#</label>
          <input class="form-control" type="text" value="<?php echo $contract->id; ?>" id="id" required>
          <br>
          <label for="familyName">Mieter</label>
          <div class="form-group">
            <select class="form-control"id="Description" name="Description" required>
            <option>Mieter1 aus DB (Tenant)</option>
            <option>Mieter2</option>
            <option>Mieter3</option>
            <option>Mieter4</option>
          </select>
          </div>

          <label for="familyName">Beschreibung</label>
          <div class="form-group">
            <select class="form-control"id="Description" name="Description" required>
            <option>Wohnung1 aus DB (Room)</option>
            <option>Wohnung2</option>
            <option>Wohnung3</option>
            <option>Wohnung4</option>
          </select>
          </div>

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
