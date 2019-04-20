@extends('main.app')
@section('headSection')
<style>

    @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    h1 {
        /* color: #FFF; */
        font-size: 24px;
        font-weight: 400;
        text-align: center;
        margin-top: 40px;
    }
    h1 a {
        color: #c12c42;
        font-size: 16px;
    }
    .accordion {
        width: 100%;
        max-width: 360px;
        margin: 30px auto 20px;
        background: #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .card-pricing .list-unstyled li {
        padding: .5rem 0;
        color: #6c757d;
    }
</style>
<script>
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
                $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }	

        var accordion = new Accordion($('#accordion'), false);
    });
</script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1>  <?=$nameresult->value('name'); ?>  <br></h1>
            <!-- Contenedor -->
            <ul>
                @foreach($lawyersIn as $b)
                    <li>
                        <div class="container mb-5 mt-5">
                            <div class="pricing card-deck flex-column flex-md-row mb-3">
                                <div class="card card-pricing text-center px-3 mb-4">
                                    <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm"></span>
                                    <div class="bg-transparent card-header pt-4 border-0">
                                        <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">{{$b->honorific}} {{$b->firstName}} {{$b->lastName}}</span><span class="h6 text-muted ml-2"></span></h1>
                                    </div>
                                    <div class="card-body pt-0">
                                            <ul class="list-unstyled mb-4">
                                                <li><img src="/images/lawyer/{{$b->image}}" alt="xx Lawyer" id="img" width="250" height="250"></li>
                                                <li>Gender  :  {{$b->gender}}</li>
                                                <li>Specialist Area  :  {{$b->Specialist_Area}}</li>
                                                <li>Consultation Fee  :  {{$b->consultationFee}}</li>
                                            </ul>
                                        <!-- put the profiles url in button  like   profile/{{$b->id}} -->
                                        <button type="button" class="btn btn-outline-secondary mb-3" onclick='MyFunc({{$b->id}})'>Go To Full Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </li>
                @endforeach
            </ul>
            <ul id="accordion" class="accordion">   
            </ul> 
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
        </script>
    </div>
@endsection