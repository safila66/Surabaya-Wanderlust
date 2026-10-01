<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Surabaya Wanderlust</title>
</head>
<body>
@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.55), rgba(7, 17, 42, 0.75)), url('https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Suro_and_Boyo_statue%2C_Surabaya.jpg/1280px-Suro_and_Boyo_statue%2C_Surabaya.jpg');">
    <div class="container-main text-center">
        <span style="color:var(--gold); display:block; margin-bottom:12px; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.1em;">Surabaya Culture</span>
        <h1 class="page-hero-title">{{ $title }}</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">Explore the beauty of {{ $title }} in Surabaya.</p>
    </div>
</header>

<main class="section container-main" style="min-height: 400px;">
    @if($items->count() > 0)
        <div class="grid-auto">
            @foreach($items as $item)
                @php
                    $destSlug = $item->slug ?? \Illuminate\Support\Str::slug($item->name ?? $item->title ?? '');
                    $dest = $destSlug ? \App\Models\Destination::where('slug', $destSlug)->first() : null;
                    $href = $dest ? route('destinations.show', $dest->slug) : '#';
                @endphp
                <a href="{{ $href }}" class="uni-card" style="text-decoration:none; display:block; {{ $href === '#' ? 'cursor:default;' : '' }}">
                    <div class="uni-card-image-wrap">
                        @if($item->image)
                            @if(Str::startsWith($item->image, ['http://', 'https://']))
                                <img class="uni-card-image" src="{{ $item->image }}" alt="{{ $item->name ?? $item->title }}">
                            @else
                                <img class="uni-card-image" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name ?? $item->title }}">
                            @endif
                        @else
                            <div class="card-img-placeholder">
                                <i class="fa-solid fa-landmark"></i>
                            </div>
                        @endif
                    </div>
                    <div class="uni-card-body">
                        @if($dest && $dest->regency)
                            <span class="uni-card-label">
                                <i class="fa-solid fa-location-dot fa-xs"></i>
                                {{ $dest->regency->name }}
                            </span>
                        @endif
                        <div class="uni-card-title">{{ $item->name ?? $item->title }}</div>
                        <div class="uni-card-desc">
                            @if(isset($field) && $field)
                                {{ \Illuminate\Support\Str::limit($item->$field, 110) }}
                            @else
                                {{ \Illuminate\Support\Str::limit($item->description, 110) }}
                            @endif
                        </div>
                        <div class="uni-card-meta" style="margin-top:12px;">
                            <span></span>
                            @if($href !== '#')
                                <span class="uni-card-link">Explore <i class="fa-solid fa-arrow-right fa-xs"></i></span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div style="text-align:center; color: var(--text-muted); padding: 60px 0;">
            <div style="font-size: 48px; margin-bottom: 20px;"><i class="fa-solid fa-folder-open"></i></div>
            <h3>No data yet</h3>
            <p>Data for {{ $title }} is currently empty. Please add data from the admin panel.</p>
            <a href="javascript:history.back()" class="btn-primary" style="margin-top:20px; display:inline-block;">Go Back</a>
        </div>
    @endif
</main>
@include('partials.footer')
</body>
</html>