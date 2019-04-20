@extends('main.app')
@section('title','Lawceylon law reference page')
@section('content')
<div class="page">
	<div class="ad-post-wrapper section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="blog-content blog-detail">
						<div class="blog-post">
							<div class="entry-content">	
								<h3 class="entry-title">{{ $laws->title }}</h3>
								<div class="entry-meta">
									<span>Categories</span> 
									@foreach( $laws->lawcategories as $lawcategory)
										<a href="" style="background-color: #92a8d1; font-size:12px; font-weight:bold; margin-right:5px; border-radius:5px; border:1px solid gray; padding:5px;">{{ $lawcategory->name }}</a>
									@endforeach
								</div>
								<br>
								<div class="post-excerpt">
									<p> {!! htmlspecialchars_decode($laws->body) !!} </p>
                                </div>
                                <br>
                                <br>
                                <div class="post-excerpt">
                                    <h4>Explanation :-</h4>
                                    <p> {!! htmlspecialchars_decode($laws->exp) !!} </p>
                                </div>
								<div class="entry-meta">
									<span>Tags</span>|
									@foreach( $laws->lawtags as $lawtag)
										<a href="" style="background-color: #92a8d1; font-size:12px; font-weight:bold; margin-right:5px; border-radius:5px; border:1px solid gray; padding:5px;">{{ $lawtag->name }}</a>
									@endforeach
								</div>
								<a class="date" href="#"><span>{{ $laws->subcategory1 }}</span>{{ $laws->subcategory2 }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="sidebar">
						<div class="widget search-widget">
							<div class="widget-content">
								<form role="search" id="search-form" method="get" action="{{ route('lawsearch') }}">
									<input type="search" autocomplete="off" name="search" placeholder="Search..." id="search-input" value="">
									<button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div><!-- widget -->
						<div class="widget">
							<h2 class="widget-title">Law Categories</h2>
							<div class="widget-content">
								<ul>
									@foreach($lawcategories as $lawcategory)
									<li><a href="{{ route('lawcategories',$lawcategory->slug) }}">{{ $lawcategory->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!-- widget -->
						<div class="widget tags">
							<h2 class="widget-title">Law Tags</h2>
							<div class="widget-content">
                                @foreach($lawtags as $lawtag)
                                <a href="{{ route('lawtags',$lawtag->slug) }}">{{ $lawtag->name }}</a>
                                @endforeach
							</div>
						</div><!-- widget -->
					</div><!-- sidebar -->
				</div>
			</div>
		</div>
	</div> <!-- ad-post -->
</div>	<!-- page -->
@endsection