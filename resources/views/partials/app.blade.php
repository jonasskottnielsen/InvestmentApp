<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Title -->
        <title>InvestmentApp</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('CSS/common.css') }}">
    </head>

    <body>
        <!-- include Header layout -->
        @include('partials.menu')
        <!-- setup to display dynamic page content here -->
        <div class="main-content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- include Footer layout -->
        @include('partials.footer')
        <!-- Bootstrap JavaScript -->
        <script src="/js/app.js"></script>
    </body>
</html>