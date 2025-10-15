<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PlantMorph</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f7f3;
        }
        .register-container {
            max-width: 600px;
            margin: 70px auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        .btn-success {
            background-color: #2d6a4f;
            border-color: #2d6a4f;
        }
        .btn-success:hover {
            background-color: #1b4332;
        }
        a {
            color: #2d6a4f;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2 class="text-center text-success mb-4 fw-bold">Create an Account</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">--Select Role--</option>
                <option value="student">Student</option>
                <option value="practitioner">Practitioner</option>
                <option value="researcher">Researcher</option>
                <option value="botanist">Botanist</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="organization" class="form-label">Organization</label>
            <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter your organization name">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm password" required>
        </div>

        <div class="mb-3">
            <label for="security_question" class="form-label">Security Question</label>
            <input type="text" class="form-control" id="security_question" name="security_question" placeholder="What is your favorite plant?" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success btn-lg">Register</button>
        </div>

        <p class="text-center mt-4 mb-0">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
