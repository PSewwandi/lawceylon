@extends('admin.layouts.app')
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
                        <h3 class="box-title">Unregistered Lawyer View</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="col-lg-offset-3  col-lg-6"> 
                                <div class="form-group">
                                    <label for="honorific">Honorific</label>
                                    <input type="text" class="form-control" name="honorific" id="honorific" value="{{ $lawyer->honorific }}" readonly>
                                </div>  
                                <div class="form-group">
                                    <label for="firstName">User Name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $lawyer->firstName }}" readonly>
                                </div>    
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $lawyer->lastName }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" name="gender" id="gender" value="{{ $lawyer->gender }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="Email" id="Email" value="{{ $lawyer->Email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="NIC_passportNumber">NIC/Passport Number</label>
                                    <input type="text" class="form-control" name="NIC_passportNumber" id="NIC_passportNumber" value="{{ $lawyer->NIC_passportNumber }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label for="barnumber">Bar Number</label>
                                    <input type="text" class="form-control" name="barnumber" id="barnumber" value="{{ $lawyer->barnumber }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" name="Address" id="Address" value="{{ $lawyer->Address }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Specialist_Area">Specialist Area</label>
                                    <input type="text" class="form-control" name="Specialist_Area" id="Specialist_Area" value="{{ $lawyer->Specialist_Area }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Experience_Period">Experience Period</label>
                                    <input type="text" class="form-control" name="Experience_Period" id="Experience_Period" value="{{ $lawyer->Experience_Period }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="TP_Number">Phone Number</label>
                                    <input type="text" class="form-control" name="TP_Number" id="TP_Number" value="{{ $lawyer->TP_Number }}" readonly>
                                </div>
                                <div class="col-lg-offset-3  col-lg-6">
                                    <a href="{{ route('unregister.show',$lawyer->id) }}" class="btn btn-primary">Accept</a>
                                    <a href="{{ route('rejected.show',$lawyer->id) }}" class="btn btn-danger">Reject</a>
                                    {{-- <form method="post"id="delete-form-{{ $lawyer->id }}" action="{{ route('lawyer.destroy',$lawyer->id) }}" style="dispaly: none">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick=" 
                                        if(confirm('Are You Sure,You want to Delete this ?'))
                                        {
                                            event.preventDefault();document.getElementById('delete-form-{{ $lawyer->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">Reject
                                    </a> --}}
                                    <a href="{{ route('unregister.index') }}" class="btn btn-warning">Back</a>
                                </div>
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