@extends('main.app')
@section('headSection')
<style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div id="breadcrumb-section" class="section">
    <div class="container">
        <div class="page-title text-center">
            <h1>This Tutorial is About Using LawCeylon</h1>
        </div>
    </div>
</div><!-- breadcrumb-section -->      
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 style="color:SlateBlue;">Searching Lawyers and Lawfirms,</h2>
            <ul>
                <li><h1 style="font-size:200%;color:Tomato";>Lawyers can be search on different criterias</h3></li>
                <img src="/images/tutorials/Capture5.PNG"  class=img-fluid mb-3>
                <p><a href="/search?nameSearch=" class="btn btn-info " style="margin:10px" >Click here to Search Lawyers</a></p>
                <li><h2 style="font-size:200%; color:Tomato">LawFirms in Sri Lanka</h2></li>
                <img src="/images/tutorials/Capture4.PNG"  class=img-fluid mb-3>
                <p><a href="/mapsearch" class="btn btn-info"  style="margin:10px">Click here Search LawFirms</a></p>
            </ul> 
        </div>
        </div>
        <a href="/tutorial/tutorials2" class="button pull-left">Previous Page</a>
        <a href="/tutorial/tutorials4" class="button pull-right">Next Page</a>
    </div>      
</div>
@endsection