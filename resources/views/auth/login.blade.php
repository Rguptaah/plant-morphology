<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PlantMorph</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f7f3;
        }
        .login-container {
            max-width: 450px;
            margin: 100px auto;
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

<div class="login-container">
    <h2 class="text-center text-success mb-4 fw-bold">Sign In</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email or Username</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success btn-lg">Login</button>
        </div>

        <p class="text-center mt-4 mb-0">
            New user? <a href="{{ route('register') }}">Create an account</a>
        </p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
