<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompED - Create Account</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/createstyle.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Left Section (Form) -->
        <div class="form-section">
            <a href="{{ url('homepage') }}" class="back-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <h1 class="form-title">Create your Account</h1>
            {{-- @if (isset($user)) --}}
            @if (session('db_error'))
                <div class="alert alert-danger">
                    {{ session('db_error') }}
                </div>
            @endif
            <form action="{{ route('create.submit', $user->id) }}" method="POST">
                @csrf
                <div class="input-group">
                    <img src="{{ asset('frontend/img/status.png') }}" alt="Status Icon" class="icon-input">
                    <select name="status" id="status" class="input-field">
                        <option value="" disabled selected>Status</option>
                        <option value="student">Student/Alumni</option>
                        <option value="adviser">Adviser</option>
                        <option value="officer">Officer</option>
                    </select>
                </div>
                <!-- Role Buttons -->
                <div class="role-buttons">
                    <button type="button" class="role-button student">
                        <img src="{{ asset('frontend/img/student.png') }}" alt="Student Icon" class="role-icon">
                        <div class="role-text">
                            <span>Student/Alumni</span>
                            <span class="role-subtitle">User</span>
                        </div>
                    </button>
                    <button type="button" class="role-button adviser">
                        <img src="{{ asset('frontend/img/adviser.png') }}" alt="Adviser Icon" class="role-icon">
                        <div class="role-text">
                            <span>Adviser</span>
                            <span class="role-subtitle">Full Access</span>
                        </div>
                    </button>

                    <div class="input-group-1">
                        <img src="{{ asset('frontend/img/officer.png') }}" alt="Officer Icon" class="icon-input-1">
                        <select id="officer" class="input-field-1">
                            <option value="" disabled selected>Officer</option>
                            <option value="president">President</option>
                            <option value="vice-president">Vice-President</option>
                            <option value="secretary">Secretary</option>
                            <option value="representative">Representative</option>
                        </select>
                    </div>
                </div>

                <!-- RFID Input -->
                <div class="input-group">
                    <img src="{{ asset('frontend/img/rfid.png') }}" alt="RFID Icon" class="icon-input">
                    <input type="text" name="rfid" placeholder="RFID" class="input-field" required>
                </div>
                <!-- School Year Input -->
                <div class="input-group">
                    <img src="{{ asset('frontend/img/schoolyear.png') }}" alt="School Year Icon" class="icon-input">
                    <input type="text" name="schoolyear" placeholder="School Year" class="input-field" required>
                </div>
                <!-- Terms and Conditions -->
                {{-- <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">Accept Terms and Conditions.</label>
                </div> --}}
                <button type="submit" class="submit-btn">Create Account</button>
                <p class="login-link">Already have an account? <a href="{{ url('login') }}">Login</a></p>
            </form>
            {{-- @else
                <p>User not found.</p>
            @endif --}}
        </div>
        <!-- Right Section (Info) -->
        <div class="info-section">
            <img src="{{ asset('frontend/img/compesa.png') }}" alt="University Seal" class="seal">
            <div class="text-center">
                <img src="{{ asset('frontend/img/comped.png') }}" alt="CompED Logo" class="logo">
                <p class="description">CompED: A Social Media Platform for Collaborative Learning and Event Management.
                </p>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
</body>

</html>
