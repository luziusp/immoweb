  @extends('layouts.app')

  @section('content')
    <div class="container box">

    <h3 align="left">Mieterübersicht</h3></br>

  <table class="table">
      <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Anrede</th>
          <th scope="col">Vorname</th>
          <th scope="col">Name</th>
          <th scope="col">Adresse</th>
          <th scope="col">Ort</th>
          <th scope="col">PLZ</th>
          <th scope="col">E-Mail</th>
          <th scope="col"></th>
          <th scope="col"></th>
      </tr>
      </thead>
      <tbody>

        @foreach( $tenants as $tenant )
          <tr>
              <td scope="col">{{$tenant->id}}</td>
              <td scope="col">{{$tenant->title}}</td>
              <td scope="col">{{$tenant->familyname}}</td>
              <td scope="col">{{$tenant->surname}}</td>
              <td scope="col">{{$tenant->billingAddressFk}}</td>
              <td scope="col">{{$tenant->billingAddressFk}}</td>
              <td scope="col">{{$tenant->billingAddressFk}}</td>

              <td scope="col"><a href="mailto:{{$tenant->email}}">{{$tenant->email}}</a></td>
              <td scope="col"><a href={{route('tenants.show', [$tenant->id])}} type="button" class="btn btn-primary" >Details</a></td>

                <td scope="col">
                @if ($tenant->id)
                    <form action="{{ url("/tenants/$tenant->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Sind Sie sicher?')" class="btn btn-warning disabled">Löschen</button>

                    </form>
                </td>
                <td scope="col">
                <!-- Button with sending attributes to modal-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTenant">Bearbeiten</button>
                </td>
                @endif
        </tr>
          @endforeach
      </tbody>
  </table>

  <!-- OLD, delete?-->
  <!--<a class="btn btn-primary" href={{route('tenants.create')}}>Mieter hinzufügen</a>-->


  <!-- Button to open new Tenant creation -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTenant">
  Mieter hinzufügen
  </button>


  <div class="modal fade" id="newTenant" tabindex="-1" role="dialog" aria-labelledby="newTenantLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newTenantLabel">Neuer Mieter erstellen</h5>
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
          <input class="form-control" type="text" placeholder="Frau / Herr" name="title" id="title" required>
          <br>
          <label for="surname">Vorname</label>
          <input class="form-control" type="text" placeholder="Vorname" name="surname" id="surname" required>
          <br>
          <label for="familyName">Name</label>
          <input class="form-control" type="text" placeholder="Nachname" name="familyName" id="familyName" required>
          <br>
          <label for="dateOfBirth">Geburtsdatum</label>
          <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth">
          <br>
          <label for="phone">Telefon</label>
          <input type="text" class="form-control" placeholder="+41" name="phone" id="phone">
          <br>
          <label for="email">E-Mail</label>
          <input class="form-control" type="text" placeholder="xyz@domain.ch" name="email" id="email">
          <br>
          <label for="billingStreetName">Strasse</label>
          <input type="text" class="form-control" placeholder="Strasse" name="billingStreetName" id="billingStreetName">
          <br>
          <label for="houseNr">Nr.</label>
          <input type="number" class="form-control" placeholder="Nr." name="houseNr" id="houseNr">
          <br>
          <label for="billingZipCode">PLZ</label>
          <input type="text" class="form-control" placeholder="PLZ" name="billingZipCode" id="billingZipCode">
          <br>
          <label for="billingCityName">Ort</label>
          <input type="text" class="form-control" placeholder="Ort" name="billingCityName" id="billingCityName">
          <br>
        </div>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
          <button type="button" class="btn btn-primary" type="submit">Speichern</button>
        </div>

      </div>
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
