@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Mietererfassung</h3></br>
</div>

<div class="container">

  <div class="row">
    <div class="col-5">
      <label for="title">Anrede</label>
      <input type="text" class="form-control" placeholder="Frau / Herr" name="title" id="title" required>
      <br>
      <label for="name">Vorname</label>
      <input type="text" class="form-control" placeholder="Vorname" name="surname" id="surname" required>
      <br>
      <label for="lastName">Name</label>
      <input type="text" class="form-control" placeholder="Name" name="familyName" id="familyName" required>
      <br>
      <label for="birthday">Geburtsdatum</label>
      <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth">
      <br>
      <label for="phone">Telefon</label>
      <input type="text" class="form-control" placeholder="+41" name="phone" id="phone">
      <br>
      <label for="email">E-Mail</label>
      <input type="text" class="form-control" placeholder="xyz@domain.ch" name="email" id="email">
    </div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <label for="street">Strasse</label>
      <input type="text" class="form-control" placeholder="Strasse" name="street" id="street">
      <br>
      <label for="houseNr">Nr.</label>
      <input type="text" class="form-control" placeholder="Nr." name="houseNr" id="houseNr">
      <br>
      <label for="postal">PLZ</label>
      <input type="text" class="form-control" placeholder="PLZ" name="billingZipCode" id="billingZipCode">
      <br>
      <label for="city">Ort</label>
      <input type="text" class="form-control" placeholder="Ort" name="city" id="city">
      <br>

      <button href='' type="button" class="btn btn-primary">Speichern</button>
      <a href={{route('tenants.index')}} type="button" class="btn btn-secondary">Zurück</a>

    </div>
  </div>
</form>
</div>
@endsection
