<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> InvestmentApp </title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-300">
            <nav class="p-6 bg-white flex justify-between mb-6">
                <ul class="flex items-center">
                    <li>
                        <a href="" class="p-3"> Forside </a>
                    </li>

                    <li>
                        <a href="" class="p-3"> P2P-lending </a>
                    </li>

                    <li>
                        <a href="" class="p-3"> Aktiebeholdning </a>
                    </li>
                </ul>

                <ul class="flex items-center">
                    @auth
                        <li>
                            <a href="" class="p-3"> Jonas Nielsen </a>
                        </li>
                        
                        <li>
                            <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf 
                            <button type="submit"> Logout </button>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="p-3"> Login </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"  class="p-3"> Register </a>
                        </li>
                    @endguest
                </ul>
            </nav>
        @yield('content')
    </body>

</html>