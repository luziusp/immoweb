@extends('layouts.app')

@section('content')

  <div class="container box">
  <h3 align="left">Rechnungsübersicht</h3></br>
  <div class="panel panel-default">
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">RG-Typ</th>
        <th scope="col">Datum</th>
        <th scope="col">CHF</th>
        <th scope="col">Verteilschlüssel</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>

    <tbody>
      @foreach( $openInvoices as $openInvoice)
        <tr>
            <td scope="col">{{$openInvoice->id}}</td>
            <td scope="col">{{$openInvoice->type}}</td>
            <td scope="col">{{$openInvoice->dueDate}}</td>
            <td scope="col">{{$openInvoice->amount}}</td>
            <td scope="col">Verteilschlüssel RG</td>
            <td scope="col"><a href={{route('billing.show', [$openInvoice->id])}} type="button" class="btn btn-primary" >Details</a></td>
            <td scope="col">
            @if ($openInvoice->id)
                <form action="{{ url("/billing/$openInvoice->id") }}" method="POST">
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
<!--<a class="btn btn-primary" href={{route('billing.create')}}>Wohnung hinzufügen</a>-->


<!-- Button to open new Appartment creation -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newBilling">
Rechnung hinzufügen
</button>




<!-- Modals-->
<!-- Modal  Create-->
<div class="modal fade" id="newBilling" tabindex="-1" role="dialog" aria-labelledby="newBillingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBillingLabel">Neue Rechnung erstellen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('billing.store') }}" method="post">
      <div class="modal-body">
      <br>
      <label for="id">Nr.</label>
      <input type="text" class="form-control" placeholder="Rechnungsnummer" name="id" id="id" required>
      <br>
      <label for="type">Rechnungstyp</label>
      <div class="form-group">
        <select class="form-control"  id="type" required>
        <option>Öl</option>
        <option>Wasser</option>
        <option>Strom</option>
        <option>Reparatur</option>
        <option>Heizung</option>
      </select>
      </div>
      <label for="dueDate">Rechnungsdatum</label>
      <input type="date" class="form-control" placeholder="Datum" name="dueDate" id="dueDate" required>
      <br>
      <label for="amount">Betrag</label>
      <input type="text" class="form-control" placeholder="CHF" name="amount" id="amount" required>
      <br>
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
<div class="modal fade" id="editBilling" tabindex="-1" role="dialog" aria-labelledby="editBilling" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBilling">Rechnung bearbeiten</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('billing.update')/<?php echo $openInvoice->id; ?> }}" method="post">
      <div class="modal-body">

      </div>

      <div class="modal-footer">
      <!-- Buttons for Update NOT WORKING -->
                <form id="userForm" action="/billing/{{ $openInvoice->id }}" method="post">
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
@endsection
