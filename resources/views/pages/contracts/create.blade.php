@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-5">
        <label for="name">Objekt-Typ</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="lastName">Wohnfläche</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="birthday">Mieter</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="phone">Von</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="email">Bis</label>
        <input readonly type="text" class="form-control" name="title" >
      </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <br>
      <button type="submit" class="btn btn-primary disabled">Speichern</button>
      <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
    </div>
    </div>
  </div>
@endsection
