@extends("layouts.app")
@section("title", $user->name . " (@" . $user->username . ") - Surabaya Wanderlust")
@section("content")
<style>
/* CSS dari profile/show.blade.php */
.pf-wrap { width: 100%; max-width: 960px; margin: 40px auto; box-sizing: border-box; padding: 0 20px; }
.pf-head { background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 18px; overflow: hidden; margin-bottom: 20px; }
.pf-banner { position: relative; height: 200px; background: linear-gradient(135deg, #17275f 0%, #07112a 60%, #2b2410 100%) center/cover no-repeat; }
.pf-head-body { padding: 0 24px 22px; }
.pf-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; }
.pf-avatar { position: relative; flex: none; width: 120px; height: 120px; border-radius: 50%; border: 4px solid var(--bg-surface); background: linear-gradient(var(--gold), var(--gold)), var(--bg-surface); color: var(--gold); display: flex; align-items: center; justify-content: center; font-family: "Playfair Display", serif; font-size: 48px; font-weight: 700; overflow: hidden; margin-top: -62px; }
.pf-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pf-name { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin: 12px 0 0; font-family: "Playfair Display", serif; font-size: 26px; line-height: 1.2; }
.pf-badge { font-size: 10px; font-weight: 800; padding: 3px 10px; border-radius: 999px; background: rgba(212,160,23,0.2); color: var(--gold); border: 1px solid var(--gold); }
.pf-handle { margin: 2px 0 0; font-size: 14px; opacity: .65; }
.pf-bio { margin: 14px 0 0; font-size: 15px; line-height: 1.55; white-space: pre-line; word-break: break-word; }
.pf-meta { display: flex; flex-wrap: wrap; gap: 6px 18px; margin: 14px 0 0; font-size: 13.5px; opacity: .75; }
.pf-meta a { color: var(--gold); text-decoration: none; font-weight: 600; }
.pf-counts { display: flex; gap: 20px; margin-top: 14px; font-size: 14px; }
.pf-counts b { font-weight: 800; }
.pf-counts span { opacity: .65; }

.pf-tabs { display: flex; background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 14px; padding: 4px; margin-bottom: 20px; gap: 4px; }
.pf-tab { flex: 1; border: 0; background: transparent; color: inherit; font-size: 14px; font-weight: 700; padding: 11px 8px; border-radius: 10px; cursor: pointer; opacity: .7; transition: .15s; }
.pf-tab.is-active { opacity: 1; background: rgba(212,160,23,0.1); color: var(--gold); }

.pf-card { background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 18px; padding: 24px; margin-bottom: 20px; }
.pf-h { font-family: "Playfair Display", serif; font-size: 20px; margin: 0 0 16px; }
.pf-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 14px 0; border-bottom: 1px solid var(--border-color); font-size: 14px; }
.pf-row:last-child { border-bottom: 0; padding-bottom: 0; }
.pf-row a { color: var(--gold); text-decoration: none; font-weight: 700; }
.pf-empty { opacity: .65; font-size: 14px; padding: 6px 0; }
</style>

