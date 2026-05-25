{{-- Couple Section --}}
<section class="toile-bg py-20 px-4 min-h-screen flex items-center">
    <div class="max-w-4xl mx-auto text-center">
        {{-- Bismillah --}}
        <div data-animate="fade-down" class="mb-12">
            <p class="font-label text-2xl tracking-[0.3em] text-primary mb-4">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيْم</p>
            <div class="gold-divider max-w-xs mx-auto">
                <span class="text-secondary">✦</span>
            </div>
        </div>

        {{-- Ayat --}}
        <div data-animate="fade-up" class="mb-16 max-w-2xl mx-auto">
            <p class="font-cormorant italic text-base md:text-lg text-text-dark leading-relaxed">
                "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan-pasangan dari jenismu sendiri,
                supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya di antaramu rasa kasih dan sayang."
            </p>
            <p class="font-label text-xs tracking-wider text-primary mt-4">— QS. Ar-Rum: 21 —</p>
        </div>

        {{-- Couple Cards --}}
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-animate="fade-right" class="text-center">
                <div class="w-48 h-48 mx-auto mb-6 rounded-full border-4 border-secondary/30 overflow-hidden bg-cream shadow-lg">
                    <img src="{{ asset('images/bride.jpg') }}" alt="Imah"
                         class="w-full h-full object-cover object-top">
                </div>
                <h3 class="font-display text-4xl text-primary mb-2">Imah</h3>
                <p class="font-heading text-base text-text-dark">Muslimahtun Baadiah, S.K.M</p>
                <p class="font-body text-sm text-text-dark/80 mt-2">Putri dari<br>Bapak Muhammad Tahir Body S.Pd
 & Ibu Siti Asmah S.Pd</p>
            </div>

            <div data-animate="fade-left" class="text-center">
                <div class="w-48 h-48 mx-auto mb-6 rounded-full border-4 border-secondary/30 overflow-hidden bg-cream shadow-lg">
                    <img src="{{ asset('images/groom.jpg') }}" alt="Alvin"
                         class="w-full h-full object-cover object-top">
                </div>
                <h3 class="font-display text-4xl text-primary mb-2">Alvin</h3>
                <p class="font-heading text-base text-text-dark">Alvin Febriyand, S.H</p>
                <p class="font-body text-sm text-text-dark/80 mt-2">Putra dari<br>Bapak H.Arsyik (Almarhum) & Ibu Farinah</p>
            </div>
        </div>

        {{-- Monogram --}}
        <div data-animate="zoom-in" class="mt-16">
            <div class="gold-divider max-w-sm mx-auto">
                <span class="font-display text-3xl text-primary">IA</span>
            </div>
        </div>
    </div>
</section>
