<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('stylesheet/styles.css')}}">
    <link rel="icon" href="{{asset('icons/martin.png')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IE+Guides&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
        <div class="header-image">
            <a href= "{{ route('main')}}">
                <img src="{{asset('LoroPiana-logo.svg')}}" alt="Website Logo" class="logo">
            </a>
        </div>
        @guest
            <div class="auth">
                <div class="login">
                    <a href="{{ route('signin') }}">
                        Login
                    </a>
                </div>
                <div class="signup">
                    <a href="{{ route('signup') }}">Sign Up</a>
                </div>
            </div>
        @else
        <div class = "sidebar">
            <div class="cart">
                <a href="{{ route('cart')}}" target = "_blank">
                    <img src="{{ asset('icons/cart.svg')}}" alt="Cart Icon" class="user-icon">
                </a>
            </div>
            <div class="dropdown">
                <div class = "dropdown-icon">
                    <img src="{{asset('icons/account.svg')}}" alt="User Icon" class="user-icon">
                </div>
                <div class = "dropdown-menu">
                    <ul>
                        <li><p class = "profile-username"> Welcome, {{ Auth::user()->username }}</p></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        @endguest
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p>Follow us on:</p>
        <a href="https://github.com/Black-fox17" target="_blank">
            <img src="{{ asset('icons/github.png')}}" alt="GitHub" class="social-icon">
        </a>
        <a href=" https://x.com/Ayeleru_Salam?t=zpVRj-xTsq986rVwkTOF0Q&s=08 " target="_blank">
            <img src="{{ asset('icons/x.png')}}" alt="Twitter" class="social-icon">
        </a>
        <p>&copy; 2025 All rights reserved</p>
    </footer> 
    @yield('scripts')  
    <script src = "{{asset('cart.js')}}"></script>  
    <script
        async src="https://pay.google.com/gp/p/js/pay.js"
        onload="onGooglePayLoaded()">
    </script>
</body>
</html>