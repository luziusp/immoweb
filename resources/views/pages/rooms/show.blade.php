@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Wohnungsdetails</h3></br>
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
        <button type="submit" class="btn btn-primary disabled">Bearbeiten</button>
        <button type="submit" class="btn btn-primary disabled">Löschen</button>
        <td scope="col"><a href={{route('rooms.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
      </div>

    <div class="col-4">
    </div>


    </div>
  </div>
</div>




@endsection
