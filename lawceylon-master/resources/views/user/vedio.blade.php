@extends('main.app')
@section('title','Lawceylon Homepage')
@section('headSection')
    <link href="{{ asset('css/vedio.css') }}" rel="stylesheet">
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