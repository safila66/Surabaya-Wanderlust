<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surabaya Wanderlust</title>
</head>
<body>
@include('partials.navbar')
<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.6), rgba(7, 17, 42, 0.8)), url('https://images.unsplash.com/photo-1549473889-14f410d83298?w=1600&q=80');">
    <div class="container-main text-center">
        <h1 class="page-hero-title">Coming Soon</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">This section is being updated with new content.</p>
    </div>
</header>
<main class="section container-main" style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
    <div style="text-align:center; color: var(--text-muted);">
        <h3>Content will be available soon</h3>
        <a href="javascript:history.back()" class="btn-primary" style="margin-top:20px; display:inline-block;">Go Back</a>
    </div>
</main>
@include('partials.footer')
</body>
</html>