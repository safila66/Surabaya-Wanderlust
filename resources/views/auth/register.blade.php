<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <title>Sign Up | Surabaya Wanderlust</title>
    @include('auth.partials.auth-style')
</head>
<body class="auth-body">

<div class="auth-card">
    <a href="{{ route('home') }}" class="auth-brand">
        <span class="auth-brand-name">Surabaya Wanderlust</span>
        <span class="auth-brand-tag">Somewhere in Surabaya</span>
    </a>

    <h1 class="auth-title">Join us.</h1>
    <p class="auth-sub">Buat akun untuk bergabung dengan komunitas Surabaya Wanderlust.</p>

    @if($errors->any())
        <div class="auth-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@email.com" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit" class="auth-btn">Sign Up</button>
    </form>

    <div class="auth-alt">Sudah punya akun? <a href="{{ route('login') }}">Sign In</a></div>
    <a href="{{ route('home') }}" class="auth-back">← Back to Surabaya Wanderlust</a>
</div>

</body>
</html>