@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Wohnungsdetails</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
    <div class="col-4">
    @foreach($room as $room)
        <label for="title">Nr.</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->id; ?>" >
        <br>
        <label for="name">Beschreibung</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->Description; ?>" >
        <br>
        <label for="lastName">Wohnfläche</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->squareMeters; ?>" >
        <br>
        <label for="birthday">Nettomiete</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->rentCost; ?>">
        <br>
        <label for="phone">Nebenkosten</label>
        <input readonly type="text" class="form-control" name="title"value="<?PHP echo $room->additionalCost; ?>" >
        <br>
        <label for="email">Bruttomiete</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->Description; ?>">
        <br>
        <button type="submit" class="btn btn-primary disabled">Bearbeiten</button>
        <button type="submit" class="btn btn-primary disabled">Löschen</button>
        <td scope="col"><a href={{route('rooms.index')}} type="button" class="btn btn-primary" >Zurück</a></td>
        @endforeach
      </div>

    <div class="col-4">
    </div>


    </div>
  </div>
</div>




@endsection
