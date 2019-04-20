@extends('main.app')
@section('title','Lawceylon Homepage')
@section('headSection')
<style>
    .ch-grid {
        margin: 20px 0 0 0;
        padding: 0;
        list-style: none;
        display: block;
        text-align: center;
        width: 100%;
    }
    .ch-grid:after,
    .ch-item:before {
        content: '';
        display: table;
    }
    .ch-grid:after {
        clear: both;
    }
    .ch-grid li {
        width: 220px;
        height: 220px;
        display: inline-block;
        margin: 20px;
    }
    .ch-item {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        position: relative;
        cursor: default;
        box-shadow: 
            inset 0 0 0 0 rgba(200,95,66, 0.4),
            inset 0 0 0 16px rgba(255,255,255,0.6),
            0 1px 2px rgba(0,0,0,0.1);
        transition: all 0.4s ease-in-out;
    }
    .ch-info {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
        opacity: 0;
        transition: all 0.4s ease-in-out;
        transform: scale(0);
        backface-visibility: hidden;
    }
    .ch-info p {
        color: #fff;
        padding: 10px 5px;
        font-style: italic;
        margin: 50% 30px;
        font-size: 12px;
        border-top: 1px solid rgba(255,255,255,0.5);
    }
    .ch-info p a {
        display: block;
        color: rgba(255,255,255,0.7);
        font-style: normal;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        padding-top: 4px;
        font-family: 'Open Sans', Arial, sans-serif;
    }
    .ch-info p a:hover {
        color: rgba(255,242,34, 0.8);
    }
    .ch-item:hover {
        box-shadow: 
            inset 0 0 0 110px rgba(200,95,66, 0.4),
            inset 0 0 0 16px rgba(255,255,255,0.8),
            0 1px 2px rgba(0,0,0,0.1);
    }
    .ch-item:hover .ch-info {
        opacity: 1;
        transform: scale(1);	
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="home-page">

    <div id="home-section" class="parallax-section carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active" style="background-image:url({{ asset('images/backgrounds/page-header-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <h2 data-animation="animated lightSpeedIn">Best lawyers</h2>
                                <p data-animation="animated lightSpeedIn">Our team is consisting of best lawyers and they are always try to serve you better service...</p>
                                <div class="ad-btn">
                                    <a href="{{ route('search') }}" class="btn btn-primary" data-animation="animated lightSpeedIn">Search</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
            <div class="item" style="background-image:url({{ asset('images/backgrounds/bg-4.jpeg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <h2 data-animation="animated lightSpeedIn">Legal Information</h2>
                                <p data-animation="animated lightSpeedIn">Our traget is to achieve the best platform which provides accurate legal information about sri lankan laws....</p>
                                <div class="ad-btn">
                                    <a href="{{ route('laws') }}" class="btn btn-primary" data-animation="animated lightSpeedIn">Refer Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
            <div class="item" style="background-image:url({{ asset('images/index/main-slider/bg-slide-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <h2 data-animation="animated lightSpeedIn">Excellent Service</h2>
                                <p data-animation="animated lightSpeedIn">Customer satisfaction is our main responsibility.....</p>
                                <div class="ad-btn" >
                                    <a href="{{ route('tutorial') }}" class="btn btn-primary" data-animation="animated lightSpeedIn">Services</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
        </div>
        <a class="left carousel-control" href="#home-section" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
            <a class="right carousel-control" href="#home-section" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- #home-section -->

    <div id="search-section">
        <div class="container">
            <form action="search" method="GET">
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
               
    <!-- avt-category nisal-->
    <div id="avt-category" class="clearfix" style="padding-bottom:100px; padding-top:40px;">
        <div class="section-title">
            <div class="title-content">
                <h2>Meet Our top Rated Lawyers</h2>
            </div>
        </div>
        <div class="row">
            <ul class="ch-grid">
                @foreach($lawyers as $lawyer)
                    <li>
                        <div class="ch-item" style="background-image: url(images/lawyer/{{ $lawyer->image }})">
                            <div class="ch-info">
                                <p><a href="{{ route('lawyerViewUser',$lawyer->id) }}">{{ $lawyer->firstName }} {{ $lawyer->lastName }}</a>specialist on {{ $lawyer->Specialist_Area }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach             
            </ul>
        </div>
    </div><!-- category-avt -->

    <div id="call-to-act">
        <div class="container">
            <div class="call-to-act">
                <div class="footer-widget link-widget" style="padding-left:50px;">
                    <h2>Our Expertise Areas</h2>
                    <ul style="padding-left:150px;">
                        @foreach($categories as $category)
                            <li><h2><strong><a href="{{ route('lawcategories',$category->slug) }}"> <i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-right"></i>{{ $category->name }}</a></strong></h2></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- #call-to-act nisal-->

    <div class="section">
        <div class="container">
            <div class="section-title">
                <div class="title-content">
                    <h2>News on Lawceylon</h2>
                </div>
            </div>
            <div class="category-adds">
                <div id="category-tab">
                    <div class="category-tab">
                        <!-- Tab panes -->
                        <div class="tab-content list-view-tab">
                            <div role="tabpanel" class="tab-pane active" id="recent">
                                <ul>
                                    @foreach($newsrecents as $newsrecent)
                                    <li class="item-wrap">
                                        <div class="item">
                                            <div class="item-image">
                                                <a href="{{ route('news',$newsrecent->slug) }}"><img src="{{  asset('images/news/front/').'/'.$newsrecent->image2 }}" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="item-description">
                                                <div class="item-meta">
                                                    <div class="item-post-date">
                                                            <span>{{ $newsrecent->created_at->diffForHumans() }}</span>
                                                            {{-- {{ date('M j,Y',strtotime($post->created_at))}} --}}
                                                    </div>
                                                </div>
                                                <div class="item-title">
                                                    <h3><a href="{{ route('news',$newsrecent->slug) }}"><b>{{ str_limit(strip_tags($newsrecent->title), 35) }}</b></a></h3>
                                                </div>
                                                <div class="item-info">
                                                    <p>{{ str_limit(strip_tags($newsrecent->subtitle), 35) }}</p>
                                                </div>
                                            </div><!-- item-description -->
                                        </div><!-- item -->
                                    </li><!-- item-wrap -->
                                    @endforeach
                                </ul>
                            </div><!-- tab-pane -->		
                        </div>
                    </div>
                </div><!-- category-tab-->
            </div>
            <div class="pager-section">
                <ul class="pagination">
                    <li class="next">{{ $newsrecents->links() }}</li>
                </ul>
            </div><!-- pager-section -->
        </div>
    </div><!-- category-tab-->	
</div><!-- .home-page -->
@endsection
@section('footerSection')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection