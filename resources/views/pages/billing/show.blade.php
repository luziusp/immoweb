@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Rechnungsdetails</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
      @foreach($openInvoice as $openInvoice)
        <label for="id">Rechnungsnummer</label>
        <input readonly type="number" class="form-control" name="id" value="<?PHP echo $openInvoice->id; ?>" >
        <br>
        <label for="type">Rechnungstyp</label>
        <input readonly type="text" class="form-control" name="type" value="<?PHP echo $openInvoice->type; ?>" >
        <br>
        <label for="contractFk">Vertragsnummer</label>
        <input readonly type="number" class="form-control" value="1" name="contractFk" value="<?PHP echo $openInvoice->contractFk; ?>" >
        <br>
        <label for="dueDate">Rechnungsdatum</label>
        <input readonly type="date" class="form-control" name="dueDate" value="<?PHP echo $openInvoice->dueDate; ?>" >
        <br>
        <label for="amount">Betrag</label>
        <input readonly type="number" class="form-control" name="amount" value="<?PHP echo $openInvoice->amount; ?>" >
        <br>

        <div class="btn-group">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editBilling">Bearbeiten</button>
        <br>
        <br>
        <div scope="col">
        @if ($openInvoice->id)
            <form action="{{ url("/billing/$openInvoice->id") }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</button>
            </form>
        </div>
        @endif
        <br>
        <td scope="col"><a href={{route('billing.index')}} type="button" class="btn btn-secondary" >Zurück</a></td>
        @endforeach
      </div>
      </div>

    <div class="col-4">
    </div>


    </div>

  <!-- Edit Billing -->
    <div class="modal fade" id="editBilling" tabindex="-1" role="dialog" aria-labelledby="editBilling" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editBilling">Rechnung bearbeiten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="save.php" method="post">
          <div class="modal-body">
            <label for="id">Rechnungsnummer</label>
            <input readonly type="number" class="form-control" name="id" id="id" value="<?PHP echo $openInvoice->id; ?>" required>
            <br>
            <label for="type">Rechnungstyp</label>
            <select class="form-control"  id="type" value="<?PHP echo $openInvoice->type; ?>" required>
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
            <input type="number" class="form-control" value="1" name="contractFk" id="contractFk" value="<?PHP echo $openInvoice->contractFk; ?>" required >
            <br>
            <label for="dueDate">Rechnungsdatum</label>
            <input type="date" class="form-control" name="dueDate" id="dueDate" value="<?PHP echo $openInvoice->dueDate; ?>" required>
            <br>
            <label for="amount">Betrag</label>
            <input type="number" class="form-control" name="amount" id="amount" value="<?PHP echo $openInvoice->amount; ?>" required>
            <br>
          </div>
          </form>
          <div class="modal-footer">
          <!-- Buttons for Update NOT WORKING -->
                    <form id="userForm" action="/billing/{{ $openInvoice->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-success">Speichern</button>     </div>
        </div>
      </div>
    </div>

  </div>




@endsection
