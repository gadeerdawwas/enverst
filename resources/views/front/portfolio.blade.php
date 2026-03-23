@extends('front.layout.app')
@section('title', 'اعمالنا')

@section('content')

<!-- HERO -->
<main class="wk-hero" id="top">
    <div class="container wk-hero-container">
        <div class="wk-kicker">أعمالنا</div>
        <h1 class="wk-title">مشاريع نفتخر بها</h1>
        <p class="wk-sub">
            استعرض مجموعة مختارة من أعمالنا في التسويق والتصميم والتطوير — نتائج حقيقية وتجارب مميزة
        </p>

        <!-- Filters -->
        <div class="wk-filters" role="tablist">
            <button class="wk-pill is-active" type="button" data-filter="all">الكل</button>

            @foreach ($services as $service)
                @php
                    $title = trim(Str::replaceFirst('خدمة ', '', $service['title']));
                    $filter = strtolower($title);
                @endphp

                <button class="wk-pill" type="button" data-filter="{{ $filter }}">
                    {{ $title }}
                </button>
            @endforeach
        </div>
    </div>
</main>

<!-- GRID -->
<section class="wk-section">
    <div class="container wk-container">
        <div class="wk-grid">

            @foreach ($works as $work)
                @php
                    $category = strtolower(trim($work->category));
                @endphp

                <article class="wk-card" data-cat="{{ $category }}">
                    <a href="{{ route('portfolio.show', $work->id) }}">

                        <div class="wk-thumb">
                            @if ($work->cover_image)
                                <img src="{{ asset('storage/' . $work->cover_image) }}"
                                     style="width:100%;height:100%;object-fit:cover;">
                            @endif
                            <span class="wk-tag">{{ $work->category }}</span>
                        </div>

                        <div class="wk-body">
                            <div class="wk-meta">{{ $work->category }}</div>
                            <h3 class="wk-h">{{ $work->title }}</h3>

                            <div class="wk-metrics">
                                @foreach (explode(' ', $work->tags) as $tag)
                                    <span class="wk-chip">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        </div>

                    </a>
                </article>
            @endforeach

        </div>
    </div>
</section>

<!-- JS FILTER -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const pills = document.querySelectorAll(".wk-pill");
    const cards = document.querySelectorAll(".wk-card");

    pills.forEach(btn => {
        btn.addEventListener("click", () => {

            // active button
            pills.forEach(p => p.classList.remove("is-active"));
            btn.classList.add("is-active");

            const filter = btn.dataset.filter;

            cards.forEach(card => {
                const cat = card.dataset.cat;

                if (filter === "all" || cat === filter) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });

});
</script>

@endsection
