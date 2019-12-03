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

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTenant">Bearbeiten</button>

      <button type="button" class="btn btn-warning disabled" onclick="return confirm('Mieter wirklich löschen?')">Löschen</button>
      <a href={{route('tenants.index')}} type="button" class="btn btn-secondary">Zurück</a>
      @endforeach
    </div>
  </div>

<!-- Modal  Edit-->
  <div class="modal fade" id="editTenant" tabindex="-1" role="dialog" aria-labelledby="editTenant" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTenant">Mieter bearbeiten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="save.php" method="post">
        <div class="modal-body">
        <br>
        <span id="modal-myvar"></span>
        <br>
        <label for="title">Anrede</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->title; ?>" id="id" required>
        <br>
        <label for="surname">Vorname</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->surname; ?>" id="surname" required>
        <br>
        <label for="familyname">Name</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->familyname; ?>" id="familyname" required>
        <br>
        <label for="dateOfBirth">Geburtsdatum</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->dateOfBirth; ?>" id="dateOfBirth" required>
        <br>
        <label for="phone">Telefon</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->phone; ?>" id="phone" required>
        <br>
        <label for="email">E-Mail</label>
        <input class="form-control" type="text" value="<?PHP echo $tenant->email; ?>" id="email" required>


        <label for="billingStreetName">Strasse</label>
        <input type="text" class="form-control" value="<?PHP echo $tenant->billingAddressFk; ?>" id="billingStreetName" required>
        <br>
        <label for="billingZipCode">PLZ</label>
        <input type="text" class="form-control" value="<?PHP echo $tenant->billingAddressFk; ?>" id="billingZipCode" required>
        <br>
        <label for="billingCityName">Ort</label>
        <input type="text" class="form-control" value="<?PHP echo $tenant->billingAddressFk; ?>" id="billingCityName" required>
        <br>
        </div>
        </form>
        <div class="modal-footer">
        <!-- Buttons for Update NOT WORKING -->
                  <form id="userForm" action="/tenants/{{ $tenant->id }}" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                      <button type="submit" class="btn btn-danger">Speichern</button>     </div>
      </div>
    </div>
  </div>

</div>

@endsection
