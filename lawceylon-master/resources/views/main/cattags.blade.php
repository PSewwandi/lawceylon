@extends('main.app')
@section('title','Lawceylon Newspage')
@section('content')
<div class="page">
    <div class="all-categories section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="category-adds">
                        <div id="category-tab">
                            <div class="category-tab">
                                <!-- Tab panes -->
                                <div class="tab-content small-view-tab">
                                    <div role="tabpanel" class="tab-pane active" id="recent">
                                        <ul>
                                            @if($news->count() > 0)
                                                @foreach($news as $new)
                                                    <li class="item-wrap">
                                                        <div class="item">
                                                            <div class="item-image">
                                                                <a href=""><img src="{{  asset('images/news/front/').'/'.$new->image2 }}" alt="" class="img-responsive"></a>
                                                            </div>
                                                            <div class="item-description">
                                                                <div class="item-meta">
                                                                    <div class="item-post-date">
                                                                        {{-- <span>{{ $new->created_at->diffForHumans() }}</span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="item-title">
                                                                    <h3><a href="{{ route('news',$new->slug) }}"><b>{{ str_limit(strip_tags($new->title), 40) }}</b></a></h3>
                                                                </div>
                                                                <div class="item-info">
                                                                    <p>{{ str_limit(strip_tags($new->subtitle), 100) }}</p>
                                                                </div>
                                                            </div><!-- item-description -->
                                                        </div><!-- item -->
                                                    </li><!-- item-wrap -->
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
                                        </ul>
                                    </div> <!--tab-pane-->
                                </div>
                            </div>
                        </div><!-- category-tab-->	
                    </div>
                    <div class="pager-section">
                        <ul class="pagination">
                            <li class="next">{{ $news->links() }}</li>
                        </ul>
                    </div><!-- pager-section -->
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="sidebar">
                        <div class="filter-list">
                            <div class="tab-view">
                                <ul class="list-inline">
                                    <li class="grid-view-tab"><i class="fa fa-th-large" aria-hidden="true"></i></li>
                                    <li class="small-view-tab active"><i class="fa fa-th" aria-hidden="true"></i></li>
                                    <li class="list-view-tab"><i class="fa fa-th-list" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div><!-- filter-list -->
                        <br>
                        <div class="widget search-widget">
                            <div class="widget-content">
                                <form role="search" id="search-form" method="get" action="{{ route('newsearch') }}">
                                    <input type="search" autocomplete="off" name="keyword" placeholder="Search..." id="search-input" value="">
                                    <button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div><!-- widget -->
                        <br>
                        <div class="filter-list">
                            <h4 class="list-title"><a href="categories.html">Categories</a></h4>
                            <ul class="list-group">
                                @foreach($category as $cat)
                                <li><a href="{{ route('categories',$cat->slug) }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- filter-list -->

                        <div class="widget tags">
                            <h2 class="widget-title">Tags</h2>
                            <div class="widget-content">
                                @foreach($tag as $tg)
                                <a href="{{ route('tags',$tg->slug) }}">{{ $tg->name }}</a>
                                @endforeach
                            </div>
                        </div><!-- widget -->

                    </div><!-- sidebar -->
                </div><!-- col-sm-4 -->
            </div>
        </div>
    </div> <!-- all-categories -->
</div>	<!-- page -->
@endsection