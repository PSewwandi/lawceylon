@extends('main/app')
@section('title','Lawceylon lawyer view user')
@section('content')    
<div class="page">
    <div id="breadcrumb-section" class="section">
        <div class="container">
            <div class="page-title text-center">
                <h1>Client Profile</h1>
            </div>
        </div>
    </div><!-- breadcrumb-section -->
    <div class="all-categories section">
        <div class="container">
            <div class="ad-details">
                <div class="row">    
                    <div class="profile-head">
                        <center><h3>
                            <span class="glyphicon glyphicon-user" style="font-size:35px;"> </span>
                            <b> {{$client->honorific." ".$client->name." ".$client->lastname}}</b>
                        </h3></center>
                    </div>
                </div>
                <div class="row">
                    <center>
                    <br>
                    <a href="{{ route('userVedio') }}"><span id="icon2"   class="fa fa-video-camera" style="font-size:35px;color:black;padding-right:25px"></span></a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp         
                    <a href="#"><span id="icon3"  class="fa fa-phone"  style="font-size:35px;color:black;padding-right:25px"></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp            
                    <a href="#"><span id="icon4"  class="fa fa-comments" style="font-size:35px;color:black;padding-right:25px"></span></a> 
                    </center> 
                </div>
                <div class="row">
                <div class="col-md-5"></div>
                    <div class="side-bar">
                        <div class="item-author widget">
                            <h4>Client Info</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="seller-info">
                                        <p><span>Name:</span>{{$client->honorific." ".$client->name." ".$client->lastname}}</p>
                                        <address>
                                            <span>Address:</span>{{$client->address}}
                                        </address>
                                        <p><span>Contact:</span>{{$client->phone}}</p>
                                        <p><span>NIC:</span>{{$client->nic}}</p>
                                        <p><span>Email:</span>{{$client->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- side-bar -->
                </div>
            </div>
        </div>
    </div> <!-- all-categories -->>
</div>	<!-- page -->
@endsection