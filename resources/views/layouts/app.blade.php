<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/7532718861.js"></script>
    <!-- Main CSS  -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- AOS CSS  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="icon" href="{!! asset('/images/logo.png') !!}"/>
    <title>Eskulap Farm </title>
</head>
<body>

    <!-- Product Added Info Alert  -->
    <div class="alert-box ">
        <div class="mx-4 my-2"><i class="fas fa-check"></i>Proizvod je dodat u korpu</div> 
        <div class="meter"><span style="width:100%;"><span class="progress"></span></span></div>
    </div>              
    
    @include('partials.header')

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

<script src="/js/app.js"></script>

    @yield('extra-js')

<!-- AOS JS  -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>

</body>
</html>