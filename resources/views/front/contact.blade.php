@extends('front.layout.app')

@section('title', 'تواصل معنا ')


@section('content')
    <!-- HERO -->
    <main class="cn-hero" id="top">
        <div class="container cn-hero-container">
            <div class="cn-kicker">تواصل معنا</div>
            <h1 class="cn-title">نحب نسمع منك</h1>
            <p class="cn-sub">
                أخبرنا عن مشروعك أو استفسارك وسنرد عليك في أقرب وقت
            </p>
        </div>
    </main>

    <!-- CONTENT -->
    <section class="cn-section">
        <div class="container cn-container">
            <div class="cn-grid">

                <!-- FORM (يسار مثل التصميم) -->
                <div class="cn-card cn-card--form">
                    <h2 class="cn-card-title">أرسل لنا رسالة</h2>
                    <p class="cn-card-sub">املأ النموذج وسنتواصل معك في أقرب وقت</p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="cn-form" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="cn-label" for="name">الاسم <span class="cn-req">*</span></label>
                                <input class="form-control cn-input" id="name" name="name" type="text"
                                    placeholder="الاسم الكامل" required>
                            </div>

                            <div class="col-md-6">
                                <label class="cn-label" for="phone">رقم الهاتف <span class="cn-req">*</span></label>
                                <input class="form-control cn-input" id="phone" name="phone" type="tel"
                                    placeholder="05xxxxxxxx" required>
                            </div>

                            <div class="col-12">
                                <label class="cn-label" for="email">البريد الإلكتروني <span
                                        class="cn-req">*</span></label>
                                <div class="cn-input-with">
                                    <input class="form-control cn-input" id="email" name="email" type="email"
                                        placeholder="example@email.com" required>
                                    <span class="cn-input-ic" aria-hidden="true"><i class="bi bi-envelope"></i></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="cn-label" for="service">الخدمة المطلوبة</label>
                                <select class="form-select form-control cn-input" id="service" name="service">
                                    <option class="form-select form-control" value="" selected>اختر الخدمة</option>
                                    <option>الإعلانات المدفوعة</option>
                                    <option>استراتيجية التسويق</option>
                                    <option>تصميم UI/UX والهوية</option>
                                    <option>تطوير المواقع والتطبيقات</option>
                                </select>
                            </div>


                            <div class="col-12">
                                <label class="cn-label" for="msg">رسالتك <span class="cn-req">*</span></label>
                                <textarea class="form-control cn-input cn-textarea" id="msg" name="message" rows="5"
                                    placeholder="أخبرنا المزيد عن مشروعك أو استفسارك..." required></textarea>
                            </div>

                            <div class="col-12">
                                <button class="cn-submit" type="submit">
                                    إرسال الرسالة <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                </div>

                <!-- RIGHT SIDE -->
                <aside class="cn-side">

                    <div class="cn-side-block">
                        <div class="cn-side-title">تواصل سريع</div>

                        <a class="cn-mini-card" href="https://wa.me/970594411523" target="_blank" aria-label="WhatsApp">
                            <div class="cn-mini-ic"><i class="bi bi-whatsapp"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">واتساب</div>
                                <div class="cn-mini-p">+970 594 411 523</div>
                            </div>
                        </a>

                        <!-- Facebook -->
                        <a class="cn-mini-card"
                            href="https://www.facebook.com/people/%D8%A7%D9%81%D8%B1%D8%B3%D8%AA-%D9%84%D9%84%D8%AD%D9%84%D9%88%D9%84-%D8%A7%D9%84%D8%B1%D9%82%D9%85%D9%8A%D8%A9/100093535480748/"
                            target="_blank" aria-label="Facebook">
                            <div class="cn-mini-ic"><i class="bi bi-facebook"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">فيسبوك</div>
                                <div class="cn-mini-p">Everest للحلول الرقمية</div>
                            </div>
                        </a>

                        <!-- Instagram -->
                        <a class="cn-mini-card" href="https://www.instagram.com/everestcom23/" target="_blank"
                            aria-label="Instagram">
                            <div class="cn-mini-ic"><i class="bi bi-instagram"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">إنستغرام</div>
                                <div class="cn-mini-p">@everestcom23</div>
                            </div>
                        </a>

                        <!-- X (Twitter سابقًا) -->
                        <a class="cn-mini-card" href="https://x.com/everestcom23" target="_blank" aria-label="X">
                            <div class="cn-mini-ic"><i class="bi bi-x"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">X</div>
                                <div class="cn-mini-p">@everestcom23</div>
                            </div>
                        </a>

                        <!-- Snapchat -->
                        <a class="cn-mini-card"
                            href="https://accounts.snapchat.com/v2/login?continue=%2Faccounts%2Fsnapcodes" target="_blank"
                            aria-label="Snapchat">
                            <div class="cn-mini-ic"><i class="bi bi-snapchat"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">سناب شات</div>
                                <div class="cn-mini-p">@everestcom23</div>
                            </div>
                        </a>

                        <!-- Behance -->
                        <a class="cn-mini-card" href="https://www.behance.net/everestcompany23" target="_blank"
                            aria-label="Behance">
                            <div class="cn-mini-ic"><i class="bi bi-behance"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">Behance</div>
                                <div class="cn-mini-p">everestcompany23</div>
                            </div>
                        </a>

                        <!-- YouTube -->
                        <a class="cn-mini-card" href="https://www.youtube.com/channel/UCzAyvakC_amiUcdaA-xfacA"
                            target="_blank" aria-label="YouTube">
                            <div class="cn-mini-ic"><i class="bi bi-youtube"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">يوتيوب</div>
                                <div class="cn-mini-p">Everest Channel</div>
                            </div>
                        </a>

                        <!-- TikTok -->
                        <a class="cn-mini-card" href="https://www.tiktok.com/@everestcom2" target="_blank"
                            aria-label="TikTok">
                            <div class="cn-mini-ic"><i class="bi bi-tiktok"></i></div>
                            <div class="cn-mini-txt">
                                <div class="cn-mini-h">تيك توك</div>
                                <div class="cn-mini-p">@everestcom2</div>
                            </div>
                        </a>





                    </div>

                    {{--  <div class="cn-side-block">
            <div class="cn-side-title">موقعنا</div>

            <div class="cn-mini-card cn-mini-card--static">
              <div class="cn-mini-ic"><i class="bi bi-geo-alt"></i></div>
              <div class="cn-mini-txt">
                <div class="cn-mini-h">المقر الرئيسي</div>
                <div class="cn-mini-p">الرياض - المملكة العربية السعودية</div>
              </div>
            </div>

            <!-- Map placeholder -->
            <div class="cn-map">
              <div class="cn-map-label">خريطة</div>
            </div>
          </div>  --}}

                </aside>

            </div>
        </div>
    </section>
@endsection
