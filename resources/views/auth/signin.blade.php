<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="icon" href="icons/martin.png" type="image/x-icon">

</head>
<body>
    <a href = "{{ route('main') }}">
        <div class="header-image">
            <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
        </div>
    </a>
    <div class="container">
        <h2 style="text-align: center;">Sign In</h2>
        <form action="{{ route('signin_post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="text" name="email" value= "{{ old('email') }}" autocomplete="email"> 
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
                <label for="password">Password:</label>
                <div class="input-password">
                    <input type="password" id="password" name="password" value = "{{ old('password') }}" autocomplete="current-password">
                    <img src = "icons/eye-close.png" id="togglePassword" alt="Show Password">
                </div>
                <script>
                    let password = document.getElementById('password');
                    let togglePassword = document.getElementById('togglePassword');
                    togglePassword.addEventListener('click', function() {
                        if (password.type === 'password') {
                            password.type = 'text';
                            togglePassword.src = 'icons/eye-open.png';
                        } else {
                            password.type = 'password';
                            togglePassword.src = 'icons/eye-close.png';
                        }
                    });
                </script>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class = "form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
                <button type="submit" id="submit">Login</button>
                @if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
                <p>Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
            </div>
        </form>
    </div>
    <footer class="footer">
        <p>Follow us on:</p>
        <a href="https://github.com/Black-fox17" target="_blank">
            <img src="icons/github.png" alt="GitHub" class="social-icon">
        </a>
        <a href=" https://x.com/Ayeleru_Salam?t=zpVRj-xTsq986rVwkTOF0Q&s=08 " target="_blank">
            <img src="icons/x.png" alt="Twitter" class="social-icon">
        </a>
        <p>&copy; 2025 All rights reserved</p>
    </footer>   
</body>
</html>