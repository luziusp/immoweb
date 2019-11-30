@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Mieterdetails</h3></br>
</div>

<div class="container">
  <div class="row">
    <div class="col-5">
      <label for="title">Anrede</label>
      <input readonly type="text" class="form-control" name="title" >
    <br>
      <label for="name">Vorname</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="lastName">Name</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="birthday">Geburtsdatum</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="phone">Telefon</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="email">E-Mail</label>
      <input readonly type="text" class="form-control" name="title" >
    </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <label for="street">Strasse</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="houseNr">Nr.</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="postal">PLZ</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="city">Ort</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <label for="country">Land</label>
      <input readonly type="text" class="form-control" name="title" >
      <br>
      <br>
      <button type="submit" class="btn btn-primary disabled">Bearbeiten</button>
      <button type="submit" class="btn btn-primary disabled">Löschen</button>
      <button type="submit" class="btn btn-primary disabled">Zurück</button>


    </div>
  </div>
</div>




@endsection
