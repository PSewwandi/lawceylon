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
        <div class="col-sm-15">
            <h2 style="color:SlateBlue;">Content of our web site,</h2>
            <p style="font-size:1.5em;">This is all about law field of sri lanka .our site provides latest news in law field,
                online consultancy from professional lawyers,searching of lawyers on their expertised area and here 
                you can search law firms also.</p>
            <p style="font-size:1.5em;"> In our home page you can see our expertised areas.news in law field and other functionalities</p><img src="/images/tutorials/Capture1.PNG"  class="img-fluid"><p>
            <h3> We provide following facilities for our users</h3>
            <ul style="list-style-type:disc">
                <li> <h3>Unregistered Users</h3>
                    <ul style="list-style-type:non">
                        <li style="font-size:1.5em;">Refer static legal information</li>
                        <li style="font-size:1.5em;">Searching Lawyers and Lawfirms</li>
                        <li style="font-size:1.5em;">Refer latest news in law field</li>
                    </ul>
                </li>
                <li> <h3>Registered Users</h3>
                    <ul style="list-style-type:non">
                        <li style="font-size:1.5em;">Making appointments for lawyers</li>
                        <li style="font-size:1.5em;">Get online consultancy</li>
                        <li style="font-size:1.5em;">Video calling with Lawyers</li>
                        <li style="font-size:1.5em;">Searching lawyers and lawfirms based on current and custom location</li>
                    </ul>
                </li>
            </ul>
            <p style="font-size:2.0em;">Registered Users can enjoy more facilities.There for get registered in to lawceylon</p>
            </p>
        </div>
    </div>
    <a href="/tutorial/tutorials2" class="button pull-right" >Next Page</a>     
</div>
@endsection