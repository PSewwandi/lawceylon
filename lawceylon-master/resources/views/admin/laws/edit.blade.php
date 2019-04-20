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
                            <h3 class="box-title">Law Static Data Edit</h3>
                        </div>
                        @include('admin.includes.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action='{{ route('laws.update',$law->id) }}' method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="box-body">
                            <div class="col-lg-6"> 
                                <div class="form-group">
                                    <label for="title">Laws Data Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $law->title}}">
                                </div>    
                                <div class="form-group">
                                    <label for="title">Law Data Subtitle</label>
                                    <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Enter Subitle" value="{{ $law->subtitle}}">
                                </div> 
                                <div class="form-group">
                                    <label for="title">Law Data Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug" value="{{ $law->slug}}">
                                </div> 
                                <div class="form-group">
                                    <label for="title">Law Data Subcategory1</label>
                                    <input type="text" class="form-control" name="subcategory1" id="subcategory1" placeholder="Enter Subcategory 1" value="{{ $law->subcategory1}}">
                                </div> 
                                <div class="form-group">
                                    <label for="title">Law Data Subcategory2</label>
                                    <input type="text" class="form-control" name="subcategory2" id="subcategory2" placeholder="Enter Subcategory 2" value="{{ $law->subcategory2}}">
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                {{-- <br>
                                <div class="form-group">
                                    <div class="pull-right">
                                        <label for="image ">File input</label>
                                        <input type="file" name="image" id="image"> 
                                    </div>
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="status" value="1" @if ($law->status == 1) {{'checked'}} @endif ><strong>Editors Choice</strong>
                                        </label>
                                    </div>
                                </div>  
                                <br> --}}
                                <div class="form-group" style="margin-top:18px;">
                                    <label>Select Tags</label>
                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="lawtags[]">
                                        @foreach($lawtags as $lawtag )
                                            <option value="{{ $lawtag->id}}"
                                                @foreach($law->lawtags as $lawTag)
                                                    @if($lawTag->id == $lawtag->id)
                                                        selected 
                                                    @endif
                                                @endforeach
                                        >{{ $lawtag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" style="margin-top:18px;">
                                    <label>Select Category</label>
                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="lawcategories[]">
                                        @foreach($lawcategories as $lawcategory )
                                        <option value="{{ $lawcategory->id }}"
                                            @foreach($law->lawcategories as $lawCategory)
                                                @if($lawCategory->id == $lawcategory->id)
                                                    selected 
                                                @endif
                                            @endforeach
                                        >{{ $lawcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <!-- /.box-body -->
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Law Content</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <textarea name="body" id="editor1"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $law->body}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                            <!-- ./row -->
                        </section>
                        <!-- ./Main content -->
                        <!-- Explanation content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Content Explanation</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <textarea name="exp" id="editor2"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $law->exp}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                            <!-- ./row -->
                        </section>
                        <!-- ./Explanation content -->
                        <div class="box-footer">
                            <button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('laws.index') }}" class="btn btn-warning">Back</a>
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
@section('footerSection')
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
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