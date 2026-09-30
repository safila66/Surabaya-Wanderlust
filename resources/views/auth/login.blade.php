<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Surabaya Wanderlust</title>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F5F1E8;
            font-family: Arial, sans-serif;
            color: #29352E;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 35px;
            background: #FBF9F3;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(48, 74, 59, .10);
        }

        h1 {
            margin: 0 0 8px;
            color: #304A3B;
        }

        p {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #D8CDB9;
            border-radius: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            border: 0;
            padding: 13px;
            border-radius: 999px;
            background: #304A3B;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #A56A4A;
        }

        .error {
            color: #A04F36;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .back {
            display: block;
            margin-top: 18px;
            text-align: center;
            font-size: 12px;
            color: #A56A4A;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h1>Welcome back.</h1>

    <p>
        Sign in to share your travel experience on Surabaya Wanderlust.
    </p>

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">

        @csrf

        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <button type="submit">
            Sign In
        </button>

    </form>`n`n    <div style="text-align: center; margin-top: 20px; font-size: 13px;">`n        Don't have an account? <a href="{{ route('register') }}" style="color: #304A3B; font-weight: bold;">Sign Up</a>`n    </div>

    <a href="{{ route('home') }}" class="back">
        ← Back to Surabaya Wanderlust
    </a>

</div>

</body>
</html>
