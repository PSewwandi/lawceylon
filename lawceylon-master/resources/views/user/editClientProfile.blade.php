@extends('main/app')
@section('title','Lawceylon edit client profile')
@section('headSection')
    <link href="{{ asset('css/piyumika.css') }}" rel="stylesheet">
    <script type="text/javascript" src="/js/piyumika.js"></script>
@endsection
@section('content')
<div class="page">
    <div id="breadcrumb-section" class="section">
        <div class="container">
            <div class="page-title text-center">
                <h1>User Edit Profile</h1>
            </div>
        </div>
    </div><!-- breadcrumb-section -->
    <div class="all-categories section">
        <div class="container">
            <div class="ad-details">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <!-- profile edit -->
                        <form action="/ceditSave" method="POST" class="eform">
                            @if($client)
                                <body class="ebody">
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">User info</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Honorific</label>
                                                    <div class="col-sm-10">
                                                        <select  name="honorific" id="honorific">
                                                            <option value="Dr" id="Dr">Dr</option>
                                                            <option value="Mr" id="Mr">Mr</option>
                                                            <option value="Miss" id="Miss">Miss</option>
                                                            <option value="Mrs" id="Mrs">Mrs</option>       
                                                        <script>
                                                            document.getElementById("{{$client->honorific}}").selected=true;
                                                        </script>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="ptext" name="name" id="name" class="form-control" pattern="[a-zA-Z. ]{2,}" value="{{$client->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="ptext" name="lastname" id="lastname" class="form-control" pattern="[a-zA-Z. ]{2,}" value="{{$client->lastname}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Contact info</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-2">Contact number</label>
                                                    <div class="col-sm-10">
                                                        <input type="ptel" id="TP_Number" name="TP_Number" class="form-control" pattern="[0-9]{10}" value="0{{$client->phone}}" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">E-mail address</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" name="Email" pattern="{6,}" value="{{$client->email}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Current address</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="address" name="Address">{{$client->address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Security</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="eform-group">
                                                    <label class="col-sm-2 control-label">New password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,30}"><span ></span><br>
                                
                                                        <div id="message">
                                                            <h6>Password must contain the following:</h6>
                                                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                            <p id="number" class="invalid">A <b>number</b></p>
                                                            <p id="length" class="invalid">Minimum <b>5 characters</b></p>
                                                        </div>
                                                        <script>
                                                            var myInput = document.getElementById("Password");
                                                            var letter = document.getElementById("letter");
                                                            var capital = document.getElementById("capital");
                                                            var number = document.getElementById("number");
                                                            var length = document.getElementById("length");

                                                            // When the user clicks on the password field, show the message box
                                                            myInput.onfocus = function() {
                                                            document.getElementById("message").style.display = "block";
                                                            }

                                                            // When the user clicks outside of the password field, hide the message box
                                                            myInput.onblur = function() {
                                                            document.getElementById("message").style.display = "none";
                                                            }

                                                            // When the user starts to type something inside the password field
                                                            myInput.onkeyup = function() {

                                                                // Validate lowercase letters
                                                                var lowerCaseLetters = /[a-z]/g;
                                                                if(myInput.value.match(lowerCaseLetters)) {  
                                                                    letter.classList.remove("invalid");
                                                                    letter.classList.add("valid");
                                                                } else {
                                                                    letter.classList.remove("valid");
                                                                    letter.classList.add("invalid");
                                                                }
                                            
                                                                // Validate capital letters
                                                                var upperCaseLetters = /[A-Z]/g;
                                                                if(myInput.value.match(upperCaseLetters)) {  
                                                                    capital.classList.remove("invalid");
                                                                    capital.classList.add("valid");
                                                                } else {
                                                                    capital.classList.remove("valid");
                                                                    capital.classList.add("invalid");
                                                                }

                                                                // Validate numbers
                                                                var numbers = /[0-9]/g;
                                                                if(myInput.value.match(numbers)) {  
                                                                    number.classList.remove("invalid");
                                                                    number.classList.add("valid");
                                                                } else {
                                                                    number.classList.remove("valid");
                                                                    number.classList.add("invalid");
                                                                }
                                            
                                                                // Validate length
                                                                if(myInput.value.length >= 5) {
                                                                    length.classList.remove("invalid");
                                                                    length.classList.add("valid");
                                                                } else {
                                                                    length.classList.remove("valid");
                                                                    length.classList.add("invalid");
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Confirm password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" onkeyup="checkPass(); " class="form-control">
                                                    </div>
                                                    <span id="confirmMessage" class="confirmMessage"></span>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10 col-sm-offset-2">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <div class="btn-group"><span style="display: inline-block;">
                                                            <input type="submit" value="Submit" class="btn btn-success" />
                                                            <input type="button" value="Cancel" class="btn btn-info"  onclick="goBack()"/></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </body>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- all-categories -->
</div>	<!-- page -->
@endsection