@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Wohnungserfassung</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
        <label for="title">Nr.</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="name">Objekt-Typ</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="lastName">Wohnfläche</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="birthday">Nettomiete</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="phone">Nebenkosten</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="email">Bruttomiete</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <button type="submit" class="btn btn-primary disabled">Speichern</button>
        <button type="submit" class="btn btn-primary disabled">Zurück</button>
      </div>

    <div class="col-4">
    </div>


    </div>
  </div>
</div>




@endsection
