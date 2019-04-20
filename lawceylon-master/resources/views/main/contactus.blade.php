@extends('main.app')
@section('title','Lawceylon contact us')
@section('content')
<section class="mb-4">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="row">
                <!--Grid column-->
                <form id="contact-form" name="contact-form" action="/saveContactUs" method="POST">
                    <div class="col-md-9 mb-md-0 mb-5">
                        <br>
                        <br>
                        <!--Section heading-->
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
                        <br>
                        <br>
                        {{ csrf_field() }}
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control" max="100" required>
                                </div>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email">Your Email</label>
                                    <input type="email" id="email" name="email" class="form-control" max="150" required>
                                </div>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" max="150" required>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="message">Your Message</label>
                                    <textarea type="text" id="message" name="message" rows="2" max="300" class="form-control md-textarea" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <br>
                        <br>
                        <div class="text-center text-lg-left">
                            <input type="submit" class="btn btn-success" value="submit"/></br></br></br>
                        </div>
                        <div class="status">
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
                        </div>
                    </div>
                </form>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-3 text-center">
                <br>
                <br>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <i class="glyphicon glyphicon-phone" style="font-size:24px;"></i>
                            <p>+ 071 359 1733</p>
                        </li>
                        <br>
                        <li>
                            <i class="glyphicon glyphicon-envelope" style="font-size:24px;"></i>
                            <p>dilshanishara73@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
        </div>
    </div>
    <div class="row"></div>
</section>
@endsection
