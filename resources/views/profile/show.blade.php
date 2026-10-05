<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t='dark';try{t=localStorage.getItem('sw-theme')||'dark';}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>{{ $user->name }} (&#64;{{ $user->username }}) - Surabaya Wanderlust</title>
    <style>
        .pf-wrap { width: 100%; max-width: 960px; margin-left: auto; margin-right: auto; box-sizing: border-box; padding: 110px 20px 64px; }

        .pf-head { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 18px; overflow: hidden; margin-bottom: 20px; }
        .pf-banner {
            position: relative; height: 200px;
            background: linear-gradient(135deg, #17275f 0%, #07112a 60%, #2b2410 100%) center/cover no-repeat;
        }
        .pf-head-body { padding: 0 24px 22px; }
        .pf-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; }
        .pf-actions { display: flex; flex-wrap: wrap; justify-content: flex-end; gap: 8px; padding-top: 14px; }

        .pf-avatar {
            position: relative; flex: none; width: 120px; height: 120px; border-radius: 50%;
            border: 4px solid var(--bg-surface);
            background: linear-gradient(var(--gold-light), var(--gold-light)), var(--bg-surface);
            color: var(--gold); display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; overflow: hidden;
        }
        .pf-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .pf-top .pf-avatar { margin-top: -62px; }

        .pf-name { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin: 12px 0 0; font-family: 'Playfair Display', serif; font-size: 26px; line-height: 1.2; }
        .pf-badge { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; padding: 3px 10px; border-radius: 999px; background: var(--gold-light); color: var(--gold); border: 1px solid var(--gold-border); }
        .pf-handle { margin: 2px 0 0; font-size: 14px; opacity: .65; }
        .pf-bio { margin: 14px 0 0; font-size: 15px; line-height: 1.55; white-space: pre-line; word-break: break-word; }
        .pf-meta { display: flex; flex-wrap: wrap; gap: 6px 18px; margin: 14px 0 0; font-size: 13.5px; opacity: .75; }
        .pf-meta i { margin-right: 6px; }
        .pf-meta a { color: var(--gold); text-decoration: none; font-weight: 600; }
        .pf-meta a:hover { text-decoration: underline; }
        .pf-counts { display: flex; gap: 20px; margin-top: 14px; font-size: 14px; }
        .pf-counts b { font-weight: 800; }
        .pf-counts span { opacity: .65; }

        .pf-btn { border: 0; padding: 10px 22px; border-radius: 999px; background: var(--gold); color: #07112a; font-weight: 800; font-size: 13px; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 6px; transition: background .15s, border-color .15s; }
        .pf-btn:hover { background: var(--gold-dark); }
        .pf-btn-ghost { background: transparent; border: 1px solid var(--gold-border); color: var(--gold); }
        .pf-btn-ghost:hover { background: var(--gold-light); }
        .pf-btn-danger { background: #d94848; color: #fff; }
        .pf-btn-danger:hover { background: #b93a3a; }

        .pf-tabs { display: flex; background: var(--bg-surface); border: 1px solid var(--border); border-radius: 14px; padding: 4px; margin-bottom: 20px; gap: 4px; }
        .pf-tab { flex: 1; border: 0; background: transparent; color: var(--text-primary); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; padding: 11px 8px; border-radius: 10px; cursor: pointer; opacity: .7; transition: .15s; }
        .pf-tab:hover { opacity: 1; background: var(--gold-light); }
        .pf-tab.is-active { opacity: 1; background: var(--gold-light); color: var(--gold); }
        .pf-tab small { font-size: 11px; margin-left: 4px; opacity: .8; }
        .pf-panel[hidden] { display: none; }

        .pf-card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 18px; padding: 24px; margin-bottom: 20px; }
        .pf-h { font-family: 'Playfair Display', serif; font-size: 20px; margin: 0 0 16px; }
        .pf-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 14px 0; border-bottom: 1px solid var(--border); font-size: 14px; }
        .pf-row:first-child { padding-top: 0; }
        .pf-row:last-child { border-bottom: 0; padding-bottom: 0; }
        .pf-row a { color: var(--gold); text-decoration: none; font-weight: 700; }
        .pf-row small { display: block; opacity: .65; margin-top: 3px; font-size: 12px; line-height: 1.5; }
        .pf-star { color: var(--gold); white-space: nowrap; }
        .pf-empty { opacity: .65; font-size: 14px; padding: 6px 0; }
        .pf-empty a { color: var(--gold); font-weight: 700; text-decoration: none; }

        .pf-ok { background: rgba(60,180,100,.15); border: 1px solid rgba(60,180,100,.4); padding: 10px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 18px; }
        .pf-warn { background: rgba(217,72,72,.12); border: 1px solid rgba(217,72,72,.4); padding: 12px 14px; border-radius: 10px; font-size: 13px; line-height: 1.55; margin-bottom: 18px; }

        .pf-field { margin-bottom: 16px; }
        .pf-field label { display: flex; justify-content: space-between; font-size: 12px; font-weight: 700; letter-spacing: .5px; text-transform: uppercase; margin-bottom: 6px; opacity: .85; }
        .pf-field label em { font-style: normal; font-weight: 500; text-transform: none; letter-spacing: 0; opacity: .7; }
        .pf-input { width: 100%; box-sizing: border-box; padding: 12px 14px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,.08); color: var(--text-primary); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; outline: none; resize: vertical; }
        [data-theme="light"] .pf-input { background: rgba(255,255,255,.9); }
        .pf-input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-light); }
        .pf-input.is-invalid { border-color: rgba(220,70,70,.8); }
        .pf-prefix { position: relative; }
        .pf-prefix > span { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); opacity: .55; font-size: 14px; }
        .pf-prefix > .pf-input { padding-left: 30px; }
        .pf-fe { margin-top: 5px; font-size: 12px; color: #e05555; }

        .pf-req { list-style: none; margin: 10px 0 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 4px 12px; font-size: 12px; opacity: .75; }
        .pf-req li::before { content: '\25CB'; margin-right: 6px; }
        .pf-req li.ok { color: #3cb464; opacity: 1; }
        .pf-req li.ok::before { content: '\25CF'; }

        .st-grid { display: grid; grid-template-columns: 260px minmax(0, 1fr); gap: 20px; align-items: start; }
        .st-grid > * { min-width: 0; }
        .st-menu { position: sticky; top: 96px; background: var(--bg-surface); border: 1px solid var(--border); border-radius: 18px; padding: 8px; }
        .st-group { margin: 14px 14px 4px; font-size: 12px; font-weight: 700; opacity: .6; }
        .st-group:first-child { margin-top: 6px; }
        .st-item { display: flex; align-items: center; gap: 12px; width: 100%; border: 0; background: transparent; color: var(--text-primary); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 600; text-align: left; padding: 12px 14px; border-radius: 12px; cursor: pointer; opacity: .75; transition: .15s; }
        .st-item i { width: 18px; text-align: center; }
        .st-item:hover { opacity: 1; background: var(--gold-light); }
        .st-item.is-active { opacity: 1; background: var(--gold-light); color: var(--gold); }
        .st-section[hidden] { display: none; }
        .st-desc { margin: -8px 0 18px; font-size: 13.5px; line-height: 1.6; opacity: .7; }
        .st-actions { display: flex; flex-wrap: wrap; gap: 10px; }

        .pf-dialog { width: min(600px, calc(100vw - 24px)); max-height: calc(100vh - 32px); padding: 0; border: 1px solid var(--border); border-radius: 18px; background: var(--bg-surface); color: var(--text-primary); overflow: hidden; }
        .pf-dialog::backdrop { background: rgba(3, 8, 20, .65); backdrop-filter: blur(3px); }
        .pf-dialog form { display: flex; flex-direction: column; max-height: calc(100vh - 32px); }
        .pf-dh { display: flex; align-items: center; gap: 14px; padding: 12px 16px; border-bottom: 1px solid var(--border); }
        .pf-dh h3 { flex: 1; margin: 0; font-size: 18px; font-family: 'Playfair Display', serif; }
        .pf-x { width: 36px; height: 36px; border: 0; border-radius: 50%; background: transparent; color: var(--text-primary); font-size: 18px; cursor: pointer; }
        .pf-x:hover { background: var(--gold-light); }
        .pf-dbody { overflow-y: auto; padding-bottom: 8px; }
        .pf-dbody .pf-banner { height: 170px; }
        .pf-dbody .pf-avatar { width: 104px; height: 104px; font-size: 40px; margin: -52px 0 18px 20px; }
        .pf-dfields { padding: 0 20px 12px; }

        .pf-cam-row { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; gap: 12px; background: rgba(0,0,0,.28); }
        .pf-cam { width: 42px; height: 42px; border: 0; border-radius: 50%; background: rgba(7,17,42,.72); color: #fff; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; font-size: 15px; transition: background .15s; }
        .pf-cam:hover { background: rgba(7,17,42,.92); }
        .pf-cam[hidden] { display: none; }
        .pf-avatar .pf-cam-row { border-radius: 50%; }

        @media (max-width: 760px) {
            .st-grid { grid-template-columns: 1fr; }
            .st-menu { position: static; display: flex; gap: 4px; overflow-x: auto; padding: 6px; }
            .st-group { display: none; }
            .st-item { width: auto; flex: none; white-space: nowrap; }
        }
        @media (max-width: 600px) {
            .pf-wrap { padding-top: 96px; }
            .pf-banner { height: 140px; }
            .pf-avatar { width: 92px; height: 92px; font-size: 38px; }
            .pf-top .pf-avatar { margin-top: -48px; }
            .pf-dbody .pf-avatar { width: 88px; height: 88px; margin-top: -44px; }
            .pf-head-body, .pf-card { padding-left: 18px; padding-right: 18px; }
            .pf-req { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
@include('partials.navbar')

@php
    $profileBag  = $errors->getBag('profile');
    $passwordBag = $errors->getBag('password');
    $deleteBag   = $errors->getBag('delete');
    $sessionsBag = $errors->getBag('sessions');
    $openModal   = $profileBag->hasAny(['name', 'username', 'bio', 'location', 'website', 'avatar', 'banner']);

    $openTab = 'reviews';
    $openSection = 'account';
    if ($profileBag->has('email')) {
        $openTab = 'settings'; $openSection = 'account';
    } elseif ($passwordBag->any()) {
        $openTab = 'settings'; $openSection = 'password';
    } elseif ($deleteBag->any()) {
        $openTab = 'settings'; $openSection = 'delete';
    } elseif ($sessionsBag->any()) {
        $openTab = 'settings'; $openSection = 'sessions';
    }
    $serverPicked = $openTab === 'settings';
@endphp

<main class="pf-wrap">

    @if(session('success'))
        <div class="pf-ok"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif

    {{-- HEADER --}}
    <section class="pf-head">
        <div class="pf-banner" @if($user->banner_url) style="background-image:url('{{ $user->banner_url }}')" @endif></div>

        <div class="pf-head-body">
            <div class="pf-top">
                <div class="pf-avatar">
                    @if($user->avatar_url)
                        <img src="{{ $user->avatar_url }}" alt="Foto profil {{ $user->name }}">
                    @else
                        <span>{{ $user->initial }}</span>
                    @endif
                </div>

                <div class="pf-actions">
                    @if($user->role === 'admin')
                        <a href="/admin" class="pf-btn pf-btn-ghost"><i class="fa-solid fa-shield-halved"></i> Admin Panel</a>
                    @endif
                    <button type="button" class="pf-btn pf-btn-ghost" id="open-edit">Edit profile</button>
                </div>
            </div>

            <h1 class="pf-name">
                {{ $user->name }}
                <span class="pf-badge">{{ $user->role === 'admin' ? 'Admin' : 'Traveler' }}</span>
            </h1>
            <p class="pf-handle">{{ '@' . $user->username }}</p>

            @if($user->bio)
                <p class="pf-bio">{{ $user->bio }}</p>
            @endif

            <div class="pf-meta">
                @if($user->location)
                    <span><i class="fa-solid fa-location-dot"></i>{{ $user->location }}</span>
                @endif
                @if($user->website)
                    <span>
                        <i class="fa-solid fa-link"></i>
                        <a href="{{ $user->website }}" target="_blank" rel="noopener nofollow ugc">{{ preg_replace('#^www\.#', '', parse_url($user->website, PHP_URL_HOST) ?: $user->website) }}</a>
                    </span>
                @endif
                <span><i class="fa-regular fa-calendar"></i>Joined {{ $user->created_at?->translatedFormat('F Y') }}</span>
            </div>

            <div class="pf-counts">
                <div><b>{{ $reviews->count() }}</b> <span>Reviews</span></div>
                <div><b>{{ $posts->count() }}</b> <span>Stories</span></div>
                <div><b>{{ $wishlist->count() }}</b> <span>Wishlist</span></div>
            </div>
        </div>
    </section>

    {{-- TABS --}}
    <div class="pf-tabs" role="tablist">
        <button type="button" class="pf-tab" role="tab" data-tab="reviews">Reviews <small>{{ $reviews->count() }}</small></button>
        <button type="button" class="pf-tab" role="tab" data-tab="stories">Stories <small>{{ $posts->count() }}</small></button>
        <button type="button" class="pf-tab" role="tab" data-tab="wishlist">Wishlist <small>{{ $wishlist->count() }}</small></button>
        <button type="button" class="pf-tab" role="tab" data-tab="settings">Settings</button>
    </div>

    {{-- TAB: REVIEWS --}}
    <section class="pf-panel pf-card" id="tab-reviews" role="tabpanel">
        <h3 class="pf-h">My Reviews</h3>
        @forelse($reviews as $r)
            @php
                $target = $r->reviewable;
                $link = null;
                if ($target) {
                    $link = match(true) {
                        $target instanceof \App\Models\Destination   => route('destinations.show', $target->slug),
                        $target instanceof \App\Models\Culinary      => route('culinary.show', $target->slug),
                        $target instanceof \App\Models\Accommodation => route('accommodations.show', $target->slug),
                        default => null,
                    };
                }
            @endphp
            <div class="pf-row">
                <div>
                    @if($link)<a href="{{ $link }}">{{ $target->name }}</a>@else<b>{{ $target->name ?? 'Deleted item' }}</b>@endif
                    <small>{{ \Illuminate\Support\Str::limit($r->comment, 120) }} · {{ $r->created_at->diffForHumans() }}@if(!$r->is_approved) · <em>menunggu persetujuan</em>@endif</small>
                </div>
                <div class="pf-star">{{ str_repeat('★', $r->rating) }}{{ str_repeat('☆', 5 - $r->rating) }}</div>
            </div>
        @empty
            <div class="pf-empty">Kamu belum menulis review.</div>
        @endforelse
    </section>

    {{-- TAB: STORIES --}}
    <section class="pf-panel pf-card" id="tab-stories" role="tabpanel" hidden>
        <h3 class="pf-h">My Travel Stories</h3>
        @forelse($posts as $p)
            <div class="pf-row">
                <div>
                    <a href="{{ route('travel-posts.show', $p->id) }}">{{ $p->title }}</a>
                    <small>{{ $p->destination?->name }} · {{ $p->created_at->diffForHumans() }}@if(!$p->is_published) · <em>draft</em>@endif</small>
                </div>
                @if($p->rating)<div class="pf-star">{{ str_repeat('★', $p->rating) }}</div>@endif
            </div>
        @empty
            <div class="pf-empty">Belum ada cerita perjalanan. <a href="{{ route('travel-posts.create') }}">Tulis sekarang →</a></div>
        @endforelse
    </section>

    {{-- TAB: WISHLIST --}}
    <section class="pf-panel pf-card" id="tab-wishlist" role="tabpanel" hidden>
        <h3 class="pf-h">My Wishlist</h3>
        @forelse($wishlist as $w)
            <div class="pf-row">
                <div>
                    <a href="{{ route('destinations.show', $w->slug) }}">{{ $w->name }}</a>
                    <small>{{ $w->regency?->name }}@if($w->category_label) · {{ $w->category_label }}@endif</small>
                </div>
                <form action="{{ route('destinations.wishlist.toggle', $w->slug) }}" method="POST">
                    @csrf
                    <input type="hidden" name="to_profile" value="1">
                    <button type="submit" class="pf-btn pf-btn-ghost">Remove</button>
                </form>
            </div>
        @empty
            <div class="pf-empty">Wishlist masih kosong. <a href="{{ route('destinations.index') }}">Jelajahi destinasi →</a></div>
        @endforelse
    </section>

    {{-- TAB: SETTINGS --}}
    <section class="pf-panel" id="tab-settings" role="tabpanel" hidden>
        <div class="st-grid">

            <nav class="st-menu" aria-label="Settings">
                <div class="st-group">Your account</div>
                <button type="button" class="st-item" data-section="account"><i class="fa-regular fa-user"></i> Account information</button>
                <button type="button" class="st-item" data-section="password"><i class="fa-solid fa-key"></i> Change your password</button>
                <button type="button" class="st-item" data-section="delete"><i class="fa-regular fa-trash-can"></i> Delete your account</button>

                <div class="st-group">Security and account access</div>
                <button type="button" class="st-item" data-section="sessions"><i class="fa-solid fa-shield-halved"></i> Sessions and devices</button>

                <div class="st-group">Display</div>
                <button type="button" class="st-item" data-section="display"><i class="fa-solid fa-circle-half-stroke"></i> Theme</button>
            </nav>

            <div>

                {{-- Account information --}}
                <div class="st-section pf-card" data-section="account">
                    <h3 class="pf-h">Account information</h3>
                    <p class="st-desc">Detail akun yang kamu pakai untuk masuk ke Surabaya Wanderlust.</p>

                    <div class="pf-row">
                        <div><b>Username</b><small>{{ '@' . $user->username }}</small></div>
                        <button type="button" class="pf-btn pf-btn-ghost" data-open-edit>Change</button>
                    </div>
                    <div class="pf-row">
                        <div><b>Account type</b><small>{{ $user->role === 'admin' ? 'Admin' : 'Traveler' }}</small></div>
                    </div>
                    <div class="pf-row">
                        <div><b>Joined</b><small>{{ $user->created_at?->translatedFormat('d F Y') }}</small></div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" style="margin-top:22px;">
                        @csrf @method('PUT')
                        <div class="pf-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="pf-input @error('email', 'profile') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="pf-btn">Save email</button>
                    </form>
                </div>

                {{-- Change password --}}
                <div class="st-section pf-card" data-section="password" hidden>
                    <h3 class="pf-h">Change your password</h3>
                    <p class="st-desc">Gunakan password yang kuat dan belum pernah kamu pakai di situs lain.</p>

                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf @method('PUT')
                        <div class="pf-field">
                            <label for="current_password">Current password</label>
                            <input type="password" id="current_password" name="current_password" autocomplete="current-password" class="pf-input @error('current_password', 'password') is-invalid @enderror" required>
                            @error('current_password', 'password')<div class="pf-fe">{{ $message }}</div>@enderror
                        </div>
                        <div class="pf-field">
                            <label for="password">New password</label>
                            <input type="password" id="password" name="password" autocomplete="new-password" class="pf-input @error('password', 'password') is-invalid @enderror" required>
                            @error('password', 'password')<div class="pf-fe">{{ $message }}</div>@enderror
                            <ul class="pf-req" id="pw-req">
                                <li data-rule="len">Minimal 8 karakter</li>
                                <li data-rule="upper">Huruf besar</li>
                                <li data-rule="num">Angka</li>
                                <li data-rule="sym">Simbol (! @ # $ %)</li>
                            </ul>
                        </div>
                        <div class="pf-field">
                            <label for="password_confirmation">Confirm new password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" class="pf-input" required>
                        </div>
                        <button type="submit" class="pf-btn">Update password</button>
                    </form>
                </div>

                {{-- Delete account --}}
                <div class="st-section pf-card" data-section="delete" hidden>
                    <h3 class="pf-h">Delete your account</h3>

                    @if($user->role === 'admin')
                        <p class="st-desc" style="margin:0;">Akun admin tidak bisa dihapus dari halaman ini.</p>
                    @else
                        <div class="pf-warn">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            Akun, review, dan cerita perjalananmu akan dihapus permanen. Tindakan ini tidak bisa dibatalkan.
                        </div>
                        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Hapus akunmu secara permanen? Tindakan ini tidak bisa dibatalkan.');">
                            @csrf @method('DELETE')
                            <div class="pf-field">
                                <label for="del-password">Password</label>
                                <input type="password" id="del-password" name="password" autocomplete="current-password" class="pf-input @error('password', 'delete') is-invalid @enderror" required>
                                @error('password', 'delete')<div class="pf-fe">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="pf-btn pf-btn-danger"><i class="fa-regular fa-trash-can"></i> Delete account</button>
                        </form>
                    @endif
                </div>

                {{-- Sessions and devices --}}
                <div class="st-section" data-section="sessions" hidden>
                    <div class="pf-card">
                        <h3 class="pf-h">Sessions and devices</h3>

                        @if($sessionsSupported)
                            <p class="st-desc">Perangkat yang saat ini masuk ke akunmu. Kalau ada yang tidak kamu kenali, keluarkan semua perangkat lain lalu ganti password.</p>

                            @forelse($sessions as $s)
                                <div class="pf-row">
                                    <div>
                                        <b>{{ $s->device }}</b>
                                        @if($s->is_current)<span class="pf-badge" style="margin-left:6px;">This device</span>@endif
                                        <small>{{ $s->ip }} · aktif {{ $s->last_active->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @empty
                                <div class="pf-empty">Belum ada sesi tercatat.</div>
                            @endforelse

                            <form action="{{ route('profile.sessions.destroy') }}" method="POST" style="margin-top:22px;">
                                @csrf @method('DELETE')
                                <div class="pf-field">
                                    <label for="sess-password">Password</label>
                                    <input type="password" id="sess-password" name="password" autocomplete="current-password" class="pf-input @error('password', 'sessions') is-invalid @enderror" required>
                                    @error('password', 'sessions')<div class="pf-fe">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="pf-btn pf-btn-ghost">Log out other devices</button>
                            </form>
                        @else
                            <p class="st-desc" style="margin:0;">Daftar perangkat hanya tersedia kalau <code>SESSION_DRIVER=database</code> di file <code>.env</code>.</p>
                        @endif
                    </div>

                    <div class="pf-card">
                        <h3 class="pf-h">This device</h3>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="pf-btn pf-btn-ghost"><i class="fa-solid fa-right-from-bracket"></i> Log out</button>
                        </form>
                    </div>
                </div>

                {{-- Display --}}
                <div class="st-section pf-card" data-section="display" hidden>
                    <h3 class="pf-h">Theme</h3>
                    <p class="st-desc">Pilih tampilan situs. Pengaturan ini tersimpan di browser ini.</p>
                    <div class="st-actions">
                        <button type="button" class="pf-btn" data-theme-set="dark"><i class="fa-regular fa-moon"></i> Dark</button>
                        <button type="button" class="pf-btn" data-theme-set="light"><i class="fa-regular fa-sun"></i> Light</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>


{{-- EDIT PROFILE (modal) --}}
<dialog id="edit-dialog" class="pf-dialog" aria-labelledby="edit-title">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="pf-dh">
            <button type="button" class="pf-x" data-close aria-label="Tutup"><i class="fa-solid fa-xmark"></i></button>
            <h3 id="edit-title">Edit profile</h3>
            <button type="submit" class="pf-btn">Save</button>
        </div>

        <div class="pf-dbody">
            <div class="pf-banner" id="banner-preview" @if($user->banner_url) style="background-image:url('{{ $user->banner_url }}')" @endif>
                <div class="pf-cam-row">
                    <label class="pf-cam" for="banner-input" title="Ganti banner" aria-label="Ganti banner"><i class="fa-solid fa-camera"></i></label>
                    <button type="button" class="pf-cam" id="banner-remove" title="Hapus banner" aria-label="Hapus banner" @if(!$user->banner_url) hidden @endif><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div class="pf-avatar" id="avatar-preview" data-initial="{{ $user->initial }}">
                @if($user->avatar_url)
                    <img src="{{ $user->avatar_url }}" alt="">
                @else
                    <span>{{ $user->initial }}</span>
                @endif
                <div class="pf-cam-row">
                    <label class="pf-cam" for="avatar-input" title="Ganti foto profil" aria-label="Ganti foto profil"><i class="fa-solid fa-camera"></i></label>
                    <button type="button" class="pf-cam" id="avatar-remove" title="Hapus foto" aria-label="Hapus foto" @if(!$user->avatar_url) hidden @endif><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <input type="file" id="banner-input" name="banner" accept="image/png,image/jpeg,image/webp" hidden>
            <input type="file" id="avatar-input" name="avatar" accept="image/png,image/jpeg,image/webp" hidden>
            <input type="hidden" name="remove_banner" id="remove-banner" value="0">
            <input type="hidden" name="remove_avatar" id="remove-avatar" value="0">

            <div class="pf-dfields">
                @foreach(['avatar', 'banner'] as $f)
                    @error($f, 'profile')<div class="pf-fe" style="margin-bottom:12px;">{{ $message }}</div>@enderror
                @endforeach

                <div class="pf-field">
                    <label for="f-name">Name <em><span data-count-for="f-name">0</span>/60</em></label>
                    <input type="text" id="f-name" name="name" maxlength="60" class="pf-input @error('name', 'profile') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                </div>

                <div class="pf-field">
                    <label for="f-username">Username <em>huruf kecil, angka, _</em></label>
                    <div class="pf-prefix">
                        <span>&#64;</span>
                        <input type="text" id="f-username" name="username" maxlength="20" autocapitalize="off" autocomplete="off" class="pf-input @error('username', 'profile') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
                    </div>
                    @error('username', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                </div>

                <div class="pf-field">
                    <label for="f-bio">Bio <em><span data-count-for="f-bio">0</span>/160</em></label>
                    <textarea id="f-bio" name="bio" rows="3" maxlength="160" class="pf-input @error('bio', 'profile') is-invalid @enderror" placeholder="Ceritakan sedikit tentang dirimu...">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                </div>

                <div class="pf-field">
                    <label for="f-location">Location</label>
                    <input type="text" id="f-location" name="location" maxlength="60" class="pf-input @error('location', 'profile') is-invalid @enderror" value="{{ old('location', $user->location) }}" placeholder="Surabaya, Jawa Timur">
                    @error('location', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                </div>

                <div class="pf-field">
                    <label for="f-website">Website</label>
                    <input type="text" id="f-website" name="website" maxlength="120" class="pf-input @error('website', 'profile') is-invalid @enderror" value="{{ old('website', $user->website) }}" placeholder="contoh.com">
                    @error('website', 'profile')<div class="pf-fe">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </form>
</dialog>


@include('partials.footer')

<script>
(function () {
    const $ = (id) => document.getElementById(id);

    /* Tabs + bagian Settings */
    const tabs      = document.querySelectorAll('.pf-tab');
    const panels    = document.querySelectorAll('.pf-panel');
    const items     = document.querySelectorAll('.st-item');
    const sections  = document.querySelectorAll('.st-section');
    const validTabs     = ['reviews', 'stories', 'wishlist', 'settings'];
    const validSections = ['account', 'password', 'sessions', 'display', 'delete'];

    let currentTab = 'reviews';
    let currentSection = 'account';

    function writeHash() {
        history.replaceState(null, '', currentTab === 'settings' ? '#settings-' + currentSection : '#' + currentTab);
    }

    function showTab(name) {
        if (!validTabs.includes(name)) name = 'reviews';
        currentTab = name;
        tabs.forEach(t => {
            const on = t.dataset.tab === name;
            t.classList.toggle('is-active', on);
            t.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        panels.forEach(p => { p.hidden = p.id !== 'tab-' + name; });
        writeHash();
    }

    function showSection(name) {
        if (!validSections.includes(name)) name = 'account';
        currentSection = name;
        items.forEach(i => i.classList.toggle('is-active', i.dataset.section === name));
        sections.forEach(s => { s.hidden = s.dataset.section !== name; });
        writeHash();
    }

    tabs.forEach(t => t.addEventListener('click', () => showTab(t.dataset.tab)));
    items.forEach(i => i.addEventListener('click', () => showSection(i.dataset.section)));

    const raw = location.hash.replace('#', '');
    let hashTab = raw, hashSection = 'account';
    if (raw.startsWith('settings')) {
        hashTab = 'settings';
        if (raw.startsWith('settings-')) hashSection = raw.slice(9);
    }

    const serverPicked = @json($serverPicked);
    if (serverPicked) {
        showSection(@json($openSection));
        showTab(@json($openTab));
    } else {
        showSection(hashSection);
        showTab(validTabs.includes(hashTab) ? hashTab : 'reviews');
    }

    /* Modal Edit profile */
    const dlg = $('edit-dialog');
    $('open-edit').addEventListener('click', () => dlg.showModal());
    document.querySelectorAll('[data-open-edit]').forEach(b => b.addEventListener('click', () => dlg.showModal()));
    dlg.querySelectorAll('[data-close]').forEach(b => b.addEventListener('click', () => dlg.close()));
    dlg.addEventListener('click', (e) => { if (e.target === dlg) dlg.close(); });
    @if($openModal) dlg.showModal(); @endif

    /* Counter karakter */
    document.querySelectorAll('[data-count-for]').forEach(out => {
        const input = $(out.dataset.countFor);
        const update = () => { out.textContent = input.value.length; };
        input.addEventListener('input', update);
        update();
    });

    /* Checklist syarat password */
    const pw = $('password');
    const reqs = document.querySelectorAll('#pw-req li');
    const tests = {
        len:   v => v.length >= 8,
        upper: v => /\p{Lu}/u.test(v),
        num:   v => /[0-9]/.test(v),
        sym:   v => /[^\p{L}\p{N}\s]/u.test(v),
    };
    if (pw) {
        pw.addEventListener('input', () => {
            reqs.forEach(li => li.classList.toggle('ok', tests[li.dataset.rule](pw.value)));
        });
    }

    /* Theme */
    const themeBtns = document.querySelectorAll('[data-theme-set]');
    function applyTheme(t) {
        try { localStorage.setItem('sw-theme', t); } catch (e) {}
        document.documentElement.setAttribute('data-theme', t);
        themeBtns.forEach(b => b.classList.toggle('pf-btn-ghost', b.dataset.themeSet !== t));
    }
    themeBtns.forEach(b => b.addEventListener('click', () => applyTheme(b.dataset.themeSet)));
    const nowTheme = document.documentElement.getAttribute('data-theme') || 'dark';
    themeBtns.forEach(b => b.classList.toggle('pf-btn-ghost', b.dataset.themeSet !== nowTheme));

    /* Preview & hapus foto */
    const MAX = { avatar: 2, banner: 5 }; // MB, sama dengan aturan di server

    const bannerBox  = $('banner-preview');
    const avatarBox  = $('avatar-preview');

    function setAvatar(url) {
        let img = avatarBox.querySelector('img');
        const initial = avatarBox.querySelector('span');
        if (url) {
            if (!img) { img = document.createElement('img'); img.alt = ''; avatarBox.prepend(img); }
            img.src = url;
            if (initial) initial.hidden = true;
        } else {
            if (img) img.remove();
            if (initial) initial.hidden = false;
            else {
                const s = document.createElement('span');
                s.textContent = avatarBox.dataset.initial;
                avatarBox.prepend(s);
            }
        }
    }
    function setBanner(url) {
        bannerBox.style.backgroundImage = url ? `url('${url}')` : '';
    }

    function wire(kind, setter) {
        const input  = $(kind + '-input');
        const remove = $(kind + '-remove');
        const flag   = $('remove-' + kind);

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) return;
            if (file.size > MAX[kind] * 1024 * 1024) {
                alert('Ukuran ' + (kind === 'avatar' ? 'foto profil' : 'banner') + ' maksimal ' + MAX[kind] + ' MB.');
                input.value = '';
                return;
            }
            setter(URL.createObjectURL(file));
            flag.value = '0';
            remove.hidden = false;
        });

        remove.addEventListener('click', () => {
            input.value = '';
            flag.value = '1';
            setter(null);
            remove.hidden = true;
        });
    }
    wire('avatar', setAvatar);
    wire('banner', setBanner);
})();
</script>
</body>
</html>