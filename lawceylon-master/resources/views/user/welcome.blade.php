@extends('main/app')
@section('title','Lawceylon payment')
@section('content')
 <div class="container">
  <div class="row">
   <div class="col-md-8 col-md-offset-2">

    @if (Session::has('message'))
     <div class="alert alert-{{ Session::get('code') }}">
      <p>{{ Session::get('message') }}</p>
     </div>
    @endif

    <div class="panel panel-default">
     <div class="panel-heading">Express checkout</div>
     <div class="panel-body">
      Pay $20 via:
      <a href="{{ route('paypal.express-checkout') }}" class='btn-info btn'>PayPal</a>
     </div>
    </div>
   
    <div class="panel panel-default">
     <div class="panel-heading">Recurring payments</div>
     <div class="panel-body">
      Pay $20/month:
      <a href="{{ route('paypal.express-checkout', ['recurring' => true]) }}" class='btn-info btn'>PayPal</a>
     </div>
    </div>

   </div>
  </div>
 </div>
@endsection