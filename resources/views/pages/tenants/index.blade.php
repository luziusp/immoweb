  @extends('layouts.app')

  @section('content')
    <div class="container box">

    <h3 align="left">Mieterübersicht</h3></br>
    <div class="panel panel-default">
    <div class="panel-heading">Nach Mieter suchen</div>
    <div class="panel-body">
    <div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Suchen" />
    </div>

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
              <th scope="col"><button type="submit" class="btn btn-primary disabled">Delete</button>

        </tr>
          @endforeach

      </tbody>
  </table>

<a class="btn btn-primary" href={{route('tenants.create')}}>Mieter hinzufügen</a>
  @endsection
