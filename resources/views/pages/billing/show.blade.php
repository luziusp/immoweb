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
        <label for="title">Nr.</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="name">Beschreibung</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="lastName">Mieter</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="dueDate">Rechnungsdatum</label>
        <input readonly type="text" class="form-control" name="dueDate" >
        <br>
        <label for="email">Mietzinseingänge</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <button type="submit" class="btn btn-warning">Bearbeiten</button>
        <button type="submit" class="btn btn-danger">Löschen</button>
        <button type="submit" class="btn btn-secondary">Zurück</button>
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
