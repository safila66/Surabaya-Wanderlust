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
        <p class="page-hero-desc" style="margin: 0 auto;">{{ $subtitle ?? '' }}</p>
    </div>
</header>

<main class="section container-main" style="min-height: 400px;">
    @if($items->count() > 0)
        <div class="grid-auto">
            @foreach($items as $item)
                @if($type === 'culinary')
                    @php
                        $default = \App\Support\CulinaryImage::defaultFor($item);
                        $img  = \App\Support\Media::url($item->image, $default);
                        $href = route('culinary.show', $item->slug);
                        $desc = $item->description;
                    @endphp
                @else
                    @php
                        $default = null;
                        $img  = $item->cover_url;
                        $href = route('destinations.show', $item->slug);
                        $desc = $item->description;
                    @endphp
                @endif
                <a href="{{ $href }}" class="uni-card" style="text-decoration:none; color:inherit; display:flex; flex-direction:column;">
                    <div class="uni-card-image-wrap">
                        <img class="uni-card-image" src="{{ $img }}" alt="{{ $item->name }}" loading="lazy"
                             onerror="this.onerror=null;this.src='{{ \App\Support\Media::fallback($default) }}';">
                    </div>
                    <div class="uni-card-body">
                        <div class="uni-card-title">{{ $item->name }}</div>
                        <div class="uni-card-desc">{{ \Illuminate\Support\Str::limit(strip_tags((string) $desc), 110) }}</div>
                    </div>
                </a>
            @endforeach
        </div>

        @if($type === 'culinary')
            {{ $items->onEachSide(1)->links('partials.pagination', ['label' => 'kuliner']) }}
        @endif
    @else
        <div style="text-align:center; color: var(--text-muted); padding: 50px 0;">
            <div style="font-size: 48px; margin-bottom: 20px;"><i class="fa-solid fa-folder-open"></i></div>
            <h3>No data yet</h3>
            <p>Data for {{ $title }} is currently empty.</p>
            <a href="javascript:history.back()" class="btn-primary" style="margin-top:20px; display:inline-block;">Go Back</a>
        </div>
    @endif
</main>
@include('partials.footer')
</body>
</html>