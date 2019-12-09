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
        <label for="title">#</label>
        <input readonly type="text" class="form-control" name="title" value="<?PHP echo $room->id; ?>" >
        <br>
        <label for="Description">Beschreibung</label>
        <input readonly type="text" class="form-control" name="Description" value="<?PHP echo $room->Description; ?>" >
        <br>
        <label for="appartmentName">Wohnungstitel</label>
        <input readonly type="text" class="form-control" name="appartmentName" value="<?PHP echo $room->appartmentName; ?>" >
        <br>
        <label for="squareMeters">Wohnfläche</label>
        <input readonly type="number" class="form-control" name="squareMeters" value="<?PHP echo $room->squareMeters; ?>" >
        <br>
        <label for="noOfRooms">Anzahl Zimmer</label>
        <input readonly type="number" class="form-control" value="<?php echo $room->noOfRooms; ?>" >
        <br>
        <label for="rentCost">Nettomiete</label>
        <input readonly type="number" class="form-control" name="rentCost" value="<?PHP echo $room->rentCost; ?>">
        <br>
        <label for="additionalCost">Nebenkosten</label>
        <input readonly type="number" class="form-control" name="additionalCost" value="<?PHP echo $room->additionalCost; ?>" >
        <br>
        <label for="totalCost">Bruttomiete</label>
        <input readonly type="number" class="form-control" name="totalCost" value="<?PHP echo $room->rentCost+$room->additionalCost; ?>">
        <br>


        <div class="btn-group">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editAppartment">Bearbeiten</button>

        <td scope="col"><a href={{route('rooms.index')}} type="button" class="btn btn-secondary" >Zurück</a></td>
        @endforeach
      </div>

    <div class="col-4">
    </div>
    </div>


<!-- Modal  Edit-->
<div class="modal fade" id="editAppartment" tabindex="-1" role="dialog" aria-labelledby="editAppartment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAppartment">Wohnungsdaten bearbeiten</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('rooms.update', $room->id) }}">
      @csrf
      @method('PATCH')
      <div class="modal-body">

      <div class="form-group">
      <input type= "hidden" name = "id" value = "<?php echo $room->id; ?>">
      </div>
        <div class="form-group">
        <label for="title">#</label>
        <input type="text" class="form-control" value="<?PHP echo $room->id; ?>" required readonly>
        </div>
        <div class="form-group">
        <label for="Description">Beschreibung</label>
        <input readonly type="text" class="form-control" name="Description" value="{{$room->Description}}" >
        </div>
        <div class="form-group">
        <label for="appartmentName">Wohnungstitel</label>
        <input readonly type="text" class="form-control" name="appartmentName" value="{{$room->appartmentName}}" >
        </div>
        <div class="form-group">
        <label for="squareMeters">Wohnfläche</label>
        <input type="number" class="form-control" value="{{$room->squareMeters}}" name="squareMeters" id="squareMeters" required>
        </div>
        <div class="form-group">
        <label for="noOfRooms">Anzahl Zimmer</label>
        <input type="double" class="form-control" value="{{$room->noOfRooms}}" name="noOfRooms" id="noOfRooms" required>
        </div>
        <div class="form-group">
        <label for="rentCost">Nettomiete</label>
        <input type="double" class="form-control" value="{{$room->rentCost}}" name="rentCost" id="rentCost" required>
        </div>
        <div class="form-group">
        <label for="additionalCost">Nebenkosten</label>
        <input type="double" class="form-control" value="{{$room->additionalCost}}" name="additionalCost" id="additionalCost" required>
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" value="1" name="isActive" id="isActive" required readonly>
        </div>
      </div>

      <div class="modal-footer">



                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                    <button type="submit" class="btn btn-success">Speichern</button>
                    </div>
    </div>
    </form>
  </div>
</div>
</div>





@endsection
