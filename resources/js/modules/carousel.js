export function initMainCarousel() {
    const trackUtama = document.getElementById("carouselTrack");
    const prevBtnUtama = document.getElementById("prevBtn");
    const nextBtnUtama = document.getElementById("nextBtn");

    if (trackUtama && prevBtnUtama && nextBtnUtama) {
        const totalItemsUtama = trackUtama.children.length;
        let currentIndexUtama = 0;

        function updateCarouselUtama(index) {
            trackUtama.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(() => {
            currentIndexUtama = (currentIndexUtama + 1) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        }, 5000);

        prevBtnUtama.addEventListener("click", () => {
            currentIndexUtama = (currentIndexUtama - 1 + totalItemsUtama) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        });

        nextBtnUtama.addEventListener("click", () => {
            currentIndexUtama = (currentIndexUtama + 1) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        });
    }
}

export function initCardCarousels() {
    document.querySelectorAll(".group").forEach((card) => {
        const trackCard = card.querySelector(".carousel-track");
        const prevCardBtn = card.querySelector(".prev-btn");
        const nextCardBtn = card.querySelector(".next-btn");

        if (!trackCard || !prevCardBtn || !nextCardBtn) return;

        const slides = trackCard.querySelectorAll("div.w-full");
        let indexCard = 0;
        const totalCardSlides = slides.length;

        if (totalCardSlides <= 1) {
            prevCardBtn.style.display = 'none';
            nextCardBtn.style.display = 'none';
            return;
        }

        function updateCardCarousel() {
            trackCard.style.transform = `translateX(-${indexCard * 100}%)`;
        }

        setInterval(() => {
            indexCard = (indexCard + 1) % totalCardSlides;
            updateCardCarousel();
        }, 5000);

        prevCardBtn.addEventListener("click", () => {
            indexCard = (indexCard - 1 + totalCardSlides) % totalCardSlides;
            updateCardCarousel();
        });

        nextCardBtn.addEventListener("click", () => {
            indexCard = (indexCard + 1) % totalCardSlides;
            updateCardCarousel();
        });
    });
}
