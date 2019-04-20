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
                        <h3 class="box-title">Client Message View</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="col-lg-offset-3  col-lg-6">  
                                <div class="form-group">
                                    <label for="lawyer_name">Client Name</label>
                                    <input type="text" class="form-control" name="lawyer_name" id="lawyer_name" value="{{ $cmessage->name }}" readonly>
                                </div>    
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $cmessage->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" value="{{ $cmessage->subject }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" class="form-control" name="message" id="message" value="{{ $cmessage->message }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="send_date">Send Date</label>
                                    <input type="text" class="form-control" name="send_date" id="send_date" value="{{ date('M j,Y',strtotime($cmessage->created_at)) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="send_time">Send Time</label>
                                    <input type="text" class="form-control" name="send_time" id="send_time" value="{{ date('H:i:s',strtotime($cmessage->created_at)) }}" readonly>
                                </div>
                                <div class="col-lg-offset-3  col-lg-6">
                                    <form method="post"id="delete-form-{{ $cmessage->id }}" action="{{ route('lawyerMessages.destroy',$cmessage->id) }}" style="dispaly: none">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick=" 
                                        if(confirm('Are You Sure,You want to Delete this ?'))
                                        {
                                            event.preventDefault();document.getElementById('delete-form-{{ $cmessage->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">Delete Message
                                    </a>
                                    <a href="{{ route('clientMessages.index') }}" class="btn btn-warning">Back</a>
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