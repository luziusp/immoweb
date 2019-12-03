@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Mieter bearbeiten</h3></br>
</div>
<div class="container">
  <div class="row">
    <div class="col-5">
      @foreach($tenant as $tenant)
      <label for="title">Anrede</label>
      <input type="text" class="form-control" name="title" value="<?PHP echo $tenant->title; ?>">
      <br>
      <label for="name">Vorname</label>
      <input type="text" class="form-control" name="surname" value="<?PHP echo $tenant->surname; ?>">
      <br>
      <label for="lastName">Name</label>
      <input type="text" class="form-control" name="familyname" value="<?PHP echo $tenant->familyname; ?>">
      <br>
      <label for="birthday">Geburtsdatum</label>
      <input type="text" class="form-control" name="dateOfBirth" value="<?PHP echo $tenant->dateOfBirth; ?>">
      <br>
      <label for="phone">Telefon</label>
      <input type="text" class="form-control" name="phone" value="<?PHP echo $tenant->phone; ?>">
      <br>
      <label for="email">E-Mail</label>
      <input type="text" class="form-control" name="email" value="<?PHP echo $tenant->email; ?>">
    </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <label for="street">Strasse</label>
      <input type="text" class="form-control" name="billingStreetName" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>
      <label for="postal">PLZ</label>
      <input type="text" class="form-control" name="title" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>
      <label for="city">Ort</label>
      <input type="text" class="form-control" name="title" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>

      <button type="button" class="btn btn-warning">Speichern</button>
      <a href={{route('tenants.index')}} type="button" class="btn btn-secondary">Zurück</a>
      @endforeach
    </div>
  </div>
</div>


@endsection
