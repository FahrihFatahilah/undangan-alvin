{{-- RSVP & Comments Section --}}
<section class="bg-primary py-20 px-4 relative">
    <div class="absolute top-4 left-4 w-16 h-16 border-l border-t border-secondary/20"></div>
    <div class="absolute top-4 right-4 w-16 h-16 border-r border-t border-secondary/20"></div>

    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-12">
            <p data-animate="fade-down" class="font-label text-xs tracking-[0.3em] text-secondary mb-3">WISHES</p>
            <h2 data-animate="fade-up" class="font-heading text-3xl md:text-4xl text-text-light mb-4">Ucapan & Doa</h2>
            <div class="gold-divider max-w-xs mx-auto">
                <span class="text-secondary text-sm">✦</span>
            </div>
        </div>

        {{-- Form --}}
        <div data-animate="fade-up"
             x-data="{
                name: '', message: '', attendance: 'hadir', loading: false, success: false,
                async submit() {
                    this.loading = true;
                    try {
                        const res = await fetch('/comment', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ name: this.name, message: this.message, attendance: this.attendance })
                        });
                        if (res.ok) {
                            this.success = true;
                            this.name = ''; this.message = ''; this.attendance = 'hadir';
                            window.dispatchEvent(new Event('refresh-comments'));
                            setTimeout(() => this.success = false, 3000);
                        }
                    } catch (e) {}
                    this.loading = false;
                }
             }"
             class="mb-12">
            <form @submit.prevent="submit()" class="space-y-4">
                <input type="text" x-model="name" placeholder="Nama Lengkap" required
                       class="w-full px-4 py-3 bg-accent/20 border border-secondary/30 rounded-sm
                              text-text-light placeholder-text-light/40 font-body text-sm focus:outline-none focus:border-secondary">
                <textarea x-model="message" placeholder="Ucapan & Doa untuk kedua mempelai..." required rows="4"
                          class="w-full px-4 py-3 bg-accent/20 border border-secondary/30 rounded-sm
                                 text-text-light placeholder-text-light/40 font-body text-sm focus:outline-none focus:border-secondary resize-none"></textarea>

                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" x-model="attendance" value="hadir" class="accent-secondary">
                        <span class="font-body text-sm text-text-light/80">✓ Hadir</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" x-model="attendance" value="tidak" class="accent-secondary">
                        <span class="font-body text-sm text-text-light/80">✗ Tidak Hadir</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" x-model="attendance" value="ragu" class="accent-secondary">
                        <span class="font-body text-sm text-text-light/80">? Masih Ragu</span>
                    </label>
                </div>

                <button type="submit" :disabled="loading"
                        class="w-full py-3 border border-secondary text-secondary font-label text-xs tracking-widest
                               hover:bg-secondary hover:text-primary transition-all disabled:opacity-50">
                    <span x-text="loading ? 'MENGIRIM...' : 'KIRIM UCAPAN'"></span>
                </button>
            </form>
            <p x-show="success" x-transition class="text-secondary text-sm mt-3 text-center font-body">✓ Ucapan berhasil dikirim!</p>
        </div>

        {{-- Comments List --}}
        <div data-animate="fade-up"
             x-data="{
                comments: {{ Js::from($comments) }},
                init() {
                    window.addEventListener('refresh-comments', () => this.fetch());
                    setInterval(() => this.fetch(), 30000);
                },
                async fetch() {
                    try {
                        this.comments = await (await fetch('/comments')).json();
                    } catch (e) {}
                },
                timeAgo(date) {
                    const s = Math.floor((Date.now() - new Date(date)) / 1000);
                    if (s < 60) return 'Baru saja';
                    if (s < 3600) return Math.floor(s / 60) + ' menit lalu';
                    if (s < 86400) return Math.floor(s / 3600) + ' jam lalu';
                    return Math.floor(s / 86400) + ' hari lalu';
                }
             }">
            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                <template x-for="comment in comments" :key="comment.id">
                    <div class="flex gap-3 p-4 bg-accent/10 border border-secondary/20 rounded-sm">
                        <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center flex-shrink-0">
                            <span x-text="comment.name.charAt(0).toUpperCase()" class="font-label text-sm text-secondary"></span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1 flex-wrap">
                                <span x-text="comment.name" class="font-heading text-sm text-text-light truncate"></span>
                                <span class="text-xs px-2 py-0.5 rounded-full border border-secondary/30 text-secondary/70 font-label"
                                      x-text="comment.attendance === 'hadir' ? '✓ Hadir' : comment.attendance === 'tidak' ? '✗ Tidak' : '? Ragu'"
                                      :class="comment.attendance === 'hadir' ? 'bg-green-900/20' : comment.attendance === 'tidak' ? 'bg-red-900/20' : 'bg-yellow-900/20'"></span>
                            </div>
                            <p x-text="comment.message" class="font-body text-sm text-text-light/70 break-words"></p>
                            <p x-text="timeAgo(comment.created_at)" class="font-body text-xs text-text-light/40 mt-1"></p>
                        </div>
                    </div>
                </template>
            </div>
            <p x-show="comments.length === 0" class="text-center text-text-light/40 font-body text-sm py-8">
                Belum ada ucapan. Jadilah yang pertama!
            </p>
        </div>
    </div>
</section>
