@extends('layouts.app')

@section('content')


    <div class="container-header">
        <div class="container-fluid">
            <div class="col-md-8">
                <div class="container-fluid mt-3">
                    <h2 class="card-header">Mieterspiegel</h2></br>
                  </div>
              </div>
          </div>
      </div>

      <div class="container box">
      <h3 align="left">Gesamtkosten</h3>
      <div class="panel panel-default">

   <table class="table">
        <thead>
        <tr>
            <th scope="col">Mieter</th>
            <th scope="col">Rep.</th>
            <th scope="col">Öl</th>
            <th scope="col">Wasser</th>
            <th scope="col">Strom</th>
            <th scope="col">Hauswart</th>
            <th scope="col">Total</th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>


            <tr>
                <td scope="col"></td>
                <td scope="col"></td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>

                <td scope="col">
                </td>
            </tr>



        </tbody>
   </table>

   <button type="submit" class="btn btn-primary">Gesamtrechnung (PDF)</button>

@endsection
