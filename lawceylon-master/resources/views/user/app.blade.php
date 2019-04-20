@extends('main/app')
<a href="{{ route('vedio') }}"><h3>Vedio Chat</h3></a>
@section('title','Lawceylon-Newspage')
@section('headSection')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @if(auth()->user())
        <script>
            window.user = {
                id: {{ auth()->id() }},
                name: "{{ auth()->user()->name }}"
            };
            window.csrfToken = "{{ csrf_token() }}";
        </script>
    @endif
    <style>
        .video-container {

            width: 500px;
            height: 380px;
            margin: 0px auto;
            border: 2px solid #645cff;
            position: relative;
            box-shadow: 1px 1px 11px #9e9e9e;

            .my-video {
                width: 130px;
                position: absolute;
                left: 10px;
                bottom: 10px;
                border: 6px solid #2196F3;
                border-radius: 6px;
                z-index: 2;
            }

            .user-video {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 1;
            }
        }
        #background{
            background-image:url('/images/backgrounds/vedioback.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; 
        }
    </style>
@endsection
@section('content')
    <div class="container" id="background">
        <div id="app"></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection  