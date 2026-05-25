{{-- Music Player - Alpine.js x-data component --}}
<div x-data="{
        playing: false,
        init() {
            this.playing = localStorage.getItem('musicPlaying') === 'true';
            if (this.playing) {
                this.$refs.audio.play().catch(() => {});
            }
        },
        toggle() {
            if (this.playing) {
                this.$refs.audio.pause();
            } else {
                this.$refs.audio.play().catch(() => {});
            }
            this.playing = !this.playing;
            localStorage.setItem('musicPlaying', this.playing.toString());
        }
     }"
     class="fixed bottom-6 right-6 z-50">

    <button @click="toggle()"
            class="w-14 h-14 rounded-full bg-primary border-2 border-secondary flex items-center justify-center
                   shadow-lg hover:scale-110 transition-all">
        <span class="text-secondary text-xl" :class="playing ? 'animate-spin-slow' : ''">♪</span>
    </button>

    <audio x-ref="audio" id="bg-music" loop preload="auto">
        <source src="{{ asset('music/background.mp3') }}" type="audio/mpeg">
    </audio>
</div>
