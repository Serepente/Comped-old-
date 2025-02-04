<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompED - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/loginstyles.css') }}">
</head>

<body>

    <div class="container">
        <div class="half left">
            <img src="{{ asset('frontend/img/compesa.png') }}" alt="compesa" class="main-logo">
            <img src="{{ asset('frontend/img/comped.png') }}" alt="comped Logo">
            <p>A Social Media Platform for Collaborative Learning and Event Management.</p>
        </div>
        <div class="half right">
            <a href="{{ route('homepage') }}" class="back-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M13 19l-7-7 7-7 1.41 1.41L8.83 12l5.58 5.59L13 19z"></path>
                </svg>
            </a>
            @if (session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif
            <div class="form-container">
                <h1>Log into your Account</h1>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="terms">
                        <input type="checkbox">
                        <label>Remember me</label>
                    </div>
                    <button type="submit">Login</button>
                    <p class="redirect">Don't have an account? <a href="{{ route('register.submit') }}">Register</a></p>

                    <!-- Separator -->
                    <div class="or-separator">
                        <hr>
                        <span>or</span>
                        <hr>
                    </div>

                    <!-- Google Login Button -->
                    <a href="{{ route('google-auth') }}" class="google-btn">
                        <img src="{{ asset('frontend/img/google-icon.png') }}" alt="Google Logo">
                        Continue with Google
                    </a>
                </form>
            </div>
            <div class="footer-text">
                <p>&copy; 2024 CompED | All Rights Reserved | CompEsa.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
