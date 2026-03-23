@extends('front.layout.app')

@section('title', 'عن الفريق')

@section('content')
    <!-- HERO -->
    <main class="ab-hero" id="top">
        <div class="container ab-hero-container">
            <div class="ab-kicker">من نحن</div>

            <h1 class="ab-title">
                فريق من المبدعين<br>
                <span class="ab-gold">يصنعون الفرق</span>
            </h1>

            <p class="ab-sub">
                نؤمن أن التصميم الجيد والتسويق الذكي يمكنهم تغيير مصير الأعمال… هذا ما نفعله كل يوم.
            </p>
        </div>
    </main>
    <section class="ab-story">
        <div class="container ab-container">
            {{--  <div class="ab-story-grid">  --}}


            <!-- right -->

            <div class="ab-kicker2">من نحن</div>
            <h2 class="ab-h2">بدأنا بحلم صغير… وأصبحنا شريك النجاح</h2>

            <p class="ab-p">

                افرست هي شركة إبداعية في مجال العلامات التجارية والتسويق، حيث تقدم مجموعة واسعة من الخدمات والحلول
                الرقمية المصممة خصيصاً لمساعدة الأفراد والشركات على تحقيق تواجد رقمي صحيح وفعال وذلك من خلال مزيج من
                الخبرة والمعرفة لمساعدة رواد الأعمال على تطبيق استراتيجياتهم في السوق واتخاذ القرارات الصحيحة لتحقيق
                أفضل النتائج.
            </p>
            <p class="ab-p">
                تصمم افرست استراتيجيات تفاعلية لإضفاء طابع إنساني على العلامات التجارية من خلال بناء علاقة مع
                الجمهور المستهدف، وذلك من خلال أبحاث التسويق، وتحليل البيانات، وتطوير الاستراتيجيات، وبناء العلامات
                التجارية.
            </p>
            <p class="ab-p">
                تُمكّن افرست السوق من خلال التواصل البصري الإبداعي والأصلي لجذب احتياجات السوق، بهدف بناء محفظة
                أعمال ناجحة قائمة على دراسات الحالة وتحليل البيانات.
            </p>

        </div>
    </section>
    <!-- Story -->
    <section class="ab-story">
        <div class="container ab-container">
            <div class="ab-story-grid">
                <!-- left (image placeholder) -->
                <div class="ab-media" aria-label="صورة الشركة">
                    {{--  <img src="{{ asset('front/Everest1.png') }}" alt="">  --}}
                    <span class="ab-media-label">صورة الشركة</span>
                </div>

                <!-- right -->
                <div class="ab-story-text">
                    <div class="ab-kicker2">قصتنا</div>

                    <p class="ab-p">

                        نحكي قصتنا في افرست كالتالي: هناك الكثير من الشركات والمشاريع والأفراد لم يستطيعوا مواكبة التطور
                        الرقمي وبناء تواجد رقمي فعال حتى اندثرت سمعتهم وفشلت مشاريعهم لذلك دخلنا السوق من أجل العمل على بناء
                        حلول فعالة للشركات والأفراد الذين ليس لهم براند وجمهور رقمي فعال ومساعدتهم على النمو والتطور بشكل
                        فعال.
                    </p>

                </div>
            </div>
        </div>
    </section>


    <section class="ab-story">
        <div class="container ab-container">


            <div class="ab-kicker2">
                الرؤية
            </div>
            <p class="ab-p">
                نتطلع في افرست لأن نكون الشريك الأمثل للأفراد والشركات الناشئة في رحلتهم الرقمية من أجل بناء عالم رقمي أفضل،
                حيث تتمكن الشركات والأفراد من تحقيق أهدافهم الطموحة والارتقاء بمكانتهم في السوق، معتمدين على حلولنا المبتكرة
                وخبرتنا الواسعة من خلال قيادة التغيير الرقمي نحو مستقبل أكثر ازدهاراً وشمولية للجميع.
            </p>


            <div class="ab-kicker2">
                الرسالة
            </div>
            <p class="ab-p">

                نتطلع في افرست إلى مساعدة المؤسسات والأفراد على مواكبة التطور الرقمي ومساعدتها في نمو وترويج منتجاتها من
                خلال تواجد رقمي صحيح وفعال.
            </p>

        </div>
    </section>

    <!-- Values -->
    <section class="ab-values">
        <div class="container ab-container">
            <div class="ab-values-head">
                <div class="ab-kicker2 text-center">قيمنا</div>
                <h2 class="ab-h2 text-center">ما نؤمن به</h2>
            </div>

            <div class="ab-values-grid">

                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-arrows-move"></i></div>
                    <h4 class="ab-v-h">المرونة الرقمية</h4>
                    <p class="ab-v-p">نتكيّف بسرعة مع التغيّرات الرقمية لنقدّم حلولًا مرنة تناسب احتياجات عملك وتساعدك على
                        التطور.</p>
                </article>

                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-cpu"></i></div>
                    <h4 class="ab-v-h">الذكاء الرقمي</h4>
                    <p class="ab-v-p">نستخدم البيانات والتحليل الذكي لاتخاذ قرارات تسويقية وتقنية تحقق أفضل النتائج.</p>
                </article>

                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-chat-dots"></i></div>
                    <h4 class="ab-v-h">التواصل الفعال</h4>
                    <p class="ab-v-p">نحرص على تواصل واضح ومستمر مع عملائنا لضمان فهم الأهداف وتحقيق أفضل تجربة تعاون.</p>
                </article>






                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-shield-check"></i></div>
                    <h4 class="ab-v-h">بناء الثقة</h4>
                    <p class="ab-v-p">نؤمن أن الثقة أساس النجاح، لذلك نلتزم بالشفافية والاحترافية في كل خطوة من العمل.</p>
                </article>

                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-graph-up-arrow"></i></div>
                    <h4 class="ab-v-h">الطموح العالي</h4>
                    <p class="ab-v-p">نسعى دائمًا لتحقيق نتائج أكبر وتطوير أفكار مبتكرة تدفع أعمال عملائنا للنمو والتميّز.
                    </p>
                </article>

                <article class="ab-v-card">
                    <div class="ab-v-ic"><i class="bi bi-palette"></i></div>
                    <h4 class="ab-v-h">القيادة الإبداعية</h4>
                    <p class="ab-v-p">نقود المشاريع بأفكار إبداعية ورؤية حديثة تصنع فرقًا حقيقيًا في حضور علامتك الرقمية.
                    </p>
                </article>

            </div>

        </div>
    </section>

    <!-- Team -->
    {{--  <section class="ab-team" id="team">
    <div class="container ab-container">
      <div class="ab-team-head">
        <div class="ab-kicker2 text-center">الفريق</div>
        <h2 class="ab-h2 text-center">تعرف على فريقنا</h2>
      </div>

      <div class="ab-team-grid">
        <article class="ab-t-card">
          <div class="ab-avatar">م</div>
          <h4 class="ab-t-name">محمد الأحمد</h4>
          <div class="ab-t-role">المؤسس والمدير الإبداعي</div>
          <p class="ab-t-p">خبرة في التصميم وبناء العلامات، وقيادة مشاريع متعددة.</p>
        </article>

        <article class="ab-t-card">
          <div class="ab-avatar">ن</div>
          <h4 class="ab-t-name">نورة الغزي</h4>
          <div class="ab-t-role">مديرة التسويق</div>
          <p class="ab-t-p">متخصصة في الحملات المدفوعة وتحسين الأداء والتحويل.</p>
        </article>

        <article class="ab-t-card">
          <div class="ab-avatar">ع</div>
          <h4 class="ab-t-name">عبدالله السعيد</h4>
          <div class="ab-t-role">مدير التطوير</div>
          <p class="ab-t-p">يبني حلول ويب سريعة وآمنة مع أفضل الممارسات.</p>
        </article>

        <article class="ab-t-card">
          <div class="ab-avatar">هـ</div>
          <h4 class="ab-t-name">هند الدري</h4>
          <div class="ab-t-role">مصممة UI/UX</div>
          <p class="ab-t-p">تركّز على تجربة مستخدم ممتازة وتصميم واجهات متناسق.</p>
        </article>
      </div>
    </div>
  </section>  --}}

@endsection
