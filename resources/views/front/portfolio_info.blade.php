@extends('front.layout.app')

@section('title', 'اعمالنا')

@section('content')
    <!-- HERO -->
    <main class="wd-hero" id="top">
        <div class="container wd-container">
            <a class="wd-back" href="./works.html">
                <i class="bi bi-arrow-right"></i>
                العودة لجميع الأعمال
            </a>

            <div class="wd-hero-grid">
                <!-- Image -->
                <div class="wd-media">
                    @if ($work->cover_image)
                        <img src="{{ asset('storage/' . $work->cover_image) }}"
                            style="width:100%;height:100%;object-fit:cover;">
                    @endif
                </div>

                <!-- Content -->
                <div class="wd-info">
                    <div class="wd-kicker">{{ $work->category }}</div>
                    <h1 class="wd-title">{{ $work->title }}</h1>
                    <div class="wd-client">{{ $work->client }}</div>
                    <p class="wd-sub">
                        {{ $work->description }}
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- THREE CARDS -->
    <section class="wd-cards">
        <div class="container wd-container">
            <div class="wd-cards-grid">

                <!-- Role -->
                <article class="wd-card">
                    <div class="wd-card-h">
                        <span>الدور</span>
                        <span class="wd-ic"><i class="bi bi-person-badge"></i></span>
                    </div>
                    <div class="wd-card-body">
                        {{ $work->info }}
                    </div>
                </article>

                <!-- Tools -->
                <article class="wd-card">
                    <div class="wd-card-h">
                        <span>الأدوات المستخدمة</span>
                        <span class="wd-ic"><i class="bi bi-tools"></i></span>
                    </div>
                    <div class="wd-card-body">
                        <div class="wd-pills">
                            <div class="wd-pills">
                                @foreach (explode(' ', $work->tags) as $tag)
                                    <span class="wd-pill">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Results -->
                <article class="wd-card">
                    <div class="wd-card-h">
                        <span>النتائج</span>
                        <span class="wd-ic"><i class="bi bi-graph-up"></i></span>
                    </div>
                    <div class="wd-card-body">
                        <ul class="wd-results">
                            <ul class="wd-results">
                                @foreach (preg_split("/\r\n|\n|\r/", $work->results) as $result)
                                    <li><i class="bi bi-check2"></i> {{ trim($result) }}</li>
                                @endforeach
                                {{--  @foreach (explode('\n', $work->results) as $result)
                                    <li><i class="bi bi-check2"></i> {{ trim($result) }}</li>
                                @endforeach  --}}
                            </ul>
                        </ul>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="wd-gallery">
        <div class="container wd-container">
            <h2 class="wd-g-title">معرض الصور</h2>

            <div class="wd-g-grid">
                @foreach ($work->images as $image)
                    <div class="wd-shot">
                        <img src="{{ asset('storage/' . $image->image_path) }}" style="width:100%">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->

@endsection
