<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>

    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $post->title }} — Surabaya Wanderlust
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --cream: #F5F1E8;
            --card: #FBF9F3;
            --green: #304A3B;
            --dark: #29352E;
            --olive: #6D7651;
            --terracotta: #A56A4A;
            --border: #D8CDB9;
        }

        * {
            box-sizing: border-box;
        }

        

        .page {
            max-width: 1100px;
            margin: auto;
            padding: 45px 20px 80px;
        }

        .back {
            color: var(--green);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: .2s ease;
        }

        .back:hover {
            color: var(--terracotta);
        }

        .post-header {
            margin: 35px 0;
        }

        .eyebrow {
            color: var(--terracotta);
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 12px;
        }

        h1 {
            font-family: Georgia, serif;
            color: var(--green);
            font-size: clamp(38px, 6vw, 70px);
            line-height: 1;
            max-width: 850px;
            margin-bottom: 20px;
        }

        .meta {
            color: #6c736d;
            font-size: 14px;
        }

        .meta strong {
            color: var(--dark);
        }

        .rating {
            margin-top: 14px;
            color: #B59A6A;
            font-size: 23px;
            letter-spacing: 2px;
        }

        .rating-number {
            color: #666;
            font-size: 14px;
            letter-spacing: 0;
            margin-left: 8px;
        }

        /* =========================
           GALLERY
        ========================= */

        .gallery {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 260px 260px;
            gap: 10px;
            margin-bottom: 45px;
        }

        .gallery-item {
            overflow: hidden;
            border-radius: 16px;
            background: #ddd;
        }

        .gallery-item:first-child {
            grid-row: span 2;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.03);
        }

        /* =========================
           CONTENT
        ========================= */

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 45px;
        }

        .story {
            font-family: Georgia, serif;
            font-size: 19px;
            line-height: 1.9;
            white-space: pre-line;
            color: #3f463f;
        }

        /* =========================
           SIDE CARD
        ========================= */

        .side-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 22px;
            height: fit-content;
        }

        .side-title {
            color: var(--green);
            font-weight: 700;
            margin-bottom: 12px;
        }

        .destination-link {
            color: var(--green);
            font-weight: 700;
            text-decoration: none;
            font-size: 17px;
        }

        .destination-link:hover {
            color: var(--terracotta);
        }

        .destination-location {
            color: #777;
            font-size: 13px;
            margin-top: 7px;
            line-height: 1.6;
        }

        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success {
            background: #e7eee5;
            color: var(--green);
            border-radius: 12px;
            padding: 13px 16px;
            margin-bottom: 25px;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 45px;
            padding-top: 25px;
            border-top: 1px solid var(--border);
        }

        .btn-back {
            display: inline-block;
            color: var(--green);
            border: 1px solid var(--border);
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-back:hover {
            background: var(--card);
            color: var(--terracotta);
        }

        .btn-delete {
            border: 1px solid #dfc5bc;
            background: #fff6f3;
            color: #9b503b;
            padding: 10px 17px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-delete:hover {
            background: #f9e5df;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .gallery {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 240px 160px;
            }

            .gallery-item:first-child {
                grid-column: span 2;
                grid-row: auto;
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

        }

        @media (max-width: 550px) {

            .page {
                padding: 30px 15px 60px;
            }

            .post-header {
                margin: 28px 0;
            }

            h1 {
                font-size: 38px;
            }

            .gallery {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(3, 230px);
            }

            .gallery-item:first-child {
                grid-column: auto;
            }

            .story {
                font-size: 17px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-back,
            .btn-delete {
                width: 100%;
                text-align: center;
            }

        }

    </style>

    <style>
        </style>
</head>


<body>

@include('partials.navbar')


<div class="page">

    {{-- BACK --}}

    <a
        href="{{ route('travel-posts.index') }}"
        class="back"
    >
        ← Travel Experiences
    </a>


    {{-- SUCCESS MESSAGE --}}

    @if (session('success'))

        <div class="success mt-4">
            {{ session('success') }}
        </div>

    @endif


    {{-- HEADER --}}

    <div class="post-header">

        <div class="eyebrow">
            Travel Experience
        </div>


        <h1>
            {{ $post->title }}
        </h1>


        <div class="meta">

            Shared by

            <strong>
                {{ $post->user?->name ?? 'Somewhere in...' }}
            </strong>

            ·

            {{ $post->created_at->format('d M Y') }}

        </div>


        {{-- RATING --}}

        <div class="rating">

            @for ($i = 1; $i <= 5; $i++)

                @if ($i <= ($post->rating ?? 5))

                    ★

                @else

                    ☆

                @endif

            @endfor


            <span class="rating-number">
                {{ $post->rating ?? 5 }}/5
            </span>

        </div>

    </div>


    {{-- =========================
         GALLERY
    ========================= --}}

    @if ($post->images && $post->images->count())

        <div class="gallery">

            @foreach ($post->images as $image)

                <div class="gallery-item">

                    <img
                        src="{{ asset('storage/' . $image->image) }}"
                        alt="{{ $image->caption ?? $post->title }}"
                    >

                </div>

            @endforeach

        </div>

    @endif


    {{-- =========================
         CONTENT
    ========================= --}}

    <div class="content-grid">


        {{-- STORY --}}

        <article>

            <div class="eyebrow">
                The Story
            </div>


            <div class="story">
                {{ $post->content }}
            </div>

        </article>


        {{-- DESTINATION --}}

        <aside>

            @if ($post->destination)

                <div class="side-card">

                    <div class="side-title">
                        Destination
                    </div>


                    <a
                        href="{{ route(
                            'destinations.show',
                            $post->destination->slug
                        ) }}"
                        class="destination-link"
                    >

                        {{ $post->destination->name }}

                    </a>


                    <div class="destination-location">

                        @if ($post->destination->regency)

                            {{ $post->destination->regency->name }}

                        @endif


                        @if ($post->destination->regency?->province)

                            ,

                            {{ $post->destination->regency->province->name }}

                        @endif

                    </div>

                </div>

            @endif

        </aside>

    </div>


    {{-- =========================
         ACTIONS
    ========================= --}}

    <div class="actions">


        <a
            href="{{ route('travel-posts.index') }}"
            class="btn-back"
        >
            ← All Travel Experiences
        </a>


        @auth

            @if ($post->user_id === auth()->id())

                <form
                    action="{{ route(
                        'travel-posts.destroy',
                        $post->id
                    ) }}"
                    method="POST"
                    onsubmit="return confirm(
                        'Are you sure you want to delete this experience?'
                    )"
                >

                    @csrf

                    @method('DELETE')


                    <button
                        type="submit"
                        class="btn-delete"
                    >
                        Delete Experience
                    </button>

                </form>

            @endif

        @endauth

    </div>


</div>



@include('partials.footer')

</body>

</html>
