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
                        <h3 class="box-title">User Message View</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="col-lg-offset-3  col-lg-6"> 
                                <div class="form-group">
                                    <label for="user_id">User ID</label>
                                    <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $umessage->c_id }}" readonly>
                                </div>  
                                <div class="form-group">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $umessage->c_name }}" readonly>
                                </div>    
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $umessage->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" class="form-control" name="message" id="message" value="{{ $umessage->message }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="send_date">Send Date</label>
                                    <input type="text" class="form-control" name="send_date" id="send_date" value="{{ date('M j,Y',strtotime($umessage->created_at)) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="send_time">Send Time</label>
                                    <input type="text" class="form-control" name="send_time" id="send_time" value="{{ date('H:i:s',strtotime($umessage->created_at)) }}" readonly>
                                </div>
                                <div class="col-lg-offset-3  col-lg-6">
                                    <form method="post"id="delete-form-{{ $umessage->m_id }}" action="{{ route('userMessages.destroy',$umessage->m_id) }}" style="dispaly: none">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick=" 
                                        if(confirm('Are You Sure,You want to Delete this ?'))
                                        {
                                            event.preventDefault();document.getElementById('delete-form-{{ $umessage->m_id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">Delete Message
                                    </a>
                                    <a href="{{ route('userMessages.index') }}" class="btn btn-warning">Back</a>
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