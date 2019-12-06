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
      <label for="surname">Vorname</label>
      <input readonly type="text" class="form-control" name="surname" value="<?PHP echo $tenant->surname; ?>">
      <br>
      <label for="familyname">Name</label>
      <input readonly type="text" class="form-control" name="familyname" value="<?PHP echo $tenant->familyname; ?>">
      <br>
      <label for="dateOfBirth">Geburtsdatum</label>
      <input readonly type="date" class="form-control" name="dateOfBirth" value="<?PHP echo $tenant->dateOfBirth; ?>">
      <br>
      <label for="phone">Telefon</label>
      <input readonly type="number" class="form-control" name="phone" value="<?PHP echo $tenant->phone; ?>">
      <br>
      <label for="email">E-Mail</label>
      <input readonly type="text" class="form-control" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" value="<?PHP echo $tenant->email; ?>">
</div>

    <div class="col-1">
    </div>

    <div class="col-5">
      <label for="billingStreetName">Strasse</label>
      <input readonly type="text" class="form-control" name="billingStreetName" value="<?PHP echo $tenant->billingStreetName; ?>">
      <br>
      <label for="billingZipCode">PLZ</label>
      <input readonly type="number" class="form-control" name="billingZipCode" value="<?PHP echo $tenant->billingZipCode; ?>">
      <br>
      <label for="billingCityName">Ort</label>
      <input readonly type="text" class="form-control" name="billingCityName" value="<?PHP echo $tenant->billingCityName; ?>">
      <br>

      <div class="btn-group">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editTenant">Bearbeiten</button>
      <div scope="col">
      @if ($tenant->id)
          <form action="{{ url("/tenants/$tenant->id") }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</button>
          </form>
      </div>
      @endif
      <td scope="col"><a href={{route('tenants.index')}} type="button" class="btn btn-secondary">Zurück</a></td>
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

        <form method="post" action="{{ route('tenants.update', $tenant->id) }}">
        @csrf
        @method('PATCH')

        <div class="modal-body">
        <br>
        <label for="title">Anrede</label>
        <input class="form-control" type="text" value="{{$tenant->title}}" name="title" id="title" required>
        <br>
        <label for="surname">Vorname</label>
        <input class="form-control" type="text" value="{{$tenant->surname}}" name="surname" id="surname" required>
        <br>
        <label for="familyname">Name</label>
        <input class="form-control" type="text" value="{{$tenant->familyname}}" name="familyname" id="familyname" required>
        <br>
        <label for="dateOfBirth">Geburtsdatum</label>
        <input class="form-control" type="date" value="{{$tenant->dateOfBirth}}" name="dateOfBirth" id="dateOfBirth" required>
        <br>
        <label for="phone">Telefon</label>
        <input class="form-control" type="number" placeholder="+41" value="{{$tenant->phone}}" name="phone" id="phone" required>
        <br>
        <label for="email">E-Mail</label>
        <input class="form-control" type="text" placeholder="xyz@domain.ch" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" value="{{$tenant->email}}" name="email" id="email" required>
        <br>
        <label for="billingStreetName">Strasse</label>
        <input type="text" class="form-control" value="{{$tenant->billingStreetName}}" name="billingStreetName" id="billingStreetName" required>
        <br>
        <label for="billingZipCode">PLZ</label>
        <input type="number" class="form-control" value="{{$tenant->billingZipCode}}" name="billingZipCode" id="billingZipCode" required>
        <br>
        <label for="billingCityName">Ort</label>
        <input type="text" class="form-control" value="{{$tenant->billingCityName}}" name="billingCityName" id="billingCityName" required>
        <br>

        <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                      <button type="submit" class="btn btn-success">Speichern</button>
                      </div>
        </div>
        </form>

      </div>
    </div>
  </div>
</div>


@endsection
