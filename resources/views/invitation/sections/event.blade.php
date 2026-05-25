{{-- Event Section --}}
<section class="bg-primary py-20 px-4 relative overflow-hidden">
    <div class="absolute top-4 left-4 w-20 h-20 border-l border-t border-secondary/30"></div>
    <div class="absolute top-4 right-4 w-20 h-20 border-r border-t border-secondary/30"></div>
    <div class="absolute bottom-4 left-4 w-20 h-20 border-l border-b border-secondary/30"></div>
    <div class="absolute bottom-4 right-4 w-20 h-20 border-r border-b border-secondary/30"></div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
        <p data-animate="fade-down" class="font-label text-xs tracking-[0.3em] text-secondary mb-3">SAVE THE DATE</p>
        <h2 data-animate="fade-up" class="font-heading text-3xl md:text-4xl text-text-light mb-12">Waktu & Tempat</h2>

        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div data-animate="fade-right" class="border border-secondary/40 rounded-sm p-8 bg-accent/20 backdrop-blur-sm">
                <div class="text-secondary text-3xl mb-4">🕌</div>
                <h3 class="font-label text-xs tracking-widest text-secondary mb-4">AKAD NIKAH</h3>
                <p class="font-heading text-lg text-text-light mb-2">Minggu, 31 Mei 2026</p>
                <p class="font-body text-sm text-text-light/80 mb-4">Pukul 13.30 WITA – Selesai</p>
                <div class="w-12 h-px bg-secondary/50 mx-auto mb-4"></div>
                <p class="font-body text-sm text-text-light/70">📍 Gedung Lengge Na'e Wawo</p>
                <p class="font-body text-xs text-text-light/50">Desa Maria, Kec. Wawo, Kab. Bima, NTB</p>
            </div>

            <div data-animate="fade-left" class="border border-secondary/40 rounded-sm p-8 bg-accent/20 backdrop-blur-sm">
                <div class="text-secondary text-3xl mb-4">🎊</div>
                <h3 class="font-label text-xs tracking-widest text-secondary mb-4">RESEPSI</h3>
                <p class="font-heading text-lg text-text-light mb-2">Minggu, 31 Mei 2026</p>
                <p class="font-body text-sm text-text-light/80 mb-4">Pukul 14.30 WITA – Selesai</p>
                <div class="w-12 h-px bg-secondary/50 mx-auto mb-4"></div>
                <p class="font-body text-sm text-text-light/70">📍 Gedung Lengge Na'e Wawo</p>
                <p class="font-body text-xs text-text-light/50">Desa Maria, Kec. Wawo, Kab. Bima, NTB</p>
            </div>
        </div>

        {{-- Countdown --}}
        <div data-animate="zoom-in" class="mb-12">
            <p class="font-label text-xs tracking-widest text-secondary/70 mb-6">MENUJU HARI BAHAGIA</p>
            <div x-data="{
                    days: 0, hours: 0, minutes: 0, seconds: 0,
                    target: new Date('2026-05-31T13:30:00+08:00').getTime(),
                    init() {
                        this.update();
                        setInterval(() => this.update(), 1000);
                    },
                    update() {
                        const diff = this.target - Date.now();
                        if (diff <= 0) return;
                        this.days = Math.floor(diff / 86400000);
                        this.hours = Math.floor((diff % 86400000) / 3600000);
                        this.minutes = Math.floor((diff % 3600000) / 60000);
                        this.seconds = Math.floor((diff % 60000) / 1000);
                    }
                 }"
                 class="flex justify-center gap-4 md:gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 border border-secondary/40 rounded-sm flex items-center justify-center bg-accent/10">
                        <span x-text="days" class="font-heading text-2xl md:text-3xl text-text-light">0</span>
                    </div>
                    <p class="font-label text-xs tracking-wider text-secondary/60 mt-2">HARI</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 border border-secondary/40 rounded-sm flex items-center justify-center bg-accent/10">
                        <span x-text="hours" class="font-heading text-2xl md:text-3xl text-text-light">0</span>
                    </div>
                    <p class="font-label text-xs tracking-wider text-secondary/60 mt-2">JAM</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 border border-secondary/40 rounded-sm flex items-center justify-center bg-accent/10">
                        <span x-text="minutes" class="font-heading text-2xl md:text-3xl text-text-light">0</span>
                    </div>
                    <p class="font-label text-xs tracking-wider text-secondary/60 mt-2">MENIT</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 border border-secondary/40 rounded-sm flex items-center justify-center bg-accent/10">
                        <span x-text="seconds" class="font-heading text-2xl md:text-3xl text-text-light">0</span>
                    </div>
                    <p class="font-label text-xs tracking-wider text-secondary/60 mt-2">DETIK</p>
                </div>
            </div>
        </div>

        {{-- Google Maps --}}
        <div data-animate="fade-up" class="space-y-4">
            <div class="rounded-sm overflow-hidden border border-secondary/30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.7783901436674!2d118.84258609999998!3d-8.5208844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db58f50779d40df%3A0x8260d6000e4d03ad!2sGedung%20Lengge%20Na&#39;e%20Wawo!5e0!3m2!1sen!2sid!4v1779514414577!5m2!1sen!2sid" 
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <a href="https://maps.google.com/?q=Gedung+Lengge+Nae+Wawo+Bima+NTB"
               target="_blank"
               class="inline-block px-6 py-2 border border-secondary text-secondary font-label text-xs tracking-widest
                      hover:bg-secondary hover:text-primary transition-all">
                PETUNJUK ARAH →
            </a>
        </div>
    </div>
</section>
