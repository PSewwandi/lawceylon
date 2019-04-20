@extends('admin.layouts.app')
@section('headSection')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admn/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Lawyer Profile</h3>
                    </div>
                    @include('admin.includes.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('lawyer.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="alert alert-warning">
                                @if(session()->has('message'))
                                    {{ session()->get('message') }}
                                @endif
                            </div>
                            <div class="col-lg-offset-3  col-lg-6"> 
                                <div class="form-group">
                                    <label for="honorific">Honorific</label>
                                    <input type="text" class="form-control" name="honorific" id="honorific" placeholder="Enter Honorific">
                                </div>  
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" firstName="firstName" id="firstName" name="firstName" placeholder="Enter First Name">
                                </div>    
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name">
                                </div> 
                                <div class="form-group">
                                    <label class="plabel">Gender</label>
                                    <input type="radio" id="gender" value="male" name="gender"><label for="gender" class="light" required>male</label>
                                    <input type="radio" id="gender" value="female" name="gender"><label for="gender" class="light" required>female</label>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="NIC_passportNumber">NIC</label>
                                    <input type="text" class="form-control" name="NIC_passportNumber" id="NIC_passportNumber" placeholder="Enter NIC/Passport Number">
                                </div> 
                                <div class="form-group">
                                    <label for="barnumber">Bar Number</label>
                                    <input type="text" class="form-control" name="barnumber" id="barnumber" placeholder="Enter Bar Number">
                                </div>
                                <div class="form-group">
                                    <label for="Specialist_Area">Specialist Area</label>
                                    <select id="job" name="Specialist_Area" required>
                                        <option value="All">All</option>
                                        <option value="Debt Recovery">Debt Recovery</option>
                                        <option value="Business">Business</option>
                                        <option value="Contracts and Litigation">Contracts and Litigation</option>
                                        <option value="Criminal Charges">Criminal Charges</option>
                                        <option value="Employment and Labor">Employment and Labor</option>
                                        <option value="Family">Family</option>
                                        <option value="Government and Health">Government and Health</option>
                                        <option value="Immigration">Immigration</option>
                                        <option value="Intellectual Property">Intellectual Property</option>
                                        <option value="Personal Injury">Personal Injury</option>
                                        <option value="Real Estate">Real Estate</option>
                                        <option value="Taxation">Taxation</option>
                                        <option value="Trusts and Estates">Trusts and Estates</option>
                                        <option value="Company Secretarial">Company Secretarial</option>
                                        <option value="Notarial Services">Taxation</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Experience_Period">Experience Period</label>
                                    <input type="text" class="form-control" name="Experience_Period" id="Experience_Period" placeholder="Enter Experience Period">
                                </div>
                                <div class="form-group">
                                    <label for="Address">Service Place</label>
                                    <input type="text" class="form-control" name="Address" id="Address" placeholder="Enter Service Place">
                                </div>
                                <div class="form-group">
                                    <label for="consultationFee">Consultation Fee</label>
                                    <input type="text" class="form-control" name="consultationFee" id="consultationFee" placeholder="Enter Consultation Fee">
                                </div>
                                <div class="form-group">
                                    <label for="TP_Number">Phone Number</label>
                                    <input type="text" class="form-control" name="TP_Number" id="TP_Number" placeholder="Enter Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Password Confirm</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div> 
                            </div>
                            <div class="col-lg-offset-3  col-lg-6">
                                <button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('lawyer.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
})
</script>
<!-- Select2 -->
<script src="{{ asset('admn/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".select2").select2();
    });
</script>
@endsection