  <footer class="ft-section">
      <div class="container ft-container">
          <div class="ft-grid">

              <div class="ft-col">
                  <div class="ft-brand"> <img src="{{ asset('front/logo1.png') }}" alt="">
                  </div>
                  <p class="ft-desc">
                      نساعد الشركات على النمو من خلال استراتيجيات تسويقية مبتكرة، تصميم مميز وتطوير تطبيقات احترافية.
                  </p>
                  <div class="ft-social">
                      <!-- WhatsApp -->
                      <a class="ft-soc" href="https://wa.me/970594411523" target="_blank" aria-label="WhatsApp">
                          <i class="bi bi-whatsapp"></i>
                      </a>

                      <!-- Facebook -->
                      <a class="ft-soc"
                          href="https://www.facebook.com/people/%D8%A7%D9%81%D8%B1%D8%B3%D8%AA-%D9%84%D9%84%D8%AD%D9%84%D9%88%D9%84-%D8%A7%D9%84%D8%B1%D9%82%D9%85%D9%8A%D8%A9/100093535480748/"
                          target="_blank" aria-label="Facebook">
                          <i class="bi bi-facebook"></i>
                      </a>

                      <!-- Instagram -->
                      <a class="ft-soc" href="https://www.instagram.com/everestcom23/" target="_blank"
                          aria-label="Instagram">
                          <i class="bi bi-instagram"></i>
                      </a>

                      <!-- X (Twitter سابقًا) -->
                      <a class="ft-soc" href="https://x.com/everestcom23" target="_blank" aria-label="X">
                          <i class="bi bi-x"></i>
                      </a>

                      <!-- Snapchat -->
                      <a class="ft-soc" href="https://accounts.snapchat.com/v2/login?continue=%2Faccounts%2Fsnapcodes"
                          target="_blank" aria-label="Snapchat">
                          <i class="bi bi-snapchat"></i>
                      </a>




                      <!-- TikTok -->
                      <a class="ft-soc" href="https://www.tiktok.com/@everestcom2" target="_blank" aria-label="TikTok">
                          <i class="bi bi-tiktok"></i>
                      </a>

                      <!-- LinkedIn -->
                      <a class="ft-soc" href="https://www.linkedin.com/in/everestcompany23" target="_blank"
                          aria-label="LinkedIn">
                          <i class="bi bi-linkedin"></i>
                      </a>

                      {{--  <a class="ft-soc" href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                      <a class="ft-soc" href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                      <a class="ft-soc" href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>  --}}
                  </div>
              </div>
              @php
                  $services = config('services_catalog');
              @endphp
              <div class="ft-col">
                  <div class="ft-h">خدماتنا</div>

                  @foreach ($services as $slug => $service)
                      <a class="ft-a" href="{{ route('services.show', $slug) }}">
                          {{ Str::replaceFirst('خدمة ', '', $service['title']) }}
                      </a>
                  @endforeach




              </div>

              <div class="ft-col">
                  <div class="ft-h">الشركة</div>
                  <a class="ft-a" href="{{ route('about') }}">من نحن</a>
                  <a class="ft-a" href="{{ route('portfolio') }}">أعمالنا</a>
                  <a class="ft-a" href="{{ route('services') }}">خدماتنا</a>
                  <a class="ft-a" href="{{ route('contact') }}">تواصل معنا</a>
              </div>

              {{--  <div class="ft-col">
                  <div class="ft-h">تواصل معنا</div>
                  <div class="cn-mini-h">واتساب</div>



                  <div class="ft-info">
                      <i class="bi bi-whatsapp"></i>
                      <a href="https://wa.me/970594411523" target="_blank">+970 594 411 523</a>
                  </div>

                  <div class="ft-info">
                      <i class="bi bi-facebook"></i>
                      <a href="https://www.facebook.com/people/%D8%A7%D9%81%D8%B1%D8%B3%D8%AA-%D9%84%D9%84%D8%AD%D9%84%D9%88%D9%84-%D8%A7%D9%84%D8%B1%D9%82%D9%85%D9%8A%D8%A9/100093535480748/"
                          target="_blank">
                          Everest للحلول الرقمية
                      </a>
                  </div>

                  <div class="ft-info">
                      <i class="bi bi-instagram"></i>
                      <a href="https://www.instagram.com/everestcom23/" target="_blank">@everestcom23</a>
                  </div>

                  <div class="ft-info">
                      <i class="bi bi-x"></i>
                      <a href="https://x.com/everestcom23" target="_blank">@everestcom23</a>
                  </div>
              </div>  --}}

          </div>

          <div class="ft-bottom">
              <div class="ft-links">
                  <a href="#">سياسة الخصوصية</a>
                  <a href="#">الشروط والأحكام</a>
              </div>
              <div class="ft-copy">© 2026 Everest جميع الحقوق محفوظة</div>
          </div>
      </div>
  </footer>

  <!-- WhatsApp Floating Button -->
  <a class="wa-fab" href="https://wa.me/970594411523" target="_blank" rel="noopener" aria-label="WhatsApp">
      <i class="bi bi-whatsapp"></i>
  </a>



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('front/app.js') }}"></script>


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
