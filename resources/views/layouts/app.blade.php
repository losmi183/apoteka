<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Fontawsome Icons with my KIT CODE  --}}
    <script src="https://kit.fontawesome.com/7532718861.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        {{-- @include('partials.navbar'); --}}
        @include('partials.header');
        @include('partials.navbar')
        @include('partials.navigator')

        <main class="py-4">
            @yield('content')
        </main>

        <br>
        <hr>
        <br>    

        <div class="container">
            <div class="spacer-md"></div>       
            <div class="row">
                @include('partials.links')
            </div>
            <div class="spacer-md"></div>       
        </div>

        @include('partials.footer')

        <script src="{{asset('js/app.js')}}"></script>

    </div>
</body>
</html>
