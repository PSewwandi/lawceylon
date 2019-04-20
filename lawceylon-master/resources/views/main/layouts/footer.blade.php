<!-- footer -->
<footer id="footer">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-widget about-widget">
                        <h3>About Lawceylon</h3>
                        <p>There is a growing awareness that both basic legal services and some more advanced services can be delivered inexpensively through websites</p>
                        <br> <p>What does Lawceylon actually do for you? At its core,  application tracks your interactions with clients/lawyers and allowing you to engage with them on a personal level about subjects that interest them in your conversations, e-mails, and other communications</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-widget link-widget">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="{{ route('mainpage') }}"> <i class="fa fa-angle-double-right"></i> Home</a></li>      
                            <li><a href="{{route('tutorial')}}"> <i class="fa fa-angle-double-right"></i> Support & Help</a></li>
                            <li><a href="{{ route('register') }}"> <i class="fa fa-angle-double-right"></i> Register</a></li>   
                            <li><a href="{{route('search')}}"> <i class="fa fa-angle-double-right"></i> Advanced Search</a></li>
                            <li><a href="{{route('laws')}}"> <i class="fa fa-angle-double-right"></i> Law References</a></li>
                            <li><a href="{{route('mapsearch')}}"> <i class="fa fa-angle-double-right"></i> Map Search</a></li>
                            <li><a href="{{route('downloads')}}"> <i class="fa fa-angle-double-right"></i> Form Downloads</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
                            <li><a href="{{route('contactus')}}"> <i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Terms Of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-widget contact-widget">
                        <h3>Contact Us</h3>
                        <ul>
                             <li><span><i class="fa fa-envelope"></i> E-mail :</span> <a href="mailto:lawceylon@gmail.com">lawceylon@gmail.com</a></li>
                             <li>
                                 <ul class="list-inline social">
                                    <li><a class="facebook" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a class="twitter" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a class="google" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a class="instagram" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="youtube" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                             </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- footer-top -->
</footer><!-- footer -->
<script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('main/js/gmaps.min.js') }}"></script>
<script src="{{ asset('main/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('main/js/custom.js') }}"></script>

@section('footerSection')
 @show