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
        <td scope="col"><a href={{route('billing.index')}} type="button" class="btn btn-secondary" >Zurück</a></td>
        @endforeach
      </div>
      </div>

      <div class="col-4">
      </div>


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
            <form method="post" action="{{ route('billing.update', $openInvoice->id) }}">
            @csrf
          @method('PATCH')
            <div class="modal-body">
              <label for="id">Rechnungsnummer</label>
              <input readonly type="number" class="form-control" name="id" id="id" value="<?PHP echo $openInvoice->id; ?>" required>
              <br>
              <label for="type">Rechnungstyp</label>


              <select class="form-control"  id="type" name="type" required>
              <option></option>
              <option value="rent" <?php if($openInvoice->type == "rent") { echo "SELECTED"; } ?>>Miete</option>
              <option value="oil" <?php if($openInvoice->type == "oil") { echo "SELECTED"; } ?>>Öl</option>
              <option value="repairs" <?php if($openInvoice->type == "repairs") { echo "SELECTED"; } ?>>Reparatur</option>
              <option value="energy" <?php if($openInvoice->type == "energy") { echo "SELECTED"; } ?>>Strom</option>
              <option value="maintenance" <?php if($openInvoice->type == "maintenance") { echo "SELECTED"; } ?>>Wartung</option>
              <option value="other" <?php if($openInvoice->type == "other") { echo "SELECTED"; } ?>>Sonstige</option>
              </select>

              <br>
              <label for="contractFk">Vertragsnummer</label>
              <div class="form-group">
              <select class="form-control" id="contractFk" name="contractFk" value="<?PHP echo $openInvoice->contractFk; ?>" required>
              <?php
             foreach($contracts as $contract ):
             echo '<option value="'.$contract->id.'">'.$contract->id.'</option>';
             endforeach;
             ?>
            </select>
            </div>

              <br>
              <label for="dueDate">Rechnungsdatum</label>
              <input type="date" class="form-control" name="dueDate" id="dueDate" value="<?PHP echo $openInvoice->dueDate; ?>" required>
              <br>
              <label for="amount">Betrag</label>
              <input type="number" step="0.01" class="form-control" name="amount" id="amount" value="<?PHP echo $openInvoice->amount; ?>" required>
              <br>
              <label for="isPayed">Status (1=Bezahlt, 0=Nicht bezahlt)</label>
              <input type="text" class="form-control" name="isPayed" id="isPayed" value="<?PHP echo $openInvoice->isPayed; ?>" required>
            </div>

            <div class="modal-footer">

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                          <button type="submit" class="btn btn-success">Speichern</button>
                        </div>
          </div>
            </form>
        </div>
      </div>






@endsection
