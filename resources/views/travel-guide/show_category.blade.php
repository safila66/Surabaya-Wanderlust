<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Surabaya Wanderlust</title>
</head>
<body>
@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.6), rgba(7, 17, 42, 0.8)), url('https://images.unsplash.com/photo-1549473889-14f410d83298?w=1600&q=80');">
    <div class="container-main text-center">
        <h1 class="page-hero-title">{{ $title }}</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">Explore the beauty of {{ $title }} in Surabaya.</p>
    </div>
</header>

<main class="section container-main" style="min-height: 400px;">
    @if($items->count() > 0)
        <div class="grid-auto">
            @foreach($items as $item)
                <div class="uni-card">
                    @if($item->image)
                    <div class="uni-card-image-wrap">
                        <img class="uni-card-image" src="{{ \App\Support\Media::url($item->image) }}" alt="{{ $item->name ?? $item->title }}">
                    </div>
                    @endif
                    <div class="uni-card-body">
                        @if(isset($field) && $field)
                            <div style="font-size:22px; color:var(--gold, #d4a017); margin-bottom:8px;"><i class="fa-solid fa-lightbulb"></i></div>
                        @endif
                        <div class="uni-card-title">{{ $item->name ?? $item->title }}</div>
                        <div class="uni-card-desc">
                            @if(isset($field) && $field)
                                {{ $item->$field }}
                            @else
                                {{ \Illuminate\Support\Str::limit($item->description, 110) }}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align:center; color: var(--text-muted); padding: 50px 0;">
            <div style="font-size: 48px; margin-bottom: 20px;"><i class="fa-solid fa-folder-open"></i></div>
            <h3>No data yet</h3>
            <p>Data for {{ $title }} is currently empty. Please add data from the database or admin panel.</p>
            <a href="javascript:history.back()" class="btn-primary" style="margin-top:20px; display:inline-block;">Go Back</a>
        </div>
    @endif
</main>
@include('partials.footer')
</body>
</html>