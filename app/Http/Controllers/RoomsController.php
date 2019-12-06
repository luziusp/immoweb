<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rooms;

class RoomsController extends Controller
{
        public function index(){
                $rooms = Rooms:: getAll();

                       return view('pages.rooms.index', ['rooms' => $rooms]);
        }

        public function show($id)
          {
            $room = Rooms::find($id);
            return view('pages.rooms.show', ['room' =>  $room]);
          }

        public function create()
          {
            return view('pages.rooms.create');
          }

          public function destroy($id)
          {
            Rooms::deleteRoom($id);
            $rooms = Rooms::getAll();
            return view('pages.rooms.index', ['rooms' =>  $rooms]);


          }

          public function update (request $request, $id){
            $data = request()->except(['_token', '_method', 'id']);

            Rooms::whereId($id)->update($data);

            return back();
          }

          public function store (request $request){
            return $request->all();

           Rooms::create($request->all());
            return back();

          }



}
