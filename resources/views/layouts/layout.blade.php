<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CarPod</title>
        
        <!-- font awesome -->   
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
            integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">


        <link rel="stylesheet" href="/css/styles.css">
        {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    </head>
    <body class="antialiased">
        
        <!-- navbar -->
        <nav class="navbar">
            
            
            <div class="navbar-center" >
                <span class="nav-icon sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </span>
                <aside class="cart-overlay ">
                    <div class="cart sidebar" >
                        <span class="close-cart">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <h2>CarPod</h2>
                        
                        @if (Route::has('login'))
                            @auth
                                <ul class="links cart-content" style="list-style-type: none;">
                                    <li>
                                        <a href="{{ url('/cars') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="/cars/{{ auth()->user()->id }}/status">Status</a>
                                    </li>
                                    <li>
                                        <a href="/cars/message">Contact</a>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                            
                                            <form id="logout-form" action="{{ route('user.logout') }}" method="get" class="d-none">
                                                @csrf  
                                            </form>
                                        </div>
                                        
                                    </li>
                                </ul>
                            
                            @else
                                <ul class="links cart-content" style="list-style-type: none;">
                                    
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                        
                                    <li>
                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li>
                                        <a href="/admin/login">Admin</a>
                                    </li>
                                </ul>
                        
                                
                            @endauth
                        @endif
                    </div>    
                </aside>
                
                <a href="/cars">
                    <img src="/img/cars/logo.png" alt="store logo" class="img-logo">
                </a>
                
                <div class="cart-btn searchBtn">
                    <form action="search.php" method="post">
                        <span class="nav-icon">
                            <input type="text" name="search" placeholder="Search.." style="padding: 0; border: 0; background-color: inherit;">
                            <button type="submit" name="submit-search" style="font-size: 1.5rem;
                            cursor: pointer; position: relative;padding: 0; border: 0; background-color: inherit;"><i class="fas fa-search"></i></button>
                        </span>
                    </form>
                    
                </div>
            </div>
        </nav>
        <!-- end of navbar -->
        
        @yield('content')
        
        <script src="/js/navbar.js"></script>
        
    </body>
</html>    