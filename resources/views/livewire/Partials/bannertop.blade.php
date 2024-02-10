<div class="max-w-7xl mx-auto mt-4 relative">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
        <div x-data="{
            currentIndex: 0,
            slideInterval: null,
            slides: [
                {
                    image: '{{ asset('images/header-bg.jpg') }}',
                    alt: 'Slide 1'
                },
                {
                    image: '{{ asset('images/header-vono.jpg') }}',
                    alt: 'Slide 2'
                },
                {
                    image: '{{ asset('images/header-bg-matias.jpg') }}',
                    alt: 'Slide 3'
                }
            ],
            initCarousel() {
                this.slideInterval = setInterval(() => {
                    this.nextSlide();
                }, 20000);
            },
            nextSlide() {
                this.currentIndex = (this.currentIndex + 1) % this.slides.length;
            },
            prevSlide() {
                this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
            },
            pauseCarousel() {
                clearInterval(this.slideInterval);
            },
            resumeCarousel() {
                this.initCarousel();
            }
            }" x-init="initCarousel()" @mouseenter="pauseCarousel()" @mouseleave="resumeCarousel()">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="currentIndex === index" data-carousel-item class="absolute inset-0">
                        <img :src="slide.image" :alt="slide.alt" class="rounded-lg absolute block w-full h-full object-cover transition-transform duration-3000 ease-in-out" :class="{ 'translate-x-0': currentIndex === index, 'translate-x-full': currentIndex < index, '-translate-x-full': currentIndex > index }">
                    </div>
                </template>
            </div>
            <!-- Slider indicators -->
            <div class="absolute bottom-5 left-0 right-0 flex justify-center z-30">
                <template x-for="(slide, index) in slides" :key="index">
                    <button type="button" :class="{ 'bg-gray-800': currentIndex === index, 'bg-gray-300': currentIndex !== index}" class="w-3 h-3 rounded-full mx-1" aria-current="true" :aria-label="`Slide ${index + 1}`" @click="currentIndex = index"></button>
                </template>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-2 md:px-10 cursor-pointer group focus:outline-none" @click="prevSlide()" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-2 md:px-10 cursor-pointer group focus:outline-none" @click="nextSlide()" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
</div>
