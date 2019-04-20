@extends('main.app')
@section('title','Lawceylon edit lawyer profile')
@section('headSection')
    <link href="{{ asset('css/piyumika.css') }}" rel="stylesheet">
    <script type="text/javascript" src="/js/piyumika.js"></script>
@endsection
@section('content')
   <form action="/editSave" method="POST" class="eform">
       @if($lawyers)
           <div class="ebody">
               <div class="row">
                   <div class="col-xs-12 col-sm-9">
                       <div class="panel panel-default">
                            <div class="panel-body text-center">                         
                                <img src="/images/lawyer/{{$lawyers->image}}" class="center" alt="upload" id="img"><br><br>                       
                            </div>
                        </div>
                        <div class="panel panel-default">
                             <div class="panel-heading">
                                 <h4 class="panel-title">User info</h4>
                             </div>
                             <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2">Honorific</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="honorific" id="honorific">
                                            <option value="Dr" id="Dr">Dr</option>
                                            <option value="Mr" id="Mr">Mr</option>
                                            <option value="Miss" id="Miss">Miss</option>
                                            <option value="Mrs" id="Mrs">Mrs</option>      
                                        </select>
                                        <script>
                                            document.getElementById("{{$lawyers->honorific}}").selected=true;
                                        </script>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First name</label>
                                    <div class="col-sm-10">
                                        <input type="ptext" name="firstName" id="firstName" class="form-control" pattern="[a-zA-Z. ]{2,}" value="{{$lawyers->firstName}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last name</label>
                                    <div class="col-sm-10">
                                        <input type="ptext" name="lastName" id="lastName" class="form-control" pattern="[a-zA-Z. ]{2,}" value="{{$lawyers->lastName}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Specialist Area</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="Specialist_Area" id="job"  required>
                                            <option value="All" id="All">All</option>
                                            <option value="Debt Recovery" id="Debt Recovery">Debt Recovery</option>
                                            <option value="Business" id="Business">Business"</option>
                                            <option value="Contracts and Litigation" id="Contracts and Litigation">Contracts and Litigation</option>
                                            <option value="Criminal Charges" id="Criminal Charges">Criminal Charges</option>
                                            <option value="Employment and Labor" id="Employment and Labor">Employment and Labor</option>
                                            <option value="Family" id="Family">Family</option>
                                            <option value="Government and Health" id="Government and Health">Government and Health</option>
                                            <option value="Immigration" id="Immigration">Immigration</option>
                                            <option value="Intellectual Property" id="Intellectual Property">Intellectual Property</option>
                                            <option value="Personal Injury" id="Personal Injury">Personal Injury</option>
                                            <option value="Real Estate" id="Real Estate">Real Estate</option>
                                            <option value="Taxation" id="Taxation">Taxation</option>
                                            <option value="Trusts and Estates" id="Trusts and Estates">Trusts and Estates</option>
                                            <option value="Company Secretarial" id="Company Secretarial">Company Secretarial</option>
                                            <option value="Notarial Services" id="Notarial Services">Taxation</option>
                                            <script>
                                                document.getElementById("{{$lawyers->Specialist_Area}}").selected=true;
                                            </script>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-2">Biography</label>
                                    <div class="col-sm-10">
                                        <textarea id="bio" name="biography">{{$lawyers->biography}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Experience Years</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="Experience_Period" name="Experience_Period" value="{{$lawyers->Experience_Period}}" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Consultation Fee</label>
                                    <div class="col-sm-10">
                                        <input type="ptext" id="consultationFee" name="consultationFee" class="form-control"  value="{{$lawyers->consultationFee}}">
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
                                         <input type="ptel" id="TP_Number" name="TP_Number" class="form-control" pattern="[0-9]{10}" value="0{{$lawyers->TP_Number}}" required>
                                     </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">E-mail address</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="Email" pattern="{6,}" value="{{$lawyers->Email}}"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Work address</label>
                                        <div class="col-sm-10">
                                            <textarea id="address" name="Address">{{$lawyers->Address}}</textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Security</h4>
                            </div>
                            <div class="panel-body">
                                @if(session()->has('message'))
                                <li>{{ session()->get('message') }}</li>
                                @endif
                                <div class="eform-group">
                                    <label class="col-sm-2 control-label">New password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,30}"><span ></span>
                                        <br>
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
                                        <div class="btn-group" ><span style="display: inline-block;">
                                            <input  class="pull-left pbutton " type="submit" value="Submit" />                               
                                            <input class="pull-right pbutton " type="button" value="Back" onclick="goBack()" /></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                   </div>
               </div>
            </div>
       @endif
   </form>
@endsection
