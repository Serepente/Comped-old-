@extends('layouts.admin-login')

@section('title', 'Admin Login')
<div class="container">
    <div class="half left">
        <img src="images/compesa.png" alt="compesa" class="main-logo">
        <img src="images/comped.png" alt="comped Logo">
        <p>A Social Media Platform for Collaborative Learning and Event Management.</p>
    </div>
    <div class="half right">
        <a href=" " class=" ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13 19l-7-7 7-7 1.41 1.41L8.83 12l5.58 5.59L13 19z"></path></svg>
        </a>
        <div class="form-container">
            <h1>Login as Admin</h1>
            <form action="#">
                <input type="email" placeholder="Email Address" required>
                <input type="password" placeholder="Password" required>
                <div class="terms">
                    <input type="checkbox">
                    <label>Remember me</label>
                </div>
                <button type="submit">Login</button>
                <p class="redirect">Not an admin? <a href="#">Request</a></p>
            </form>
        </div>
        <div class="footer-text">
            <p>&copy; 2025 CompED | All Rights Reserved | Calunsag.</p>
        </div>
    </div>
</div>
@endsection
