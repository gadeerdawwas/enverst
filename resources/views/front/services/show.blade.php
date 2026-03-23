@extends('front.layout.app')
@section('title', $service['title'])

@section('content')
    <!-- HERO -->
    <main class="sd-hero" id="top">
        <div class="container sd-hero-container">
            <a href="{{ url('/services') }}" class="sd-breadcrumb">{{ $service['back_text'] ?? '← العودة لجميع الخدمات' }}</a>

            <div class="sd-head">
                <div>
                    <h1 class="sd-title">{{ $service['title'] }}</h1>
                    <p class="sd-sub">{{ $service['subtitle'] }}</p>
                </div>

                <div class="sd-icon" aria-hidden="true">
                    <i class="bi {{ $service['icon'] }}"></i>
                </div>
            </div>
        </div>
    </main>

    <!-- TWO BOXES -->
    <section class="sd-two">
        <div class="container sd-container">
            <div class="sd-two-grid">

                <!-- ماذا نقدم -->
                <article class="sd-box">
                    <div class="sd-box-title">ماذا نقدم</div>

                    <ul class="sd-list">
                        @foreach ($service['offer'] as $item)
                            <li><span class="sd-check"><i class="bi bi-check2"></i></span> {{ $item }}</li>
                        @endforeach
                    </ul>
                </article>

                <!-- ما ستحصل عليه -->
                <article class="sd-box">
                    <div class="sd-box-title">ما ستحصل عليه</div>

                    <ol class="sd-ol">
                        @foreach ($service['deliverables'] as $i => $item)
                            <li><span class="sd-num">{{ $i + 1 }}</span> {{ $item }}</li>
                        @endforeach
                    </ol>

                    <div class="sd-time">
                        <span class="sd-time-lbl">المدة المتوقعة:</span>
                        <span class="sd-time-val">{{ $service['duration'] }}</span>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- PRICING -->
    <section class="sd-price" id="pricing">
        <div class="container sd-container text-center">
            <div class="sd-kicker">التسعير والباقات</div>
            <h2 class="sd-h2">اختر الباقة المناسبة لاحتياجاتك</h2>

            <div class="sd-plans">
                @foreach ($service['plans'] as $plan)
                    <article class="sd-plan {{ $plan['featured'] ? 'sd-plan--featured' : '' }}">
                        @if ($plan['featured'])
                            <div class="sd-badge">الأكثر طلبًا</div>
                        @endif

                        <div class="sd-plan-top">
                            <div class="sd-plan-name">{{ $plan['name'] }}</div>
                            <div class="sd-plan-sub">{{ $plan['sub'] }}</div>
                        </div>

                        <div class="sd-plan-price">
                            @if (isset($plan['price_display']))
                                <span class="sd-price-val">{{ $plan['price_display'] }}</span>
                            @else
                                <span class="sd-price-cur">{{ $plan['currency'] ?? '$' }}</span>
                                <span class="sd-price-val">{{ number_format($plan['price'] ?? 0) }}</span>
                            @endif
                        </div>

                        <ul class="sd-plan-list">
                            @foreach ($plan['features'] as $f)
                                <li><i class="bi bi-check2"></i> {{ $f }}</li>
                            @endforeach
                        </ul>

                        <a class="sd-plan-btn {{ $plan['featured'] ? 'sd-plan-btn--gold' : '' }}"
                            href="{{ url('/contact') }}">
                            اطلب الآن
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ -->
    {{--  <section class="sd-faq" id="faq">
    <div class="container sd-container">
      <div class="sd-kicker text-center">الأسئلة الشائعة</div>
      <h2 class="sd-h2 text-center">لديك استفسار؟</h2>

      <div class="accordion sd-acc" id="sdFaq">
        @foreach ($service['faq'] as $idx => $qa)
          <div class="accordion-item sd-item">
            <h2 class="accordion-header">
              <button class="accordion-button {{ $idx ? 'collapsed' : '' }} sd-btn" type="button"
                data-bs-toggle="collapse" data-bs-target="#q{{ $idx+1 }}">
                {{ $qa['q'] }}
              </button>
            </h2>

            <div id="q{{ $idx+1 }}" class="accordion-collapse collapse {{ $idx ? '' : 'show' }}"
              data-bs-parent="#sdFaq">
              <div class="accordion-body sd-body">
                {{ $qa['a'] }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>  --}}

    <!-- CTA -->
    <section class="sd-cta">
        <div class="container sd-container">
            <div class="sd-cta-box">
                <h2 class="sd-cta-title">مستعد للبدء؟</h2>
                <p class="sd-cta-sub">تواصل معنا الآن للحصول على استشارة مجانية ومعرفة كيف يمكننا مساعدتك</p>

                <div class="sd-cta-actions">
                    <a class="btn btn-cta btn-lg" href="{{ url('/contact') }}">
                        احجز استشارة مجانية
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <a class="btn btn-outline-gold btn-lg" href="{{ url('/contact') }}">
                        ارسل رسالة
                        <i class="bi bi-chat-dots"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
