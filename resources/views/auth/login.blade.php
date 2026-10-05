<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <title>Login | Surabaya Wanderlust</title>
    @include('auth.partials.auth-style')
</head>
<body class="auth-body">

<div class="auth-card">
    <a href="{{ route('home') }}" class="auth-brand">
        <span class="auth-brand-name">Surabaya Wanderlust</span>
        <span class="auth-brand-tag">Somewhere in Surabaya</span>
    </a>

    <h1 class="auth-title">Welcome back.</h1>
    <p class="auth-sub">Masuk untuk menjelajahi destinasi, kuliner, dan akomodasi terbaik di Surabaya.</p>

    @if($errors->any())
        <div class="auth-error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@email.com" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>

        <button type="submit" class="auth-btn">Sign In</button>
    </form>

    <div class="auth-alt">Belum punya akun? <a href="{{ route('register') }}">Sign Up</a></div>
    <a href="{{ route('home') }}" class="auth-back">← Back to Surabaya Wanderlust</a>
</div>

</body>
</html>
