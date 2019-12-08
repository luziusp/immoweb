@extends('layouts.app')
<head>
  <title>Rechnungen - ImmoWeb</title>
</head>
@section('content')

  <div class="container box">
  <h3 align="left">Offene Rechnungen</h3></br>
  <table class="table table-striped table-dark" style="border-radius: 20px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">RG-Typ</th>
        <th scope="col">Datum</th>
        <th scope="col">CHF</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>

    <tbody>
      @foreach($openInvoices as $openInvoice)
        <tr>
            <td scope="col">{{$openInvoice->id}}</td>
            <td scope="col">{{$openInvoice->type}}</td>
            <td scope="col">{{$openInvoice->dueDate}}</td>
            <td scope="col">{{$openInvoice->amount}}</td>

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

<!-- Button to open new Billing creation -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#newBilling">
Rechnung hinzufügen
</button>
<button type="button" class="btn btn-dark">
Abrechnung ausdrucken (PDF)
</button>


<br>
<br>
<br>





<div class="container box">
  <h3 align="left">Bezahlte Rechnungen</h3></br>
  <table class="table table-striped table-dark" style="border-radius: 20px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">RG-Typ</th>
        <th scope="col">Datum</th>
        <th scope="col">CHF</th>


    </tr>
    </thead>

    <tbody>
      @foreach($payedInvoices as $payedInvoice)
        <tr>
            <td scope="col">{{$payedInvoice->id}}</td>
            <td scope="col">{{$payedInvoice->type}}</td>
            <td scope="col">{{$payedInvoice->dueDate}}</td>
            <td scope="col">{{$payedInvoice->amount}}</td>



        </tr>
        @endforeach
    </tbody>
</table>





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
      <input type="hidden" class="form-control" placeholder="Rechnungsnummer" name="id" id="id" required>
      <br>
      <label for="type">Rechnungstyp</label>

      <div class="form-group">

        <select class="form-control"  id="type" required>
        <option></option>
        <option value="rent">Miete</option>
        <option value="oil">Öl</option>
        <option value="repairs">Reparatur</option>
        <option value="energy">Strom</option>
        <option value="maintenance">Wartung</option>
        <option value="other">Sonstige</option>
      </select>

      <br>
      <label for="contractFk">Vertragsnummer</label>
      <div class="form-group">
            <select class="form-control" id="contractFk" name="contractFk" required>
            <?php
           foreach($contracts as $contract ):
           echo '<option value="'.$contract->id.'">'.$contract->id.'</option>';
           endforeach;
           ?>
          </select>
          </div>

      <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>
      <input type="hidden" class="form-control" value="0" name="isPayed" id="isPayed" required readonly>


      <label for="dueDate">Rechnungsdatum</label>
      <input type="date" class="form-control" placeholder="Datum" name="dueDate" id="dueDate" required>
      <br>
      <label for="amount">Betrag</label>
      <input type="number" class="form-control" placeholder="CHF" name="amount" id="amount" required>
      <br>

        <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>

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
