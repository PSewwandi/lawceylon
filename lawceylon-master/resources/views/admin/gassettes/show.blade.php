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
                        <h3 class="box-title">Gassette View</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="col-lg-offset-3  col-lg-6">  
                                <div class="form-group">
                                    <label for="gassette_name">Gassette Name</label>
                                    <input type="text" class="form-control" name="gassette_name" id="gassette_name" value="{{ $gassette->name }}" readonly>
                                </div>    
                                <div class="form-group">
                                    <label for="gassette_subject">Gassette Subject</label>
                                    <input type="text" class="form-control" name="gassette_subject" id="gassette_subject" value="{{ $gassette->subject }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="upload_date">Upload Date</label>
                                    <input type="text" class="form-control" name="upload_date" id="upload_date" value="{{ date('M j,Y',strtotime($gassette->created_at)) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="upload_time">Upload Time</label>
                                    <input type="text" class="form-control" name="upload_time" id="upload_time" value="{{ date('H:i:s',strtotime($gassette->created_at)) }}" readonly>
                                </div>
                                <embed src="{{  asset('gassettes/').'/'.$gassette->file }}" width="600px" height="1000px" />
                                <div class="col-lg-offset-3  col-lg-6">
                                    <form method="post"id="delete-form-{{ $gassette->id }}" action="{{ route('gassettes.destroy',$gassette->id) }}" style="dispaly: none">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick=" 
                                        if(confirm('Are You Sure,You want to Delete this ?'))
                                        {
                                            event.preventDefault();document.getElementById('delete-form-{{ $gassette->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">Delete Gassette
                                    </a>
                                    <a href="{{ route('gassettes.index') }}" class="btn btn-warning">Back</a>
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