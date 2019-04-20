@extends('main.app')
@section('title','Lawceylon Homepage')
@section('headSection')
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <div id="videos">
            <div id="subscriber"></div>
            <div id="publisher"></div>
        </div>
    </div>
@endsection
@section('footerSection')
    <script src="{{ asset('js/vedio.js') }}" src="js/app.js"></script>
@endsection