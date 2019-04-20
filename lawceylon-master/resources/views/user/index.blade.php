@extends('main/app')
@section('title','Lawceylon user profile')
@section('headSection')
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>  
    <script type="text/javascript" src="/js/piyumika.js"></script>
    <link href="{{ asset('css/piyumika.css') }}" rel="stylesheet">
@endsection   
@section('content') 
<div class="page">
    <div id="breadcrumb-section" class="section">
        <div class="container">
            <div class="page-title text-center">
                <h1>User Profile</h1>
            </div>
        </div>
    </div><!-- breadcrumb-section -->
    <div class="all-categories section">
        <div class="container">
            <div class="ad-details">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <div class="col-md-4">
                            <div class="item">
                                <div class="details-description"> 
                                    <div class="filter-list">
                                        <div id="advanced-filter">
                                            <div class="filter-heading">
                                                <div class="item">
                                                <!-- new -->                                                                                                  
                                                    <p align="center"><font color="#00008B" size="4">Today Events</font> </p>                 
                                                    @if($dataset->count() ==0)
                                                        <p align="center"><b><font color="red" > No Events Today</font></b> </p>
                                                    @endif
                                                    @foreach($dataset as $data)
                                                        <a href='{{ route('lawyerViewUser',[$data->lawyer_id])}}'><p align="left"><font color="red" > {{$data->title}} at ({{$data->time}}) </font></p></a><br>
                                                    @endforeach 
                                                <!-- new -->                                             
                                                </div>  <!-- item   -->
                                            </div><!-- filter-heading --> 
                                        </div><!-- advanced-filter -->
                                    </div><!-- filter-list -->
                                </div>
                            </div><!-- item -->
                        </div>
                        <div class="col-md-8">
                            <!-- calender goes here -->
                            <div class="AddedCal">  
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><p align="center"><b>Calendar</b></p></div>
                                                <div class="panel-body">
                                                    {!! $calendar->calendar() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                         
                            </div>  <!--end calendar-->
                        </div>
                    </div><!--col-md-8 end-->
                   
                    <div class="col-sm-5 col-md-4">
                        <a href='#' data-toggle="tooltip" data-placement="bottom" title="notifications">
                            <span onclick="openMessage2()">
                                <span  class="glyphicon glyphicon-bell dropdown-toggle" style="font-size:24px;"></span><span class="badge badge-notify" style="background:red;">{{$notification}}</span>
                            </span>
                        </a>  
                        <div class="form-popup" id="notification">
                            <form action="/notifications" class="form-container" method="POST">
                                {{ csrf_field() }}
                                <h4>Pending Appointments</h4>
                                @if($notification)
                                    @foreach($appointments as $appointment)
                                        <li class="notification">
                                            <div class="media">
                                                <div class="media-body">
                                                        pending <strong>{{$appointment->title}}</strong> appointment on <strong>{{$appointment->start_date}}</strong> at <strong>{{$appointment->time}}</strong> to 
                                                        <big><strong class="notification-title"><a href='{{ route('lawyerViewUser',[$appointment->lawyer_id])}}'>{{$appointment->honorific.". ".$appointment->name." ".$appointment->lastname}}.</a> </strong></big>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="btn-grp">
                                            <button name="remove" type="submit" class="btn btn-info btn-xs" value="{{$appointment->id}}">Remove Appointment</button>
                                        </div>
                                    @endforeach
                                @endif
                                </br>
                                <button type="button" class="btn btn-warning" onclick="closeMessage2()">Close</button>
                            </form>
                        </div>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href='{{ route("editClientProfile")}}' data-toggle="tooltip"  data-placement="bottom" title="edit profile">
                            <span class="glyphicon glyphicon-edit"  style="font-size:26px;"></span>
                        </a>  
                        <div class="side-bar">
                            <div class="item-author widget">
                                <h4>User Info</h4>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="seller-info">
                                            <p><span>Name:</span>{{$clients->honorific." ".$clients->name." ".$clients->lastname}}</p>
                                            <address>
                                                <span>Address:</span>{{$clients->address}}
                                            </address>
                                            <p><span>Contact:</span>{{$clients->phone}}</p>
                                            <p><span>NIC:</span>{{$clients->nic}}</p>
                                            <p><span>Email:</span>{{$clients->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-seller widget">
                                <h4>Contact Admin</h4>
                                <form id="contact-form" class="contact-form" name="contact-form" method="POST" action="/cmessage">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" required="required" placeholder="Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" required="required" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message"  required="required" class="form-control" rows="7" placeholder="Message"></textarea>
                                            </div>             
                                        </div>     
                                    </div>
                                    <div class="row">       
                                        <div class="alert alert-success">
                                            <strong>
                                                @if(session()->has('message'))
                                                    {{ session()->get('message') }}
                                                @endif
                                            </strong> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Submit Message</button>
                                        <button type="reset" class="btn btn-info">Cancel Message</button>
                                    </div>
                                </form>
                            </div><!--contact-seller widget-->
                        </div><!-- side-bar -->
                    </div><!--col-md-4-->
                </div><!--row-->
            </div><!--ad-details-->
        </div><!--container-->
    </div> <!-- all-categories -->
</div>	<!-- page -->
@endsection
@section('footerSection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection
