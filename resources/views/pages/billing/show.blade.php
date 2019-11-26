@extends('layouts.app') //stammt von layouts/ app.blade.php

@section('content')
  <h1>Billing-Page</h1>
 
 @foreach($openInvoices as $billing)
  <h3>ID {{$billing->id}}</h3>
@endforeach
@endsection
