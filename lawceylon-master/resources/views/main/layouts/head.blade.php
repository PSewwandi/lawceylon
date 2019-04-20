<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Theme Region">
<meta name="description" content="">
<script src="{{ asset('main/js/jquery.min.js') }}"></script>
<script src="{{ asset('main/js/modernizr.min.js') }}"></script>

<title>@yield('title')</title>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}" >
<link rel="stylesheet" href="{{ asset('main/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('main/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('main/css/owl.carousel.css') }}">  
<link rel="stylesheet" href="{{ asset('main/css/main.css') }}">  
<link rel="stylesheet" href="{{ asset('main/css/responsive.css') }}">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- font -->
<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>

<!-- favicon icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('main/images/ico/favicon.ico') }}">

@section('headSection')
@show