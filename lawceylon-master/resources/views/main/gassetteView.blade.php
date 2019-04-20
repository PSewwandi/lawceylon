@extends('main.app')
@section('title','Lawceylon gassette download page')
@section('headSection')
@endsection
@section('content')
{{-- @foreach ($gassettes as $gassette) --}}
    <div class="home-page">
        <div id="breadcrumb-section" class="section">
            <div class="container">
                <div class="page-title text-center">
                    <h1>Refer or Download Gazzets</h1>
                </div>
            </div>
        </div><!-- breadcrumb-section -->
        <br>
        <br>
        <br>
        <div id="avt-category" class="clearfix">
            <form role="form">
                <div class="box-body">
                    <div class="col-lg-offset-2  col-lg-8">  
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
                        <embed src="{{  asset('gassettes/').'/'.$gassette->file }}" width="800px" height="1000px" />
                        <br>
                        <br>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
@endsection