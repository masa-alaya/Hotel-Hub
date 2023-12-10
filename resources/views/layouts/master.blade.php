<!DOCTYPE html>

<html >



<head>
    <title>Al Hotel</title>
    <link rel="icon" href="/img/svg/Logo.png" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- font Awesome --}}
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    {{-- main css --}}
    <link href="/css/main.css?v={{ time() }}" rel="stylesheet">
    <link href="/css/respo.css?v={{ time() }}" rel="stylesheet">
	{{--<link href="/css/cookies.css?v=8" rel="stylesheet"> --}}
    {{-- swiper slider --}}

    <link rel="stylesheet" href="/css/swiper-bundle.min.css" />
	<link href="/css/cookies.css?v=8" rel="stylesheet">

    @if(app()->getLocale() === 'ar')
    <link rel="stylesheet" type="text/css" href="/css/rtl.css?v={{ time() }}" />
    @endif

    {{-- nouislider --}}
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    {{-- animation --}}
    <link href="/css/aos.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">



	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-BDGSP6JKJX"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-BDGSP6JKJX');
	</script>


</head>

<body   onload="captchaimage()">
    <!--  Header Area Start  -->
    @include('layouts.header')
    <!-- Page Content  -->
    @yield('content')
    <!--  Footer Area Start  -->
    @include('layouts.footer')
    <!--  Footer Area End  -->
    <!-- Extra JS ------>
    @yield('extra')

    <!-- End Extra JS -->



</body>


</html>
