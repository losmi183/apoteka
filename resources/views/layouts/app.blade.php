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

<!-- Bootstrap 4 scripts and ?JQuery  -->
{{-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

<script src="/js/app.js"></script>

<!-- AOS JS  -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>

</body>
</html>