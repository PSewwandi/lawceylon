@extends('main.app')
@section('headSection')
<style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div id="breadcrumb-section" class="section">
    <div class="container">
        <div class="page-title text-center">
            <h1>This Tutorial is About Using LawCeylon</h1>
        </div>
    </div>
</div><!-- breadcrumb-section -->    
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h2 style="color:SlateBlue;">Lawyer Profiles,</h2>
        <ul>
            <li><h1 style="font-size:200%;color:Tomato";>Registered users can visit Lawyers profiles</h3></li>
            <img src="/images/tutorials/Capture6.PNG"  class=img-fluid mb-3>
            <p style="font-size:1.5em; ">This is how a registered user can view a profile of a lawyer
                <ul style="list-style-type:disc">
                    <li style="font-size:1.5em;">User can create an appointment for the lawyer</li>
                    <li style="font-size:1.5em;">User can contact lawyer through voice calls,video calls and messaging</li>
                    <li style="font-size:1.5em;">User can rate lawyer </li>
                </ul>
            </p>
            <p><a href="/search?nameSearch=" class="btn btn-info " style="margin:10px" >Click here to Search Lawyers</a></p>
            <li><h2 style="font-size:200%; color:Tomato">User Profile</h2></li>
            <img src="/images/tutorials/Capture7.PNG"  class=img-fluid mb-3>
            <p>  
                <ul style="list-style-type:disc">
                    <li style="font-size:1.5em;">User recieves nortifications if a lawyer accepts user's appointment</li>
                    <li style="font-size:1.5em;">Calender gives information about the appointments created by user</li>
                    <li style="font-size:1.5em;">User can contact admin through a message  </li>
                </ul>
            </p>      
            </ul>     
        </div>
    </div>
    <a href="/tutorial/tutorials3" class="button pull-left">Previous Page</a>       
</div>
@endsection