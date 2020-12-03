<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> InvestmentApp </title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="flex flex-col h-screen justify-between bg-gray-300">
            <nav class="p-6 bg-white mb-6">
                <p id="hamburgerbtn" class="md:hidden">
                    Menu
                </p>
                <ul class="hidden md:flex md:flex-row" id="mobileMenu">
                
                    <li>
                        <a href="/welcome" class="p-3"> Forside </a>
                    </li>
        
                    <li>
                        <a href="/p2p" class="p-3"> P2P-lending </a>
                    </li>

                    <li>
                        <a href="/aktiebeholdning" class="p-3"> Aktiebeholdning </a>
                    </li>
                    @auth
                        <li>
                            <a href="" class="p-3"> {{ auth()->user()->name }}</a>
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
        <footer class="h-10 bg-white mt-8">Footer</footer>
    </body>


    <style>
        .active{
            display: block;
        }    
    </style>

<script>
    let hamburger = document.getElementById('hamburgerbtn');

    let mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function(){
        mobileMenu.classList.toggle('active');
    });
</script>


</html>