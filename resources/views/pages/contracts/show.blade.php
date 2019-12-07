@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragsdetails</h3></br>
</div>

<div class="container">
  <div class="row">

  <div class="col-4">
    @foreach($contract as $contract)
      <label for="id">#</label>
      <input readonly type="number" class="form-control" name="id" value="<?PHP echo $contract->id; ?>"  >
      <br>
      <label for="tenantFk">Mieter</label>
      <input readonly type="text" class="form-control" name="tenantFk" value="<?PHP echo $contract->tenantFk; ?>">
      <br>
      <label for="appartmentFk">Beschreibung</label>
      <input readonly type="number" class="form-control" name="appartmentFk" value="<?PHP echo $contract->appartmentFk; ?>" >
      <br>
      <label for="startDate">Von</label>
      <input readonly type="date" class="form-control" name="startDate" value="<?PHP echo $contract->startDate; ?>">
      <br>
      <label for="terminationDate">Bis</label>
      <input readonly type="date" class="form-control" name="terminationDate" value="<?PHP echo $contract->terminationDate; ?>">
      <br>
      <label for="rentPerMonth">Monatsmiete</label>
      <input readonly type="number" class="form-control" name="rentPerMonth" value="<?PHP echo $contract->rentPerMonth; ?>">
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

          <form method="post" action="{{ route('contracts.update', $contract->id) }}">
          @csrf
          @method('PATCH')
          <div class="modal-body">

          <label for="id">#</label>
          <input class="form-control" readonly type="text" value="<?php echo $contract->id; ?>" required>
          <br>
          <label for="tenantFk">Mieter</label>
          <div class="form-group">
            <select class="form-control" type="number" name="tenantFk" required>
            <option>4</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          </div>

          <label for="appartmentFk">Beschreibung</label>
          <div class="form-group">
            <select class="form-control" type="number" name="appartmentFk" required>
            <option>2</option>
            <option>2</option>
            <option>1</option>
            <option>3</option>
          </select>
          </div>

            <label for="startDate">Von</label>
            <input type="date" class="form-control" name="startDate" value="{{$contract->startDate}}" >
            <br>
            <label for="terminationDate">Bis</label>
            <input type="date" class="form-control" name="terminationDate" value="{{$contract->terminationDate}}" >
            <br>
            <label for="rentPerMonth">Monatsmiete</label>
            <input type="number" class="form-control" name="rentPerMonth" value="{{$contract->rentPerMonth}}" >
            <br>
          </div>
          <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-success">Speichern</button>
                        </div>

        </div>
        </form>
      </div>
    </div>
  </div>



@endsection
