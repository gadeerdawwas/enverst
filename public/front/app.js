(() => {
    const root = document.querySelector("[data-ts]");
    if (!root) return;

    const slides = Array.from(root.querySelectorAll(".ts-slide"));
    const dotsWrap = document.querySelector("[data-ts-dots]");
    const dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll(".ts-dot")) : [];
    const btnPrev = document.querySelector("[data-ts-prev]");
    const btnNext = document.querySelector("[data-ts-next]");

    let i = 0;
    let timer = null;

    const setActive = (index) => {
        i = (index + slides.length) % slides.length;
        slides.forEach((s, idx) => s.classList.toggle("is-active", idx === i));
        dots.forEach((d, idx) => d.classList.toggle("is-active", idx === i));
    };

    const next = () => setActive(i + 1);
    const prev = () => setActive(i - 1);

    btnNext ? .addEventListener("click", () => {
        next();
        restart();
    });
    btnPrev ? .addEventListener("click", () => {
        prev();
        restart();
    });

    dots.forEach((d, idx) => {
        d.addEventListener("click", () => {
            setActive(idx);
            restart();
        });
    });

    const start = () => { timer = setInterval(next, 4500); };
    const stop = () => {
        if (timer) clearInterval(timer);
        timer = null;
    };
    const restart = () => {
        stop();
        start();
    };

    root.addEventListener("mouseenter", stop);
    root.addEventListener("mouseleave", start);

    setActive(0);
    start();
})();
