@extends('layouts.app')

@section('content')
<div class="container box">
<h3 align="left">Wohnungsübersicht</h3></br>
<div class="panel panel-default">
</div>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Beschreibung</th>
        <th scope="col">Wohnfläche</th>
        <th scope="col">Nettomiete</th>
        <th scope="col">Nebenkosten</th>
        <th scope="col">Bruttomiete</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

      @foreach($rooms as $room )

        <tr>
            <td scope="col">{{$room->id}}</td>
            <td scope="col">{{$room->appartmentName}}</td>
            <td scope="col">{{$room->squareMeters}}</td>
            <td scope="col">{{$room->rentCost}}</td>
            <td scope="col">{{$room->additionalCost}}</td>
            <td scope="col">{{$room->rentCost+$room->additionalCost}}</td>
            <td scope="col"><a href={{route('rooms.show', [$room->id])}} type="button" class="btn btn-primary" >Details</a></td>

            


            @if ($room->id)
            <form action="{{ url("/rooms/$room->id") }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit">delete</button>
</form>
    @endif
    @endforeach

    </tbody>
</table>
<a class="btn btn-primary" href={{route('rooms.create')}}>Wohnung hinzufügen</a>
</div>
@endsection
