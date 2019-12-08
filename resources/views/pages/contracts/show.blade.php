@extends('layouts.app')

@section('content')
<div class="container">
<h3 align="left">Vertragsdetails</h3></br>
</div>

<div class="container">
  <div class="row">
  <div class="col-4">
  </div>
  <div class="col-4">
      <label for="id">#</label>
      <input readonly type="number" class="form-control" name="id" value="<?PHP echo $contract->id; ?>"  >
      <br>


      @foreach($tenant as $tenant)
      <label for="tenantFk">Mieter</label>
      <input readonly type="text" class="form-control" name="tenantFk" value="<?PHP echo $tenant->surname; ?>">
      <br>
      @endforeach



      @foreach($room as $room)
      <label for="tenantFk">Wohnung</label>
      <input readonly type="text" class="form-control" name="appartmentFk" value="<?PHP echo $room->appartmentName; ?>">
      <br>
      @endforeach
      <label for="startDate">Von</label>
      <input readonly type="date" class="form-control" name="startDate" value="<?PHP echo $contract->startDate; ?>">
      <br>
      <label for="terminationDate">Bis</label>
      <input readonly type="date" class="form-control" name="terminationDate" value="<?PHP echo $contract->terminationDate; ?>">
      <br>

      <div class="btn-group">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editContract">Bearbeiten</button>
      <td scope="col"><a href={{route('contracts.index')}} type="button" class="btn btn-secondary" >Zurück</a></td>
      </div>

      <div class="col-4">
      </div>

    </div>

      <!--End Details-->




      <!--Modal Rents-->
           <div class="modal fade" id="editLoan" tabindex="-1" role="dialog" aria-labelledby="editLoan" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title" id="editLoan">Mietzinsüberblick</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>

                 <form method="post" action="{{ route('contracts.update', $contract->id) }}">
                 @csrf
                 @method('PATCH')
                 <div class="modal-body">


                     <table class="table table-light">
                       <thead class="thead-dark">
                         <tr>
                           <th>Jahr</th>
                           <th>Monat</th>
                           <th>Bezahlt - Offen</th>
                         </tr>
                       </thead>

                       <tbody>
                         <tr>
                           <th>2019</th>
                           <th>Dezember</th>
                           <th></th>
                         </tr>
                         <tr>
                           <th>2019</th>
                           <th>November</th>
                           <th>Bezahlt - Offen</th>
                         </tr>
                         <tr>
                           <th>2019</th>
                           <th>Oktober</th>
                           <th>Bezahlt - Offen</th>
                         </tr>
                       </tbody>
                     </table>

                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                   <button type="submit" class="btn btn-success">Speichern</button>
                 </div>
               </div>
               </form>
             </div>
           </div>
           <!--End Modal Rents-->


    <!-- Modal  Edit-->
    <div class="modal fade" id="editContract" tabindex="-1" role="dialog" aria-labelledby="editContract" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editContract">Vertragsdaten bearbeiten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form method="post" action="{{ route('contracts.update', $contract->id) }}">
          @csrf
          @method('PATCH')
          <div class="modal-body">

          <label for="id">#</label>
          <input class="form-control" readonly type="text" value="<?php echo $contract->id; ?>" required>
          <br>


          <label for="tenantFk">Mieter</label>
          <select class="form-control"id="tenantFk" name="tenantFk" value="{{$contract->tenantFk}}" required>
           <?php
           foreach($tenants as $tenant ):
           echo '<option value="'.$tenant->id.'">'.$tenant->surname.'</option>';
           endforeach;
           ?>
        </select>

<br>


          <label for="appartmentFk">Wohnung</label>
          <div class="form-group">
            <select class="form-control" id="appartmentFk" name="appartmentFk"  value="{{$contract->appartmentFk}}" required>
            <?php
           foreach($rooms as $room ):
           echo '<option value="'.$room->id.'">'.$room->appartmentName.'</option>';
           endforeach;
           ?>
          </select>
          </div>


            <label for="startDate">Von</label>
            <input type="date" class="form-control" name="startDate" value="{{$contract->startDate}}" >
            <br>
            <label for="terminationDate">Bis</label>
            <input type="date" class="form-control" name="terminationDate" value="{{$contract->terminationDate}}" >
            <br>
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
