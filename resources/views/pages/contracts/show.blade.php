@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragsdetails</h3></br>
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
        <label for="lastName">Mieter</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="birthday">Von</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="phone">Bis</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <label for="email">Mietzinseingänge</label>
        <input readonly type="text" class="form-control" name="title" >
        <br>
        <button type="submit" class="btn btn-primary disabled">Bearbeiten</button>
        <button type="submit" class="btn btn-primary disabled">Löschen</button>
        <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
      </div>

    <div class="col-4">
    </div>


    </div>
  </div>
</div>




@endsection
