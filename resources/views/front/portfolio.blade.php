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
            <div class="wk-filters" role="tablist" aria-label="تصنيفات الأعمال">
                <button class="wk-pill is-active" type="button" data-filter="all">الكل</button>
                <button class="wk-pill" type="button" data-filter="design">التصميم</button>
                <button class="wk-pill" type="button" data-filter="dev">التطوير</button>
                <button class="wk-pill" type="button" data-filter="ads">الإعلانات</button>
                <button class="wk-pill" type="button" data-filter="brand">الهوية</button>
            </div>
        </div>
    </main>

    <!-- GRID -->
    <section class="wk-section">
        <div class="container wk-container">
            <div class="wk-grid">
                @foreach ($works as $work)


                    <article class="wk-card" data-cat="ads">
                        <a href="{{ route('portfolio.show', $work->id) }}" class="wk-card" data-cat="{{ $work->category }}">

                            <div class="wk-thumb">
                                @if ($work->cover_image)
                                    <img src="{{ asset('storage/' . $work->cover_image) }}"
                                        style="width:100%;height:100%;object-fit:cover;">
                                @endif
                                <span class="wk-tag">{{ $work->category }}</span>
                            </div>
                            <div class="wk-body">
                                <div class="wk-meta">{{ $work->category }} </div>
                                <h3 class="wk-h">{{ $work->title }} </h3>
                                <div class="wk-metrics">

                                    @foreach (explode(' ', $work->tags) as $tag)
                                        <span class="wk-chip"> {{ trim($tag) }} </span>
                                    @endforeach




                            </div>
                            </div>
                             </a>
                    </article>
                @endforeach

            </div>
        </div>
    </section>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Filter JS -->
    <script>
        (function() {
            const pills = Array.from(document.querySelectorAll(".wk-pill"));
            const cards = Array.from(document.querySelectorAll(".wk-card"));

            const setActive = (btn) => {
                pills.forEach(p => p.classList.toggle("is-active", p === btn));
            };

            const apply = (filter) => {
                cards.forEach(card => {
                    const cat = card.dataset.cat;
                    const show = filter === "all" || cat === filter;
                    card.style.display = show ? "" : "none";
                });
            };

            pills.forEach(btn => {
                btn.addEventListener("click", () => {
                    setActive(btn);
                    apply(btn.dataset.filter);
                });
            });
        })();
    </script>
@endsection
