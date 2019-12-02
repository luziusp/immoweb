@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Rechnungserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-5">

            <div class="form-group">
              <select class="form-control" id="type">
              <option>Öl</option>
              <option>Wasser</option>
              <option>Strom</option>
              <option>Hauswart</option>
              <option>Heizung</option>
            </select>
            </div>

        <br>
        <label for="dueDate">Datum</label>
        <input type="date" class="form-control" name="dueDate" id="dueDate">

        <br>
        <label for="phone">Verteilschlüssel</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="amount">CHF</label>
        <input type="text" class="form-control" placeholder="Rechnungsbetrag" name="amount" id="amount" required>
      </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <br>
      <button type="submit" class="btn btn-primary disabled">Speichern</button>
      <td scope="col"><a href={{route('billing.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
    </div>
    </div>
  </div>
@endsection
