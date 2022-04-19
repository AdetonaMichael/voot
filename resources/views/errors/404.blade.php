<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'The Voot Blog') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/voot_favicon.png') }}" type="image/x-icon"/>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/mycss.css') }}"rel="stylesheet">
        @yield('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
<body>
    <div class="logo d-flex justify-content-center">
       <img src="{{ asset('img/voot_logo_home.png') }}" alt="">
    </div>
    <div class="d-flex justify-content-center">
        <img src="{{ asset('img/arti.svg') }}" height="200" alt="Page Not Found ">
    </div>
    <div class="text404 mt-5">
        <h2 class="text-center">Ooops! The Page You are looking For Does Not exist</h2>
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary mt-5 py-2 px-5 text-center" style="border-radius:45px;" href="{{ route('home') }}"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>Return Home</a>

        </div>
    </div>
</body>
</html>
