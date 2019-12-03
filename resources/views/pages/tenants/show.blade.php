@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Mieterdetails</h3></br>
</div>

<div class="container">
  <div class="row">
    <div class="col-5">
      @foreach($tenant as $tenant)
      <label for="title">Anrede</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $tenant->title; ?>">
      <br>
      <label for="name">Vorname</label>
      <input readonly type="text" class="form-control" name="surname" value="<?PHP echo $tenant->surname; ?>">
      <br>
      <label for="lastName">Name</label>
      <input readonly type="text" class="form-control" name="familyname" value="<?PHP echo $tenant->familyname; ?>">
      <br>
      <label for="birthday">Geburtsdatum</label>
      <input readonly type="text" class="form-control" name="dateOfBirth" value="<?PHP echo $tenant->dateOfBirth; ?>">
      <br>
      <label for="phone">Telefon</label>
      <input readonly type="text" class="form-control" name="phone" value="<?PHP echo $tenant->phone; ?>">
      <br>
      <label for="email">E-Mail</label>
      <input readonly type="text" class="form-control" name="email" value="<?PHP echo $tenant->email; ?>">
    </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <label for="street">Strasse</label>
      <input readonly type="text" class="form-control" name="billingStreetName" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>
      <label for="postal">PLZ</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>
      <label for="city">Ort</label>
      <input readonly type="text" class="form-control" name="title" value="<?PHP echo $tenant->billingAddressFk; ?>">
      <br>

      <button href='' type="submit" class="btn btn-primary">Bearbeiten</button>
      <button type="button" class="btn btn-warning" onclick="return confirm('Mieter wirklich löschen?')">Löschen</button>
      <a href={{route('tenants.index')}} type="button" class="btn btn-secondary">Zurück</a>
      @endforeach
    </div>
  </div>
</div>




@endsection
