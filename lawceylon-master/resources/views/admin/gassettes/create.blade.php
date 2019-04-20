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
                        <h3 class="box-title">Gassette Create</h3>
                    </div>
                    @include('admin.includes.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('gassettes.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Gassette Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                </div>    
                                <div class="form-group">
                                    <label for="subject">Gassette Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <br>
                                <div class="form-group">
                                    <div class="pull-right">
                                        <label for="pdf">File input</label>
                                        <input type="file" name="pdf" id="pdf"> 
                                    </div>
                                </div>  
                            </div>  
                        </div>
                        <!-- /.content -->
                        <div class="box-footer">
                            <button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('gassettes.index') }}" class="btn btn-warning">Back</a>
                        </div>
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