<div class="pf-wrap">
    <header class="pf-head">
        <div class="pf-banner" @if($user->banner) style="background-image: url('{{ $user->banner_url }}');" @endif></div>
        <div class="pf-head-body">
            <div class="pf-top">
                <div class="pf-avatar">
                    @if($user->avatar) <img src="{{ $user->avatar_url }}" alt=""> @else {{ $user->initial }} @endif
                </div>
            </div>
            <h1 class="pf-name">
                {{ $user->name }}
                @if($user->role === "admin")<span class="pf-badge">Admin</span>@endif
            </h1>
            <div class="pf-handle">&#64;{{ $user->username }}</div>
            
            @if($user->bio)<div class="pf-bio">{{ $user->bio }}</div>@endif
            
            <div class="pf-meta">
                @if($user->location)<span><i class="fa-solid fa-location-dot"></i> {{ $user->location }}</span>@endif
                @if($user->website)<span><i class="fa-solid fa-link"></i> <a href="{{ $user->website }}" target="_blank" rel="nofollow">{{ preg_replace("#^https?://#", "", $user->website) }}</a></span>@endif
                <span><i class="fa-regular fa-calendar"></i> Joined {{ $user->created_at?->translatedFormat("F Y") }}</span>
            </div>

            <div class="pf-counts">
                <div><b>{{ $reviews->count() }}</b> <span>Reviews</span></div>
                @if(!$user->is_private || (Auth::check() && Auth::id() === $user->id))
                    <div><b>{{ $posts->count() }}</b> <span>Stories</span></div>
                    <div><b>{{ $wishlist->count() }}</b> <span>Wishlist</span></div>
                @endif
            </div>
        </div>
    </header>

    <div class="pf-tabs">
        <button class="pf-tab is-active" onclick="switchTab(this, 'tab-reviews')">Reviews <small>{{ $reviews->count() }}</small></button>
        @if(!$user->is_private || (Auth::check() && Auth::id() === $user->id))
            <button class="pf-tab" onclick="switchTab(this, 'tab-stories')">Stories <small>{{ $posts->count() }}</small></button>
            <button class="pf-tab" onclick="switchTab(this, 'tab-wishlist')">Wishlist <small>{{ $wishlist->count() }}</small></button>
        @endif
    </div>

    @if($user->is_private && (!Auth::check() || Auth::id() !== $user->id))
        <div class="pf-card" style="text-align:center; padding: 40px 20px;">
            <div style="font-size:40px; margin-bottom:10px;"><i class="fa-solid fa-lock"></i></div>
            <h3>This account is private</h3>
            <p style="opacity:0.7;">This user has chosen to hide their travel stories and wishlist. However, their public reviews are still visible below.</p>
        </div>
    @endif

    <section class="pf-panel pf-card" id="tab-reviews">
        <h3 class="pf-h">Reviews by {{ $user->name }}</h3>
        @forelse($reviews as $r)
            @php
                $target = $r->reviewable;
                $link = null;
                if ($target) {
                    $link = match(true) {
                        $target instanceof \App\Models\Destination   => route("destinations.show", $target->slug),
                        $target instanceof \App\Models\Culinary      => route("culinary.show", $target->slug),
                        $target instanceof \App\Models\Accommodation => route("accommodations.show", $target->slug),
                        default => null,
                    };
                }
            @endphp
            <div class="pf-row" style="flex-direction:column; align-items:flex-start;">
                <div style="display:flex; justify-content:space-between; width:100%;">
                    <div>
                        @if($link) <a href="{{ $link }}">{{ $target->name ?? "Target" }}</a> @else Target dihapus @endif
                        <div class="pf-star" style="margin-top:4px;">
                            @for($i=1; $i<=5; $i++)
                                <i class="{{ $i <= $r->rating ? "fa-solid" : "fa-regular" }} fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <small>{{ $r->created_at->diffForHumans() }}</small>
                </div>
                @if($r->content)
                    <p style="margin:8px 0 0; font-size:14px;">{{ $r->content }}</p>
                @endif
            </div>
        @empty
            <div class="pf-empty">No reviews written yet.</div>
        @endforelse
    </section>

    @if(!$user->is_private || (Auth::check() && Auth::id() === $user->id))
        <section class="pf-panel pf-card" id="tab-stories" style="display:none;">
            <h3 class="pf-h">Travel Stories</h3>
            @forelse($posts as $p)
                <div class="pf-row">
                    <div>
                        <a href="{{ route("travel-posts.show", $p->id) }}">{{ $p->title }}</a>
                        <small>{{ $p->destination?->name }} • {{ $p->created_at->diffForHumans() }}</small>
                    </div>
                    @if($p->rating)
                        <div class="pf-star">
                            @for($i=1; $i<=5; $i++)
                                <i class="{{ $i <= $p->rating ? "fa-solid" : "fa-regular" }} fa-star"></i>
                            @endfor
                        </div>
                    @endif
                </div>
            @empty
                <div class="pf-empty">No travel stories written yet.</div>
            @endforelse
        </section>

        <section class="pf-panel pf-card" id="tab-wishlist" style="display:none;">
            <h3 class="pf-h">Wishlist</h3>
            @forelse($wishlist as $w)
                <div class="pf-row">
                    <div>
                        <a href="{{ route("destinations.show", $w->slug) }}">{{ $w->name }}</a>
                        <small>{{ $w->regency?->name }} @if($w->category) • {{ $w->category }}@endif</small>
                    </div>
                </div>
            @empty
                <div class="pf-empty">Wishlist is empty.</div>
            @endforelse
        </section>
    @endif
</div>

<script>
function switchTab(btn, targetId) {
    document.querySelectorAll(".pf-tab").forEach(t => t.classList.remove("is-active"));
    btn.classList.add("is-active");
    document.querySelectorAll(".pf-panel").forEach(p => p.style.display = "none");
    const target = document.getElementById(targetId);
    if(target) target.style.display = "block";
}
</script>
@endsection
