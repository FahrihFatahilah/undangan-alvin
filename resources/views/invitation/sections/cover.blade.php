{{-- Cover Section --}}
<div class="min-h-screen flex items-center justify-center bg-primary relative overflow-hidden">
    {{-- Corner ornaments --}}
    <div class="absolute top-6 left-6 w-20 h-20 border-l-2 border-t-2 border-secondary/30"></div>
    <div class="absolute top-6 right-6 w-20 h-20 border-r-2 border-t-2 border-secondary/30"></div>
    <div class="absolute bottom-6 left-6 w-20 h-20 border-l-2 border-b-2 border-secondary/30"></div>
    <div class="absolute bottom-6 right-6 w-20 h-20 border-r-2 border-b-2 border-secondary/30"></div>

    <div class="text-center px-6 relative z-10">
        {{-- Envelope --}}
        <div id="envelope-wrap" class="mx-auto mb-10 relative" style="width:200px; height:130px;">
            {{-- Surat di dalam --}}
            <div id="envelope-letter" class="letter">
                <span class="font-display text-3xl text-primary">IA</span>
                <p class="font-label text-[8px] tracking-widest text-primary/50 mt-1">31 · 05 · 2026</p>
            </div>

            {{-- Body amplop (kotak penuh) --}}
            <div class="env-body"></div>

            {{-- V-fold depan --}}
            <div class="env-fold"></div>

            {{-- Flap atas --}}
            <div id="envelope-lid" class="env-lid"></div>
        </div>

        {{-- Text --}}
        <div id="cover-text">
            <p class="font-label text-sm tracking-[0.3em] text-secondary font-semibold mb-4">THE WEDDING OF</p>

            <h1 class="font-display text-5xl md:text-6xl text-gold-shimmer leading-tight">Imah</h1>
            <p class="font-heading text-secondary text-2xl my-1">&</p>
            <h1 class="font-display text-5xl md:text-6xl text-gold-shimmer leading-tight mb-5">Alvin</h1>

            <div class="gold-divider max-w-[140px] mx-auto mb-5">
                <span class="text-secondary text-xs">✦</span>
            </div>

            <p class="font-label text-small tracking-[0.3em] text-secondary font-bold mb-8">31 . 05 . 2026</p>

            <p class="font-body text-text-light/70 text-sm mb-1">Kepada Yth,</p>
            <p class="font-heading text-lg text-text-light mb-8">{{ $guestName }}</p>

            <button @click="open()"
                    class="px-8 py-3 border-2 border-secondary text-secondary font-label text-xs tracking-widest
                           hover:bg-secondary hover:text-primary transition-all duration-300
                           relative overflow-hidden group">
                <span class="relative z-10">BUKA UNDANGAN</span>
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-secondary/20 to-transparent
                            -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            </button>
        </div>
    </div>
</div>

<style>
    /* Body amplop - kotak penuh */
    .env-body {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #8B6914;
        border-radius: 4px;
        border: 1px solid #A67C00;
        z-index: 1;
    }

    /* V-fold depan amplop */
    .env-fold {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #9B7518;
        clip-path: polygon(0 0, 50% 50%, 100% 0, 100% 100%, 0 100%);
        border-radius: 4px;
        z-index: 3;
    }

    /* Flap/tutup atas */
    .env-lid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 65px;
        background: #6B5510;
        clip-path: polygon(0 0, 100% 0, 50% 100%);
        z-index: 4;
        transform-origin: top center;
        transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* Surat */
    .letter {
        position: absolute;
        top: 15px;
        left: 18px;
        right: 18px;
        bottom: 15px;
        background: #FDF8F0;
        border-radius: 3px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* === ANIMASI === */
    #cover-text {
        transition: opacity 0.4s ease, transform 0.4s ease;
    }
    #cover-text.fade-out {
        opacity: 0;
        transform: translateY(10px);
    }

    .env-lid.lid-open {
        transform: rotateX(-180deg);
    }

    .letter.letter-rise {
        transform: translateY(-100px);
        z-index: 6;
    }

    #envelope-wrap.env-hide .env-body,
    #envelope-wrap.env-hide .env-fold,
    #envelope-wrap.env-hide .env-lid {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .letter.letter-expand {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        border-radius: 0 !important;
        transform: none !important;
        z-index: 200 !important;
        transition: all 0.9s cubic-bezier(0.22, 1, 0.36, 1) !important;
    }
</style>
