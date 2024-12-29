<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="icon" href="icons/martin.png" type="image/x-icon">

</head>
<body>
    <a href="{{ route('main') }}" class="back">
        <div class="header-image">
            <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
        </div>
    </a>
    <div class="container" style="height:150vh">
        <h2 style="text-align: center;">Sign Up</h2>
        <form action="{{ route('signup_post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="username">Username:</label>
                <input type="text" id="text" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" autocomplete="dob">
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="email">Email:</label>
                <input type="email" id="text" name="email" value="{{ old('email')}}" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  

                <label for="password">
                    Password:
                </label>
                <div class="input-password">
                    <input type="password" id="password" name="password" autocomplete="new-password">
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
                <label for="confirm-password">Confirm Password:</label>
                <div class = "input-password">
                    <input type="password" id="password-confirm" name="password_confirmation" autocomplete = "new-password">
                    <img src = "icons/eye-close.png" id="togglePassword-confirm" alt="Show Password">
                </div>
                <script>
                    let password_confirm = document.getElementById('password-confirm');
                    let togglePassword_confirm = document.getElementById('togglePassword-confirm');
                    togglePassword_confirm.addEventListener('click', function() {
                        if (password_confirm.type === 'password') {
                            password_confirm.type = 'text';
                            togglePassword_confirm.src = 'icons/eye-open.png';
                        } else {
                            password_confirm.type = 'password';
                            togglePassword_confirm.src = 'icons/eye-close.png';
                        }
                    });
                </script>
                <button type="submit" id="submit">Sign Up</button>
                <p>Have an account? <a href="{{ route('signin') }}">Sign In</a></p>
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