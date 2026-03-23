@extends('front.layout.app')

@section('title', 'الرئيسية')

@section('content')
    <!-- HERO (Section 1) -->
    <main id="top" class="hero">
        <div class="container hero-container">
            <div class="hero-pill">
                <span class="pill-dot"></span> وكالة رقمية متكاملة
            </div>





            <h1 class="hero-title">
                {{--  <span class="t-white">  نحول حضورك الرقمي
                </span><br>
<span class="t-gold">  إلى تجربة تلهم وتؤثر
     </span>  --}}
                <span class="t-white">نقود أعمالك   </span>
                <br />
                <span class="t-white">نحو</span>
                <span class="t-gold">  القمة الرقمية </span>
            </h1>

            <p class="hero-sub">
                نساعد الشركات الطموحة على النمو من خلال استراتيجيات تسويقية مبتكرة. </p>

            <div class="hero-actions">


                <a class="btn btn-cta btn-lg btn-wide" href="#">

                    احجز استشارة مجانية
                    <i class="bi bi-arrow-left"></i>
                </a>

                <a class="btn btn-outline-gold btn-lg btn-wide" href="{{ route('services') }}">
                    شاهد أعمالنا<i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>
    </main>

    <!-- TRUST ROW (between hero & stats like screenshot) -->


    <!-- STATS BAR (Section 2) -->
    <section class="stats">
        <div class="container">
            <div class="stats-panel">
                <div class="row g-0 text-center">
  <div class="col-6 col-lg-3 stat-item">
                        <div class="stat-val">150+</div>
                        <div class="stat-lbl">عميل سعيد</div>
                    </div>
 <div class="col-6 col-lg-3 stat-item">
                        <div class="stat-val">300+</div>
                        <div class="stat-lbl">مشروع منجز</div>
                    </div>
                    <div class="col-6 col-lg-3 stat-item">
                        <div class="stat-val">95%</div>
                        <div class="stat-lbl">معدل رضا العملاء</div>
                    </div>




                    <div class="col-6 col-lg-3 stat-item">
                        <div class="stat-val"> +40%</div>

                        <div class="stat-lbl">متوسط زيادة في المبيعات لعملائنا
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sv-section" id="services">
        <div class="container sv-container">

            <div class="sv-head">
                <span class="sv-kicker">خدماتنا</span>
                <h1 class="pr-title">حلول متكاملة لنمو أعمالك</h1>
                <p class="sv-sub">
                    نقدم خدمات رقمية شاملة تغطي جميع احتياجاتك من التسويق والتصميم والتطوير
                </p>
            </div>

            @php
                $all = config('services_catalog');

                // ✅ اختر 4 خدمات فقط لعرضهم بهالقسم (رتّبهم مثل ما بدك)
                $wanted = [
                    'digital-marketing-seo',
                    'social-media-design',
                    'visual-identity',
                    'laravel-company-website',
                ];

                // ✅ Tags تظهر على الكروت (اختيارية)
                $tagsMap = [
                    'digital-marketing-seo' => ['SEO', 'Keywords', 'تقارير'],
                    'social-media-design' => ['Posts', 'Stories', 'Reels'],
                    'visual-identity' => ['Logo', 'Branding', 'Print'],
                    'laravel-company-website' => ['Laravel', 'Admin Panel', 'API'],
                ];

                // ✅ أيقونات SVG لكل خدمة (نفس ستايلك)
                $icons = [
                    'digital-marketing-seo' => '
          <svg viewBox="0 0 24 24">
            <path d="M4 16l6-6 4 4 6-6"></path>
            <path d="M15 8h5v5"></path>
          </svg>
        ',
                    'social-media-design' => '
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="7"></circle>
            <circle cx="12" cy="12" r="3"></circle>
          </svg>
        ',
                    'visual-identity' => '
          <svg viewBox="0 0 24 24">
            <path d="M12 3a9 9 0 1 0 0 18c1.3 0 2-1 2-2
              0-1.1-.8-2-2-2h-1.3a2 2 0 0 1 0-4H12
              c3.2 0 5.2-2.1 5.2-4.8C17.2 4.9 14.6 3 12 3Z"></path>
            <circle cx="8" cy="10" r="1"></circle>
            <circle cx="10.5" cy="7.7" r="1"></circle>
            <circle cx="14" cy="7.2" r="1"></circle>
            <circle cx="16.2" cy="9.5" r="1"></circle>
          </svg>
        ',
                    'laravel-company-website' => '
          <svg viewBox="0 0 24 24">
            <path d="M9 18L3 12l6-6"></path>
            <path d="M15 6l6 6-6 6"></path>
          </svg>
        ',
                ];
            @endphp

            <div class="sv-grid">
                @foreach ($wanted as $slug)
                    @php
                        $srv = $all[$slug] ?? null;
                        if (!$srv) {
                            continue;
                        }

                        // ✅ إزالة "خدمة " من العنوان للكرت فقط
                        $title = str_replace('خدمة ', '', $srv['title']);

                        $desc = $srv['subtitle'] ?? '';
                        $tags = $tagsMap[$slug] ?? [];
                        $icon = $icons[$slug] ?? '<svg viewBox="0 0 24 24"><path d="M4 12h16"></path></svg>';
                    @endphp

                    <article class="sv-card">
                        <div class="sv-ic">
                            {!! $icon !!}
                        </div>

                        <div class="sv-con">
                            <h3 class="sv-h">{{ $title }}</h3>

                            <p class="sv-desc">
                                {{ $desc }}
                            </p>

                            @if (!empty($tags))
                                <div class="sv-tags">
                                    @foreach ($tags as $t)
                                        <span class="sv-tag">{{ $t }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <a class="sv-more" href="{{ route('services.show', $slug) }}">
                                اعرف المزيد <span class="sv-more-arrow">←</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>



    <!-- SUCCESS STORIES (قصص النجاح) -->
    <!-- <section class="cs-section" id="cases">
              <div class="container cs-container">

                <div class="cs-head">
                  <div class="cs-kicker">قصص النجاح</div>
                  <div class="cs-row">
                    <h2 class="cs-title">نتائج تتحدث عن نفسها</h2>
                    <a class="cs-btn" href="#">جميع القصص <span class="cs-btn-arrow">←</span></a>
                  </div>
                </div>

                <div class="cs-grid">


                  <article class="cs-card">
                    <div class="cs-badge">تمت خلال 8 أسابيع</div>
                    <h3 class="cs-h">زيادة مبيعات المتجر الإلكتروني 400%</h3>
                    <p class="cs-desc">
                      من خلال تحسين الحملات الإعلانية وتجربة المستخدم، ارتفعت المبيعات وتحسنت نسبة التحويل بشكل كبير.
                    </p>

                    <div class="cs-metrics">
                      <div class="cs-metric">
                        <div class="cs-mv">+400%</div>
                        <div class="cs-ml">المبيعات</div>
                      </div>
                      <div class="cs-metric">
                        <div class="cs-mv">+60%</div>
                        <div class="cs-ml">التحويل</div>
                      </div>
                    </div>
                  </article>


                  <article class="cs-card">
                    <div class="cs-badge">إطلاق خلال 6 أسابيع</div>
                    <h3 class="cs-h">إطلاق تطبيق توصيل ناجح</h3>
                    <p class="cs-desc">
                      تصميم UX قوي + تطوير احترافي + تتبع وتحسين مستمر → نمو سريع في الطلبات.
                    </p>

                    <div class="cs-metrics">
                      <div class="cs-metric">
                        <div class="cs-mv">250K</div>
                        <div class="cs-ml">طلب شهري</div>
                      </div>
                      <div class="cs-metric">
                        <div class="cs-mv">+1.8s</div>
                        <div class="cs-ml">سرعة تجربة</div>
                      </div>
                    </div>
                  </article>


                  <article class="cs-card">
                    <div class="cs-badge">إعادة بناء خلال 4 أسابيع</div>
                    <h3 class="cs-h">إعادة بناء هوية لعلامة تجارية</h3>
                    <p class="cs-desc">
                      هوية بصرية جديدة وتجربة واجهات أحدثت فرقًا في الثقة والانطباع، ورفعت التفاعل.
                    </p>

                    <div class="cs-metrics">
                      <div class="cs-metric">
                        <div class="cs-mv">+180%</div>
                        <div class="cs-ml">التفاعل</div>
                      </div>
                      <div class="cs-metric">
                        <div class="cs-mv">+35%</div>
                        <div class="cs-ml">الولاء</div>
                      </div>
                    </div>
                  </article>

                </div>
              </div>
            </section> -->


    <!-- PROCESS (طريقة عملنا) -->
    <section class="pr-section" id="process">
        <div class="container pr-container">
            <div class="pr-head text-center">
                <div class="pr-kicker">طريقة عملنا</div>
                <h2 class="pr-title">أربع خطوات نحو النجاح</h2>
                <p class="pr-sub">منهجية عمل واضحة تساعدنا نوصل لنتائج قوية وبأقل مخاطرة</p>
            </div>

            <div class="pr-grid">
                <article class="pr-card">
                    <div class="pr-num">01</div>
                    <h3 class="pr-h">اكتشاف</h3>
                    <p class="pr-desc">نفهم أهدافك ومنتجك وسوقك والمنافسين لبناء أساس صحيح.</p>
                </article>

                <article class="pr-card">
                    <div class="pr-num">02</div>
                    <h3 class="pr-h">خطة</h3>
                    <p class="pr-desc">نضع خطة تسويقية/تجربة مستخدم واضحة مع مؤشرات أداء قابلة للقياس.</p>
                </article>

                <article class="pr-card">
                    <div class="pr-num">03</div>
                    <h3 class="pr-h">تنفيذ</h3>
                    <p class="pr-desc">تنفيذ الحملات/التصميم/التطوير بأفضل الممارسات وبجودة عالية.</p>
                </article>

                <article class="pr-card">
                    <div class="pr-num">04</div>
                    <h3 class="pr-h">تحسين</h3>
                    <p class="pr-desc">اختبارات وتحسينات مستمرة للوصول لأفضل نتائج ممكنة.</p>
                </article>
            </div>
        </div>
    </section>


    <!-- TESTIMONIAL (ماذا يقولون عنا) -->
    <section class="ts-section" id="testimonials">
        <div class="container ts-container">
            <div class="ts-kicker text-center">آراء عملائنا</div>
            <h2 class="ts-title text-center">ماذا يقولون عنا</h2>

            <div class="ts-box">
                <div class="ts-quote" aria-hidden="true">”</div>

                <div class="ts-slider" data-ts>
                    <div class="ts-slide is-active">
                        <p class="ts-text">
                            "تواصل واضح وتنفيذ سريع.. النتائج فاقت توقعاتنا، والأهم أنهم يفهمون السوق السعودي بشكل
                            ممتاز."
                        </p>
                        <div class="ts-meta">
                            <div class="ts-name">أحمد العتيبي</div>
                            <div class="ts-role">المدير التنفيذي - متجر إلكتروني</div>
                        </div>
                    </div>

                    <div class="ts-slide">
                        <p class="ts-text">
                            "التجربة كانت احترافية جدًا من البداية للنهاية، خصوصًا في تصميم UX وتحسين الحملات."
                        </p>
                        <div class="ts-meta">
                            <div class="ts-name">سارة القحطاني</div>
                            <div class="ts-role">مديرة التسويق - شركة خدمات</div>
                        </div>
                    </div>

                    <div class="ts-slide">
                        <p class="ts-text">
                            "بصراحة فريق يعتمد عليه.. التقارير واضحة والتحسينات مستمرة، وهذا فرق معنا كثير."
                        </p>
                        <div class="ts-meta">
                            <div class="ts-name">محمد الشمري</div>
                            <div class="ts-role">مؤسس - تطبيق ناشئ</div>
                        </div>
                    </div>
                </div>

                <div class="ts-controls">
                    <button class="ts-nav" type="button" data-ts-prev aria-label="السابق">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="ts-dots" data-ts-dots>
                        <button class="ts-dot is-active" type="button" aria-label="1"></button>
                        <button class="ts-dot" type="button" aria-label="2"></button>
                        <button class="ts-dot" type="button" aria-label="3"></button>
                    </div>

                    <button class="ts-nav" type="button" data-ts-next aria-label="التالي">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ + SIDE TEXT -->
    <section class="fq-section" id="faq">
        <div class="container fq-container">
            <div class="row g-4 align-items-start">

                <!-- Accordion -->
                <div class="col-12 col-lg-7">
                    <div class="accordion fq-acc" id="faqAcc">

                        <div class="accordion-item fq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fq-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#fq1">
                                    كيف أبدأ العمل معكم؟
                                </button>
                            </h2>
                            <div id="fq1" class="accordion-collapse collapse show" data-bs-parent="#faqAcc">
                                <div class="accordion-body fq-body">
                                    ابدأ بحجز استشارة مجانية، نحدد أهدافك ونقترح خطة عمل واضحة مع المدة والتكلفة
                                    والتوقعات.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item fq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fq-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#fq2">
                                    ما هي مدة المشروع النموذجية؟
                                </button>
                            </h2>
                            <div id="fq2" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                                <div class="accordion-body fq-body">
                                    تختلف حسب النوع: الحملات عادة 2-4 أسابيع للتجارب، المواقع من 3-6 أسابيع، والتطبيقات
                                    حسب النطاق.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item fq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fq-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#fq3">
                                    هل تقدمون دعم بعد التسليم؟
                                </button>
                            </h2>
                            <div id="fq3" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                                <div class="accordion-body fq-body">
                                    نعم، لدينا باقات دعم وصيانة وتطوير مستمر، مع تقارير وتحسينات شهرية حسب الاتفاق.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item fq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fq-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#fq4">
                                    ما هي طرق الدفع المتاحة؟
                                </button>
                            </h2>
                            <div id="fq4" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                                <div class="accordion-body fq-body">
                                    تحويل بنكي/فواتير، ويمكن تقسيم الدفعات حسب مراحل المشروع.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item fq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fq-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#fq5">
                                    هل تتعاونون مع شركات خارج السعودية؟
                                </button>
                            </h2>
                            <div id="fq5" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                                <div class="accordion-body fq-body">
                                    نعم، نعمل عن بعد ونغطي أكثر من سوق، مع اجتماعات وتقارير منظمة.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Side text like screenshot -->
                <div class="col-12 col-lg-5">
                    <div class="fq-side">
                        <div class="fq-kicker">الأسئلة الشائعة</div>
                        <h2 class="fq-title">لديك سؤال؟<br />نحن هنا لإجابة</h2>
                        <p class="fq-sub">
                            ارسل لنا سؤالك وسنرد عليك بأسرع وقت، أو احجز استشارة مجانية الآن.
                        </p>

                        <div class="fq-links">
                            <a class="fq-link" href="#contact">تواصل معنا عبر الواتساب <span>←</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
