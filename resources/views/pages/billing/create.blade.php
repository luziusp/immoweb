@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Rechnungserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-5">
        <label for="lastName">Rechnungs-Typ</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="birthday">Datum</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="phone">Verteilschlüssel</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="email">CHF</label>
        <input readonly type="text" class="form-control" name="title" >
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
