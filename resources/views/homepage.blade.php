<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompED - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/homestyles.css')}}">
</head>
<body>
    <div class="container">
        <div class="half left">
            <div class="logos-container">
                <img src="{{asset('frontend/img/comped.png')}}" alt="CompED Logo" class="logo">
                <img src="{{asset('frontend/img/compesa.png')}}" alt="Compesa Logo" class="main-logo">
            </div>
            <p class="comped-a-social">
                CompED: A Social Media Platform for<br /> Collaborative Learning and Event Management.
            </p>
        </div>
        <div class="half right">
            <div class="form-container">
                <h1>Welcome to COMPED!</h1>
                <div class="button-container">
                    <a href="{{ route('login.submit') }}"><button class="login-btn"><i class="fas fa-user"></i>Log In</button></a>
                    <a href="{{ route('register.submit') }}"><button class="signup-btn"><i class="fas fa-envelope"></i>Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-text">
        <p>&copy; 2024 CompED | All Rights Reserved | CompEsa.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
