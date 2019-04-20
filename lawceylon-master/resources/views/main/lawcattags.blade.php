@extends('main.app')
@section('title','Lawceylon law reference pages')
@section('content')
<div class="page">
	<div id="breadcrumb-section" class="section">
		<div class="container">
			<div class="page-title text-center">
				<h1>Law Reference Page</h1>
			</div>
		</div>
	</div><!-- breadcrumb-section -->
	<div class="ad-post-wrapper section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
                    <div class="tab-content">
                        <div id="all-faq" class="faq-post tab-pane active">
							@if($laws->count() > 0)
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
							@else
								<div class="faq">
									<div class="faq-ask">
										<h2><i class="fa fa-hashtag" aria-hidden="true"></i><a href="#" style="text-decoration:none"><b>Sorry Invalid Input</b></a></h2>
									</div>
									<div class="faq-ans">
										<p>Please Check Your Input Again !!!</p>
									</div>
								</div>
							@endif
                        </div>
                    </div>
				</div>
				<div class="col-md-3">
					<div class="sidebar">
						<div class="widget search-widget">
							<div class="widget-content">
								<form role="search" id="search-form" method="get" action="{{ route('lawsearch') }}">
									<input type="search" autocomplete="off" name="keyword" placeholder="Search..." id="search-input" value="">
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