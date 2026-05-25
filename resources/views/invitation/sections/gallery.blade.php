{{-- Gallery Section --}}
@php
    $photos = [
        asset('images/gallery/thumbs/DSC02602.jpg'),
        asset('images/gallery/thumbs/DSC02613.jpg'),
        asset('images/gallery/thumbs/DSC02655.jpg'),
        asset('images/gallery/thumbs/DSC02679.jpg'),
        asset('images/gallery/thumbs/DSC02711.jpg'),
        asset('images/gallery/thumbs/DSC02714.jpg'),
    ];
@endphp

<section class="cream-bg py-20 px-4">
    <div class="max-w-5xl mx-auto text-center">
        <p data-animate="fade-down" class="font-label text-xs tracking-[0.3em] text-primary mb-3">OUR MOMENTS</p>
        <h2 data-animate="fade-up" class="font-heading text-3xl md:text-4xl text-text-dark mb-4">Gallery</h2>
        <div data-animate="fade-up" class="gold-divider max-w-xs mx-auto mb-12">
            <span class="text-secondary text-sm">✦</span>
        </div>

        {{-- Slideshow --}}
        <div data-animate="zoom-in"
             x-data="{
                current: 0,
                total: {{ count($photos) }},
                autoplay: null,
                init() {
                    this.autoplay = setInterval(() => this.next(), 4000);
                },
                next() {
                    this.current = (this.current + 1) % this.total;
                },
                prev() {
                    this.current = (this.current - 1 + this.total) % this.total;
                },
                goto(i) {
                    this.current = i;
                    clearInterval(this.autoplay);
                    this.autoplay = setInterval(() => this.next(), 4000);
                }
             }"
             class="relative mb-10 max-w-lg mx-auto">

            <div class="relative overflow-hidden rounded-sm aspect-[4/5] bg-cream border border-secondary/20">
                @foreach ($photos as $index => $photo)
                <div x-show="current === {{ $index }}"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute inset-0">
                    <a href="{{ $photo }}"
                       class="glightbox block w-full h-full"
                       data-gallery="wedding">
                        <img data-src="{{ $photo }}"
                             alt="Photo {{ $index + 1 }}"
                             class="w-full h-full object-cover lazy-img"
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='500'%3E%3Crect fill='%23F5EDE0'/%3E%3C/svg%3E">
                    </a>
                </div>
                @endforeach
            </div>

            <button @click="prev(); goto(current)"
                    class="absolute left-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-primary/60 text-text-light flex items-center justify-center hover:bg-primary transition-colors">
                ‹
            </button>
            <button @click="next(); goto(current)"
                    class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-primary/60 text-text-light flex items-center justify-center hover:bg-primary transition-colors">
                ›
            </button>

            <div class="flex justify-center gap-2 mt-4">
                @foreach ($photos as $index => $photo)
                <button @click="goto({{ $index }})"
                        :class="current === {{ $index }} ? 'bg-secondary w-6' : 'bg-secondary/30 w-2'"
                        class="h-2 rounded-full transition-all duration-300"></button>
                @endforeach
            </div>
        </div>

        {{-- Grid thumbnails --}}
        <div data-animate="fade-up" class="grid grid-cols-3 gap-2 max-w-lg mx-auto">
            @foreach ($photos as $index => $photo)
            <a href="{{ $photo }}"
               class="glightbox group relative overflow-hidden rounded-sm aspect-square"
               data-gallery="wedding">
                <img data-src="{{ $photo }}"
                     alt="Photo {{ $index + 1 }}"
                     class="w-full h-full object-cover lazy-img"
                     src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200'%3E%3Crect fill='%23F5EDE0'/%3E%3C/svg%3E">
                <div class="absolute inset-0 bg-primary/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-text-light text-lg">⊕</span>
                </div>
            </a>
            @endforeach
        </div>

        <p class="font-body text-sm text-text-dark/70 mt-6 italic">Prewedding Photos</p>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lazyObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    lazyObserver.unobserve(img);
                }
            });
        }, { rootMargin: '200px' });

        document.querySelectorAll('.lazy-img').forEach(img => {
            lazyObserver.observe(img);
        });
    });
</script>
