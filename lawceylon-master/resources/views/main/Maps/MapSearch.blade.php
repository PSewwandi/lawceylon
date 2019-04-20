@extends('main.app')
@section('headSection')
    <title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <style>
        #mymap {
            width:990px;
            height:700px;
            top: 10px;
        }    

        .mapsidenav {
            height: 100%;
            width: 220px;
            position: auto;
            z-index: 1;
            left: 0;
            overflow-x: hidden;
            margin-left:0px;
            display: table-cell;
            background-color :#808080;
        }
    
        .d{
            width:700px;
            margin: auto;
            position: relative;
            display: table-cell;
        
        }
        .mapsidenav a:hover {
            background-color: #ddd;
            color: black;
        }
    
        .oneRow{
            display: table;
            width: 100%; /*Optional*/
            table-layout: fixed; /*Optional*/
            border-spacing: 10px; /*Optional*/
        }
        .mapsidenav a {
            color: white;
            padding: 8px;
            text-decoration: none;
            display: block;
            color:#000000;
        }
        .button1{
            border:  1px solid #00A86B;
            color: black;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 10px 550px;
            cursor: pointer;
            position: absolute;
            border-radius: 25px; 
        }   
        .searchButton{
            border:  1px solid #00A86B;
            color: black;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            display: block;
            font-size: 15px;
            margin: 7px 550px;
            cursor: pointer;
            position: absolute;
            border-radius: 25px;
        }
        .dropbtn{
            border:  1px solid #00A86B;
            padding: 6px;
            font-size: 17px;
            border: none;
            cursor: -webkit-grab; cursor: grab;
            border-radius: 5px 5px 5px 5px;
            color:black;
        }
    </style>   
@endsection
@section('content')
    <div id="breadcrumb-section" class="section">
        <div class="container">
            <div class="page-title text-center">
                <h1>Search Chambers</h1>
            </div>
        </div>
    </div><!-- breadcrumb-section -->
   <br>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#button1").hide();
            $("#townSelect").hide();
            $("#label1").hide();
        });
    </script>
    <div class="oneRow">
        <div class='mapsidenav' >
            <br>
            <br>
            <h2><font color="#006400"><center>Chambers</enter></font></h2>
            <br>
            <?php
                use App\Http\Controllers\Page\Map\markersController;
                echo markersController::index();
            ?>
        </div>
        <div class="d">
            <br>
            <div class="mapcontainer">
                <label class="mapcontainer">&emsp;&emsp;<font size="5" face="Times New Roman" color="#006400"> Your Current Location</font>
                <input type="radio"  checked="checked" name="radio" value=1>
                <span class="checkmark"></span>
                </label>
                <label class="mapcontainer">&emsp;&emsp;<font size="5" face="Times New Roman" color="#006400">From Custom Location</font>
                <input type="radio"  name="radio" value=2>
                <span class="checkmark"></span>
                </label>
            </div>
            <br>
            <label for="radiusSelect"><font size="5" face="Times New Roman" color="#006400">&emsp; Select Radius:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font></label>
            <select id="radiusSelect" class="dropbtn" label="Radius">
                <div class="dropdown-content">
                    <option value="50000">50 kms</option>
                    <option value="20000" selected>20 kms</option>
                    <option value="10000">10 kms</option>
                    <option value="5000">5 kms</option>
                    <option value="1000">1 kms</option>
                </div>
            </select>&emsp;
            <input type="button" id="searchButton" class="searchButton" value="Search Here!!" onclick="initmap()"  />
            <?php use App\Model\Map\townmarker; ?>
            <br>
            <br>
            <label for="townSelect" id="label1"><font size="5" face="Times New Roman" color="#006400">&emsp;&nbsp;Select Your Closest Town:</font></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="townSelect" class="dropbtn" label="Town" name='townSelect'>
                <div class="dropdown-content">
                    <?php $townmarkers=townmarker::all(); ?>
                    <?php  $i=0; ?>
                    <?php foreach ($townmarkers as $mark): ?>
                    <?php 
                        $data[$i++]=$mark;
                    ?>
                    <?php endforeach; ?>
                    <?php usort($data,"cmp"); ?>
                    <?php foreach ($data as $town): ?>
                    <option value="{{$town->name}},{{$town->lat}},{{$town->lng}}"> <?=$town->name;?> </option>
                    <?php endforeach; ?>
                </div>
            </select>
            <input type="button" id="button1" class="button1" value="Search from custom Location!"  onclick="townmap()"/>
            <br>
            <br>
            <?php   use App\Http\Controllers\Page\Map\MapController; ?>
            <br>
            <br>
            <div id="mymap" style="display:inline-block"></div>><br>
        </div> 
    </div>
    <script>
        var mymap;
        $(document).ready(function(){
            var locations = <?php print_r(json_encode($locations)) ?>;
            mymap = new GMaps({
                el: '#mymap',
                lat: 6.9271,
                lng: 79.8612,
                zoom:9
            });
            $.each( locations, function( index, value ){
                mymap.addMarker({
                    lat: value.lat,
                    lng: value.lng,
                    title: value.name,
                    click: function(e) {
                        var str = "Free Web Building Tutorials!";
                        var result = str.link("https://www.w3schools.com");
                        alert(value.name);
                    }
                });
            });
            currentLocation();
            onloadhide();
        });
        function initmap(){
            var locations = <?php print_r(json_encode($locations)) ?>;
            mymap = new GMaps({
            el: '#mymap',
            lat: 6.9271,
            lng: 79.8612,
            zoom:9
        });
        $.each( locations, function( index, value ){
            mymap.addMarker({
            lat: value.lat,
            lng: value.lng,
            title: value.name,
            click: function(e) {
                var str = "Free Web Building Tutorials!";
                var result = str.link("https://www.w3schools.com");
                alert(value.name);
            }
            });
        });

        currentLocation();
        onloadhide();
        }
        
        function onloadhide(){
        
            $(document).ready(function(){
                $('input[type="radio"]').click(function(){
                if($(this).attr("value")==1){

                    $("#townSelect").hide();
                    $("#button1").hide();
                    $("#label1").hide();
                    $("#searchButton").show();
                    }
                if($(this).attr("value")==2){
                    $("#button1").show();
                    $("#townSelect").show();
                    $("#label1").show();
                    $("#searchButton").hide();
                    }
                });
            });
        }

        function currentLocation(){
            window.localStorage.setItem("radius",document.getElementById("radiusSelect").value);
            $.getScript("/js/mapjs.js");
        }

        function townmap() {
            var locations = <?php print_r(json_encode($locations)) ?>;
            mymap = new GMaps({
                el: '#mymap',
                lat: 6.9271,
                lng: 79.8612,
                zoom:9
            });
            $.each( locations, function( index, value ){
                mymap.addMarker({
                    lat: value.lat,
                    lng: value.lng,
                    title: value.name,
                    click: function(e) {
                        alert('This is '+value.name+', law firm.');
                    }
                });
            });
            ClosestTown();
            onloadhide();
        }

        function ClosestTown() {
            var tobe_seperated=document.getElementById("townSelect").value;
            var sepetated=tobe_seperated.split(",");
            window.localStorage.setItem("radius",document.getElementById("radiusSelect").value);
            window.localStorage.setItem("town",sepetated[0]);
            window.localStorage.setItem("townlat",sepetated[1]);
            window.localStorage.setItem("townlng",sepetated[2]);
            $.getScript("/js/townjs.js");
        }
    </script>
@endsection