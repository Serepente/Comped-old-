<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompED - Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/signinstyles.css') }}">
</head>

<body>

    <div class="container">
        <div class="half left">
            <a href="{{ route('homepage') }}" class="back-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M13 19l-7-7 7-7 1.41 1.41L8.83 12l5.58 5.59L13 19z"></path>
                </svg>
            </a>
            <div class="form-container">
                <h1>Create Your Account</h1>
                @if (session('success'))
                    <p style="color:green;">{{ session('success') }}</p>
                @endif
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <div class="terms">
                        <input type="checkbox" required>
                        <label>I agree to the terms and conditions</label>
                    </div>
                    <button type="submit">Sign Up</button>
                    <p class="redirect">Already have an account? <a href="{{ route('login.submit') }}">Login</a></p>
                </form>
            </div>

            <div class="footer-left">
                <p>© 2024 CompED - All Rights Reserved | CompEsa.</p>
            </div>
        </div>
        <div class="half right">
            <img src="{{ asset('frontend/img/compesa.png') }}" alt="compesa" class="main-logo">
            <img src="{{ asset('frontend/img/comped.png') }}" alt="comped">
            <p>A Social Media Platform for Collaborative Learning and Event Management.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ 'frontend/js/signin.js' }}"></script>
</body>

</html>
