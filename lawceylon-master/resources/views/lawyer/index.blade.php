@extends('main.app')
@section('title','Lawceylon lawyer profile')
@section('headSection') 
    <link href="{{ asset('css/piyumika.css') }}" rel="stylesheet">
    <script type="text/javascript" src="/js/piyumika.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- for ratings -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>  
@endsection
@section('content')
    <div class="body panel panel-default">
        @foreach ($lawyers as $lawyer)  
            <div class="container">
                <div class="container lemp-profile row">
                    <div class="col-md-3">
                        <div class="row">
                            <form  action="/storeImage" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="profile-img">                                       
                                    <img src="/images/lawyer/{{$lawyer->image}}" alt="upload a photo" id="img">                                      
                                    <div class="file btn btn-lg btn-primary">
                                        <input type="file" name="file" id="photo" >Change Photo</input>
                                    
                                        <script type="text/javascript">
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                var reader = new FileReader();           
                                                reader.onload = function (e) {
                                                    $('#img').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                            $("#photo").change(function(){
                                            readURL(this);
                                            });
                                        </script>
                                    </div>
                                   <br><br><button type="submit" class="button btn btn-lg btn-primary">Save Image</button><br><br>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile-work panel panel-default">
                                    <br>
                                    <div class="w3-container pale-blue">
                                        <div class="row">
                                        <center><label>Specialist Area</label></center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{$lawyer->Specialist_Area}}</font></p>
                                        </div>
                                        <div class="row">
                                        <center><label>Consultation Fee per  Hour</label></center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{ $lawyer->consultationFee}} LKR</font></p>
                                        </div>                       
                                        <div class="row">
                                        <center><label>Experience Years </label></center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{ $lawyer->Experience_Period}} Years</font></p>
                                        </div>
                                        
                                        <div class="row">
                                        <center><label>Gender</label><center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{ $lawyer->gender}}</font></p>
                                        </div>
                                        <div class="row">
                                        <center><label>Email</label></center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{ $lawyer->Email}}</font></p>
                                        </div>
                                        <div class="row">
                                        <center><label>Chamber Address </label></center>
                                        </div>
                                        <div class="row">
                                            <p align="center"><font color="#800000" size="2">{{ $lawyer->Address}}</font></p>
                                        </div>
                                    </div>                   
                                </div> 
                            </div>                  
                        </div>         
                    </div>                
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="profile-head">
                                    <h3>
                                        <span class="glyphicon glyphicon-education" style="font-size:35px;"> </span>
                                        <b> {{$lawyer->honorific." ".$lawyer->firstName." ".$lawyer->lastName}}</b>
                                    </h3>
                                    <br>
                                    <br>
                                    <br> 
                                </div>          
                            </div>
                        </div>
                        <div class="row">
                            <!-- ratings --> 
                            <div class="col-md-1"></div>
                            <div class="col-md-11">   
                                <div class="panel panel-default">                           
                                    <div class="rating">
                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $lawyerrate->averageRating }}" data-size="xs" disabled="">
                                        <h4 align="left">{{$ratings}} ratings</h4>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-md-11 panel panel-default">
                            <!-- calendar -->
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
                                </div>                        
                             <!--end calendar-->
                             </div>
                        </div>
                    </div>    
                    <div class="col-md-3">
                        <div class="col-md-5"></div>
                        <div class="row">
                            <a href='#' data-toggle="tooltip" data-placement="bottom" title="notification">
                                <span onclick="openMessage2()" >
                                    <span  class="glyphicon glyphicon-bell dropdown-toggle" style="font-size:24px;"></span><span class="badge badge-notify" style="background:red;">{{$notification}}</span>
                                </span>
                            </a>  
                            <div class="form-popup" id="notification">
                                <form action="/notification" class="form-container" method="POST">
                                    <br>
                                    <br>
                                    {{ csrf_field() }}
                                    @if($notification)
                                        @foreach($clients as $client)
                                            <div class="media">
                                                <div class="media-body">
                                                        <strong class="notification-title"><a href='{{ route('userViewLawyer',[$client->client_id])}}'>{{$client->name." ".$client->lastname}}</a> </strong>has sent you an {{$client->title}} 
                                                    <div class="notification-meta">
                                                        <strong>on {{$client->start_date}} at {{$client->time}}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group btn-group-xs">
                                                <button name="accept" type="submit" class="btn btn-success btn-xs" value="{{$client->id}}">Accept</button>
                                                <button name="reject" type="submit" class="btn btn-warning btn-xs" value="{{$client->id}}">Reject</button>
                                            </div>
                                        @endforeach
                                    @endif
                                    </br>
                                    <button type="button" class="btn btn-warning" onclick="closeMessage2()">Close</button>
                                </form>
                            </div> 
                            &nbsp&nbsp&nbsp
                            <a href='{{ route("editLawyerProfile",array("$lawyer->id")) }}'  data-toggle="tooltip" data-placement="bottom" title="edit profile">
                                <span class="glyphicon glyphicon-edit"  style="font-size:24px;"></span> 
                            </a>
                            &nbsp&nbsp&nbsp&nbsp
                            <span onclick="openMessage1()" data-toggle="tooltip" data-placement="bottom" title="message to admin">
                                <span class="glyphicon glyphicon-comment"  style="font-size:24px; color:blue;"></span>
                            </span>
                            <!-- popup message box -->
                            <div class="form-popup" id="myFormm">
                                <form action="/message" class="form-container" method="POST">
                                {{ csrf_field() }}
                                    <h4>Message To Admin</h4>
                                    <input id="name" name="name" placeholder="Name" type="ptext" max="50" required>
                                    <input id="email2" name="email" placeholder="Email" type="email" max="60" required>
                                    <textarea id="msg1" name="message"placeholder="Message" max="10000" required></textarea>
                                    <br>
                                    <input type="submit" value="Submit" class="btn"/>
                                    <button type="button" class="btn cancel" onclick="closeMessage1()">Close</button>
                                </form>
                            </div>
                            <!--end  popup message box -->
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="row">
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
                            <div class="panel panel-default">
                                <div class="w3-container w3-pale-blue">                                   
                                    <p align="center"><font color="#00008B" size="4">Today Events</font> </p>
                                    <ul>
                                        @if($dataset->count() ==0)
                                            <p align="center"><b><font color="red" > No Events Today</font></b> </p>
                                        @endif
                                        @foreach($dataset as $data)
                                            <li><a href='{{ route('userViewLawyer',[$data->client_id])}}'><p align="left"><font color="red" > {{$data->title}} at ({{$data->time}}) </font></p></a></li><br>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('footerSection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection