@extends('main.app')
@section('title','Lawceylon-Homepage')
@section('headSection')
<link  href="css/app.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-header">
            <h3>Lawceylon Chat</h3>
            <div id="app">
                <vediochat-app></vediochat-app> 
            </div>
        </div>
    </div>
@endsection
@section('footerSection')
<script src="js/app.js" charset="utf-8"></script>
@endsection
