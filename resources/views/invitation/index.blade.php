@extends('layouts.app')

@section('content')
<div x-data="invitation()">
    {{-- Cover --}}
    <div x-show="!opened" class="fixed inset-0 z-50">
        @include('invitation.sections.cover', ['guestName' => $guestName])
    </div>

    {{-- Main Content --}}
    <div x-show="opened" x-cloak style="display:none;">
        <div id="petals" class="fixed inset-0 pointer-events-none z-10 overflow-hidden"></div>

        @include('invitation.sections.music')
        @include('invitation.sections.couple')
        @include('invitation.sections.event')
        @include('invitation.sections.gallery')
        @include('invitation.sections.rsvp', ['comments' => $comments])
        @include('invitation.sections.footer')
    </div>
</div>
@endsection

@section('scripts')
<script>
    function invitation() {
        return {
            opened: false,

            open() {
                const text = document.getElementById('cover-text');
                const lid = document.getElementById('envelope-lid');
                const letter = document.getElementById('envelope-letter');
                const wrap = document.getElementById('envelope-wrap');

                // Step 1: Fade out text
                text.classList.add('fade-out');

                // Step 2: Flap terbuka (400ms)
                setTimeout(() => {
                    lid.classList.add('lid-open');
                }, 400);

                // Step 3: Surat naik (900ms)
                setTimeout(() => {
                    letter.classList.add('letter-rise');
                }, 900);

                // Step 4: Amplop hilang (1300ms)
                setTimeout(() => {
                    wrap.classList.add('env-hide');
                }, 1300);

                // Step 5: Surat expand fullscreen (1500ms)
                setTimeout(() => {
                    letter.classList.remove('letter-rise');
                    letter.classList.add('letter-expand');
                }, 1500);

                // Step 6: Switch ke konten (2500ms)
                setTimeout(() => {
                    this.opened = true;
                    this.$nextTick(() => {
                        this.createPetals();
                        setTimeout(() => this.initScrollAnimations(), 100);
                        GLightbox({ selector: '.glightbox' });

                        const audio = document.getElementById('bg-music');
                        if (audio) {
                            audio.play().catch(() => {});
                            localStorage.setItem('musicPlaying', 'true');
                        }
                    });
                }, 2500);
            },

            initScrollAnimations() {
                const elements = document.querySelectorAll('[data-animate]');
                if (!elements.length) return;
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                elements.forEach(el => observer.observe(el));
            },

            createPetals() {
                const container = document.getElementById('petals');
                if (!container) return;
                for (let i = 0; i < 15; i++) {
                    const petal = document.createElement('div');
                    petal.className = 'petal';
                    petal.style.left = Math.random() * 100 + '%';
                    petal.style.animationDuration = (Math.random() * 5 + 7) + 's';
                    petal.style.animationDelay = (Math.random() * 6) + 's';
                    container.appendChild(petal);
                }
            }
        }
    }
</script>
@endsection
