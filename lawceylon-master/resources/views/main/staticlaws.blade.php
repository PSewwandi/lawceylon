@extends('main.app')
@section('title','Lawceylon lawreference page')
@section('content')
<div class="page">
    <div id="breadcrumb-section" class="section">
        <div class="container">
            <div class="page-title text-center">
                <h1>Find Law Details Here</h1>
            </div>
        </div>
    </div><!-- breadcrumb-section -->
    <div id="search-section">
        <div class="container">
            <form action="{{ route('lawsearch') }}">
                <div class="search-section">
                    <div class="row">
                        <div class="col-md-10">
                            <input style="width:100%" type="text" name="nameSearch" class="form-control" placeholder="What are you looking for ?">
                        </div>
                        <div class="col-md-2">
                            <input style="width:100%" type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- search-section -->
    <div class="ad-post-wrapper section">
        <div class="container">
            <div id="faq-filter">
                <div class="faq-filter">
                    <ul class="list-inline" role="tablist">
                        <li class="active"><a href="#"  aria-controls="all-faq" role="tab" data-toggle="tab">All</a></li>
                        @foreach($lawcategories as $lawcategory)
                            <li><a href="{{ route('lawcategories',$lawcategory->slug) }}">{{ $lawcategory->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="all-faq" class="faq-post tab-pane active">
                        @foreach($laws as $law)
                        <div class="faq">
                            <div class="faq-ask">
                                <h2><i class="fa fa-hashtag" aria-hidden="true"></i><a href="{{ route('lawcontent',$law->slug) }}" style="text-decoration:none"><b>{{ $law->title }}</b></a></h2>
                            </div>
                            <div class="faq-ans">
                                <p>{!! htmlspecialchars_decode($law->body) !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="pager-section">
                    <ul class="pagination">
                        <li class="next">{{ $laws->links() }}</li>
                    </ul>
                </div><!-- pager-section -->
            </div><!-- #faq-filter -->
        </div>
    </div> <!-- ad-post -->
</div>	<!-- page -->
@endsection