@extends('main.app')
@section('title','Lawceylon advance search page')
@section('headSection')
<!--for lawyer search-->
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/ericwinton/pen/jqKyyq?depth=everything&order=popularity&page=7&q=product&show_forks=false" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<style>
    .product {
	margin-bottom: 30px;

    }
    .product-inner {
        box-shadow: 0 0 10px rgba(0,0,0,.2);
        padding: 10px;
    }
    .product img {
        margin-bottom: 10px;
        max-width:170px;
    }
    .lawyercontainer{
        position:static;

    }
    .form-controls{
        background-color: #5cb85c;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius:12px;
    }
</style>
@endsection
@section('content')
    <div class="page" style="marging-top: -25px;">
        <div id="breadcrumb-section" class="section">
            <div class="container">
                <div class="page-title text-center">
                    <h1>Search Here</h1>
                </div>
            </div>
        </div><!-- breadcrumb-section -->
        <br>
        <br>
        <div class="whole" style="display:inline-block;">
        <div class="lawyercontainer">
            <div class="lawyerrow" id="lawyersearch">
                <form id="lawyersearch-form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-groups col-md-4">
                        <input class="form-control" id="tags" type="text" placeholder="Type Lawyer's Name.." />
                    </div>
                    <div class="form-groups col-md-4">
                        <button type="submit" class="btn btn-block btn-success" onclick="init()">Search</button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <br>
            <div class="lawyerrow" id="filter" style="visibility:visible;">
                <form>
                    <div class="form-groups col-md-4"  >
                        <select data-filter="make" class="filter-make filter form-controls" >
                            <option value="">Select Specialist Area</option>
                            <option value="">Show All</option>
                        </select>
                    </div>
                    <div class="form-groups col-md-4">
                        <select data-filter="model" class="filter-model filter form-controls">
                            <option value="">Online Consultation Fee</option>
                            <option value="">Show All</option>
                        </select>
                    </div>
                    <div class="form-groups col-md-4">
                        <select data-filter="type" class="filter-type filter form-controls">
                            <option value="">Select Experienced Years</option>
                            <option value="">Show All</option>
                        </select>
                    </div>
                </form>
                <br>
                <br>
            </div>
            <br>
            <br>
            <div class="lawyerrow" id="products">	</div>
        </div>
        <script>
            function MyFunc(i){
        
                <?php 
        
                    if(auth()->guest()){
                        $guest=1;
                    }else{
                        $guest=0;
                    }     
                ?> 
                var guest='<?php echo $guest ; ?>';
                if(guest==1){
                    alert("Warning !!!! \n In order to get the requeted details, please sign in first  !!");
                }
                if(guest==0){
                    
                    window.location.href="https://idnebula.me/lawyerViewUser/"+i;
                }
            }
            
                data=[];
                
        
        
        
                @foreach ($lawyers as $lawyer)
                var obj={
                    "id":"<?php echo($lawyer->id);  ?>",
                    "name":"<?php echo($lawyer->firstName);echo(" ");echo($lawyer->lastName);?>",
                    "make": "<?php echo($lawyer->Specialist_Area); ?>",
                    "model": "<?php echo($lawyer->consultationFee); ?>",
                    "type": "<?php echo($lawyer->Experience_Period); ?>",
                    "image": "/images/lawyer/<?php echo($lawyer->image); ?>"
        
        
                }
                data.push(obj);
                @endforeach
                
                data.sort(function(obj1, obj2) {
                return obj1.name.localeCompare(obj2.name);
                });
                var products = "";
                var makes = "";
                var models = "";
                var types = "";
                var names="";
                var ids="";
        
                for (var i = 0; i < data.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
                    var make = data[i].make,
                        model = data[i].model,
                        type = data[i].type,
                        name=data[i].name,
                        image = data[i].image,
                        id=data[i].id;
                    
                    //create product cards
                    products += "<div class='col-sm-4 product' data-name='"+name+"' data-make='"+make+"' data-model='"+model+"' data-type='"+type+"' ><div class='product-inner text-center'><img src='"+image+"'><br />Name :"+name+"<br />Specialist Area: "+make +"<br />Consultation Fee: "+model+"<br />Experienced Years: "+type+"<br /> <button onclick='MyFunc("+id+")'>Go To Full Profile</button></div></div>";
                    //create dropdown of makes
                    if (makes.indexOf("<option value='"+make+"'>"+make+"</option>") == -1) {
                        makes += "<option value='"+make+"'>"+make+"</option>";
                    }
                    
                    //create dropdown of models
                    if (models.indexOf("<option value='"+model+"'> RS:"+model+"-" + (parseInt(model)+499) + "</option>") == -1) {
                        
                        models += "<option value='"+model+ "'> RS:" + model + "-" + (parseInt(model)+499) +   "</option>";
                    }
                    
                    //create dropdown of types
                    if (types.indexOf("<option value='"+type+"'>"+type+"</option>") == -1) {
                        types += "<option value='"+type+"'>"+type+"</option>";
                    }
                }
                window.CP.exitedLoop(1);
        
        
                $("#products").html(products);
                $(".filter-make").append(makes);
                $(".filter-model").append(models);
                $(".filter-type").append(types);
                $(".filter-name").append(names);
        
                var filtersObject = {};
        
                //on filter change
                $(".filter").on("change",function() {
                    var filterName;
                    var filterVal;
        
                    
        
        
                        filterName = $(this).data("filter"),
                        filterVal = $(this).val();
                    
                    if (filterVal == "") {
                        delete filtersObject[filterName];
                    } else {
                        filtersObject[filterName] = filterVal;
                    }
                    
                    var filters = "";
                    
                    for (var key in filtersObject) {if (window.CP.shouldStopExecution(2)){break;}
                            if (filtersObject.hasOwnProperty(key)) {
                            
                            filters += "[data-"+key+"='"+filtersObject[key]+"']";
                            }
                    }
                window.CP.exitedLoop(2);
                    
                    
                    if (filters == "") {
                        $(".product").show();
                    } else {
                        $(".product").hide();
                        $(".product").hide().filter(filters).show();
                    }
                });
        
        
                //on search form submit
                function init(){
                $("#lawyersearch-form").submit(function(e) {
                    e.preventDefault();
                    var query = $("#lawyersearch-form input").val().toLowerCase();
                    if(query==""){
                        document.getElementById("filter").style.visibility = "";
                        return;
                    }
        
                    if (query!="") {
                        document.getElementById("filter").style.visibility = "hidden";
                    }
                    
                    
                    $(".product").hide();
                    $(".product").each(function() {
                        
                        var name = $(this).data("name").toLowerCase();
                        var make = $(this).data("make").toLowerCase();
                        
        
                        if (name.indexOf(query)==make.indexOf(query)>-1) {
                            $(this).show();
                        
                        }
                    });
                });
                }
        
                //search from front page
        
                <?php 
                $NameFromFront="";
                if(isset($_GET['nameSearch'])){
                    $NameFromFront=$_GET['nameSearch'];
                }
                ?>
        
                if ("<?php echo $NameFromFront ?>" !="" ){
                    var query1 = "<?php echo $NameFromFront; ?>".toLowerCase();
                    document.getElementById("tags").value = query1;
                }
        </script>
    </div>
@endsection