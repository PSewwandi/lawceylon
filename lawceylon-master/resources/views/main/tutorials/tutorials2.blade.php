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
            <h2 style="color:SlateBlue;">You Can Register As a,</h2>
            <ul>
                <li><h3 style="font-size:200%;color:Tomato;">User</h3></li>
                <p style="font-size:160%;">You can see the registration button in the left upper corner of home page</p>
                <img src="/images/tutorials/Capture2.PNG"  class=img-fluid mb-3>
                <p>
                    <a href="/reg" class="btn btn-info"  style="margin:10px">Click here to Register as a User</a>
                </p>
                <li><h2 style="font-size:200%; color:Tomato">Lawyer</h2></li>
                <p style="font-size:160%;"> If you are a lawyer you can register through here</p>
                <img src="/images/tutorials/Capture3.PNG"  class=img-fluid mb-3>
                <p><a href="/reglawyer" class="btn btn-info"  style="margin:10px">Click here to Register as a Lawyer</a></p>
             </ul> 
        </div>
    </div>
    <a href="/tutorial/tutorials1" class="button pull-left">Previous Page</a>
    <a href="/tutorial/tutorials3" class="button pull-right">Next Page</a>
</div>
@endsection