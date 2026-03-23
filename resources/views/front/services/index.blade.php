@extends('front.layout.app')
@section('title', 'خدماتنا')

@section('content')
<!-- HERO -->
<section class="sr-hero">
  <div class="container sr-hero-container">
    <div class="sr-kicker">خدماتنا</div>
    <h1 class="sr-title">
      حلول رقمية متكاملة<br>
      <span class="sr-gold">لنمو أعمالك</span>
    </h1>
    <p class="sr-sub">
      من الاستراتيجية إلى التنفيذ — نقدم لك كل ما تحتاجه لبناء حضور رقمي قوي ومؤثر
    </p>
  </div>
</section>

<!-- SERVICES BLOCKS -->
<section class="sr-section">
  <div class="container sr-container">

    @php
      // كل الخدمات من الملف
      $services = config('services_catalog');

      // ترتيب العرض (اختياري) — غيّر الترتيب كما تريد
      $order = [
        'social-media-design',
        'visual-identity',
        'digital-marketing-seo',
        'motion-graphics',
        'isd-solutions',
        'ux-ui-design',
        'laravel-company-website',
        'web-development',
      ];

      // نعيد ترتيب الخدمات حسب $order (والباقي آخر شيء)
      $sorted = [];
      foreach ($order as $slug) {
        if (isset($services[$slug])) $sorted[$slug] = $services[$slug];
      }
      foreach ($services as $slug => $srv) {
        if (!isset($sorted[$slug])) $sorted[$slug] = $srv;
      }

      // دالة: نجيب 3 أسعار (البداية/النمو/الاحتراف)
      $getPlan = function($srv, $name){
        foreach(($srv['plans'] ?? []) as $p){
          if(($p['name'] ?? '') === $name) return $p;
        }
        return null;
      };

      // دالة: نجيب 4 نقاط للكرت (من card_points أو من features بباقة النمو)
      $getCardBullets = function($srv){
        if (!empty($srv['card_points']) && is_array($srv['card_points'])) {
          return array_slice($srv['card_points'], 0, 4);
        }

        // fallback: خذ من باقة "النمو"
        $growth = null;
        foreach(($srv['plans'] ?? []) as $p){
          if(($p['name'] ?? '') === 'النمو'){ $growth = $p; break; }
        }
        $feats = $growth['features'] ?? [];
        return array_slice($feats, 0, 4);
      };
    @endphp

    @foreach($sorted as $slug => $srv)
      @php
        $title = $srv['title'] ?? '';
        $desc  = $srv['subtitle'] ?? '';
        $icon  = $srv['icon'] ?? 'bi-stars';

        $starter = $getPlan($srv, 'البداية');
        $growth  = $getPlan($srv, 'النمو');
        $pro     = $getPlan($srv, 'الاحتراف');

        $bullets = $getCardBullets($srv);

        // سعر العرض (يدعم price_display لو موجود مثل UX/UI)
        $priceText = function($plan){
          if (!$plan) return '—';
          if (isset($plan['price_display'])) return $plan['price_display'];
          $cur = $plan['currency'] ?? '$';
          $val = $plan['price'] ?? null;
          if ($val === null) return '—';
          return number_format($val) . $cur;
        };
      @endphp

      <article class="sr-service">
        <div class="sr-head">
          <h2>{{ $title }}</h2>
          <i class="bi {{ $icon }}"></i>
        </div>

        <p class="sr-desc">{{ $desc }}</p>

        @if(!empty($bullets))
          <ul class="sr-list">
            @foreach($bullets as $b)
              <li>{{ $b }}</li>
            @endforeach
          </ul>
        @endif

        <div class="sr-pricing">
          <div class="sr-price-card">
            <span>البداية</span>
            <strong>{{ $priceText($starter) }}</strong>
          </div>

          <div class="sr-price-card is-featured">
            <span>النمو</span>
            <strong>{{ $priceText($growth) }}</strong>
          </div>

          <div class="sr-price-card">
            <span>الاحتراف</span>
            <strong>{{ $priceText($pro) }}</strong>
          </div>
        </div>

        <a href="{{ route('services.show', $slug) }}" class="sr-btn">
          تفاصيل الخدمة والأسعار ←
        </a>
      </article>
    @endforeach

  </div>
</section>

{{--  <!-- CTA -->
<section class="ct-section">
  <div class="container ct-container">
    <div class="ct-box">
      <div class="ct-kicker">استشارة مجانية</div>
      <h2 class="ct-title">جاهز لبدء رحلة النجاح الرقمي؟</h2>
      <p class="ct-sub">تواصل معنا الآن ودعنا نضع خطة تناسب عملك.</p>

      <div class="ct-actions">
        <a class="btn btn-cta btn-lg" href="{{ url('/contact') }}">
          احجز استشارة الآن
        </a>
        <a class="btn btn-outline-gold btn-lg" href="{{ url('/works') }}">
          شاهد أعمالنا
        </a>
      </div>
    </div>
  </div>
</section>  --}}
@endsection
