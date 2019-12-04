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
  </div>




@endsection
