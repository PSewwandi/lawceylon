@extends('main.app')
@section('title','Lawceylon gassette download page')
@section('headSection')
@endsection
@section('content')
    <div class="home-page">
        <div id="breadcrumb-section" class="section">
            <div class="container">
                <div class="page-title text-center">
                    <h1>Refer or Download Gazzets</h1>
                </div>
            </div>
        </div><!-- breadcrumb-section -->
        <div id="avt-category" class="clearfix">
            <div class="container">
                <div class="row">
                    @foreach ($gassettes as $gassette)
                        <div class="col-sm-6 col-md-3">
                            <div class="category-avt">
                                <div class="category-icon">
                                    <a href="{{ asset('gassettes/').'/'.$gassette->file }}" download><img src="images/icon/7.png" alt="images" class="img-responsive"><span class="glyphicon glyphicon-download-alt">Download Here</span></a>
                                </div>
                                <ul>
                                    <li><h3>{{ $gassette->name }}</h3></li>
                                    {{-- <li>{{ $gassette->subject }}</li> --}}
                                    <li><a class="btn btn-info" href="{{ route('gassetteView',$gassette->id) }}">View Here</a></li>
                                </ul>
                            </div><!-- category-avt -->	
                        </div>
                    @endforeach
                    <div class="pager-section">
                        <ul class="pagination">
                            <li class="next">{{ $gassettes->links() }}</li>
                        </ul>
                    </div><!-- pager-section -->
                </div>
            </div>
        </div>
    </div>
@endsection