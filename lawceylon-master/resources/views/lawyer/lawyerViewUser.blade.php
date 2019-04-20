@extends('main.app')
@section('title','Lawceylon user view lawyer')
@section('headSection')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
@endsection
@section('content')
<div class="page">
    <div class="col-md-4">
        <center><img src="/images/lawyer/{{$lawyer->image}}" alt="upload" class="img-thumbnailclass=" width="225" height="225"></center>
        <div class="row">
            <div class="profile-head">
                <center><h3>
                        <span class="glyphicon glyphicon-education" style="font-size:35px;"> </span>
                        <b> {{$lawyer->honorific." ".$lawyer->firstName." ".$lawyer->lastName}}</b>
                    </h3></center>
            </div>
        </div>
        <div class="row">
            <div class="profile-head">
                    <center><h3>
                        <font size="3"> {{$lawyer->biography}}</font>
                        <span class="glyphicon glyphicon-pencil" style="font-size:20px;"></span>
                    </h3></center>
            </div>
        </div>       
        <center>
            <br>
            <a href="{{ route('paypal') }}"><span id="icon2"   class="fa fa-video-camera" style="font-size:35px;color:black;padding-right:25px"></span></a> &nbsp&nbsp&nbsp&nbsp         
            <a href="{{ route('lawyerVedio') }}"><span id="icon3"  class="fa fa-phone"  style="font-size:35px;color:black;padding-right:25px"></span></a>            
            <a href="#"><span id="icon4"  class="fa fa-comments" style="font-size:35px;color:black;padding-right:25px"></span></a> 
        </center>
        <br>
        <center><form action="{{ route('ratings.rate') }}" method="POST">
            {{ csrf_field() }}
            <div class="container-fliud">
                <div class="rating">
                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $lawyer->averageRating }}" data-size="xs">
                    <input type="hidden" name="id" required="" value="{{ $lawyer->id }}">
                    <button class="btn btn-info">Submit Rate</button>
                    <span class="review-no">Total Rates : {{$ratings}}</span>
                    <br><br>
                </div>
            </div>
        </form></center>
    </div>
    <div class="col-md-4">
        <!-- lawyer details -->
        <div class="item-author widget panel panel-default">
            <div style="margin-left:18px"><h4><b>Lawyer Info</b></h4></div>
            <div class="row">
                <div class="col-md-8" style="margin-left:18px;">
                    <div class="seller-info">
                        <p size="3"><font size="4"><span>Name : </span>{{$lawyer->honorific." ".$lawyer->firstName." ".$lawyer->lastName}}</font></p>
                        <address>
                        <font size="4"><span>Address : </span>{{$lawyer->Address}}</font>
                        </address>
                        <p><font size="4"><span>Contact : </span>{{$lawyer->TP_Number}}</font></p>                         
                        <p><font size="4"><span>Email : </span>{{$lawyer->Email}}</font></p>
                        <p><font size="4"><span>Specialist Area : </span>{{$lawyer->Specialist_Area}}</font></p>
                        <p><font size="4"><span>Experience Period : </span>{{$lawyer->Experience_Period}}</font></p>
                        <p><font size="4"><span>Consultation Fee : </span>{{$lawyer->consultationFee}}</font></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- lawyer details -->
       
    <!-- apppointment goes here -->
    <div class="col-md-4">      
        <div class="alert alert-success">
            <strong>
                <center>
                    <big>
                        @if(session()->has('message'))
                            {{ session()->get('message') }}
                        @endif
                    </big>
                </center>
            </strong> 
        </div>
        <div class="details-description"  style="background-color:#6495ED;"> 
            <div class="filter-list">
                <div id="advanced-filter">
                    <div class="filter-heading">
                        <a data-toggle="collapse" data-parent="#advanced-filter" href="#advanced">
                            <h4 class="list-title">Create an Appointment<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                        </a>
                    </div><!-- filter-heading -->
                    <div id="advanced" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <h5>Types</h5>
                            <form id="appointment-form" class="appointment-form" method="POST" action="/appointment">
                                {{ csrf_field() }}
                                <ul>
                                    <li><label for="meeting"><input type="radio" name="appointment" id="meeting" value="meeting">Appointment For Meeting</label></li>
                                    <li><label for="video"><input type="radio" name="appointment" id="video" value="video call">Appointment For Video Calling</label></li>
                                    <li><label for="call"><input type="radio" name="appointment" id="call" value="call">Appointment For Voice Calling</label></li><br><br>
                                </ul>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Date : 
                                                <input type="date" name="start_date" reuired/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Time:
                                                <input type="time" name="time" required="required"/><br>
                                            </label>
                                        </div>
                                    </div>     
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-info">Cancel</button>
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div>
                </div><!-- advanced-filter -->
            </div><!-- filter-list -->
        </div>
    </div>
    <div class="row"></div>
</div>
@endsection