<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Basic - Ecom</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    @include('layouts.front_layout.css')
</head>
<!-- body -->

<body class="main-layout">

    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('images/front_images/img/loading.gif')}}" alt="#" /></div>
    </div>
    <!-- end loader -->

    <div class="wrapper">


        <div class="sidebar">
            <!-- Sidebar  -->
            @include('layouts.front_layout.sidebar')
        </div>

        <div id="content">
            <!-- header -->
            @include('layouts.front_layout.header')
            <!-- end header -->


            @yield('content')
            @include('layouts.front_layout.footer')
        </div>

    </div>

    <div class="overlay"></div>

    @include('layouts.front_layout.script')

</body>

</html>
