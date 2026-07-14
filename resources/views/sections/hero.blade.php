<section id="about" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.about.kicker') }}</p>
    <h1 class="mt-2 font-pixel text-2xl leading-relaxed text-mist-100 sm:text-4xl">
        {{ __('portfolio.about.title') }}
    </h1>

    <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,420px)_1fr] lg:items-stretch">
        <div class="pixel-panel aspect-square w-full max-w-[420px] p-2">
            <img
                src="{{ asset('images/illustrations/hero-about.png') }}"
                alt="{{ __('portfolio.about.window_title') }}"
                width="1600"
                height="1600"
                loading="eager"
                class="size-full rounded-lg object-contain"
            >
        </div>

        <div class="pixel-panel relative flex h-[min(420px,70vh)] min-h-0 flex-col overflow-hidden p-0 lg:h-auto lg:max-h-[420px]">
            {{-- Tło kafelka — wyeksportuj wg docs/assets-guide.md (#6) i wrzuć jako chat-bg.webp. --}}
            <img
                src="{{ asset('images/illustrations/chat-bg.png') }}"
                alt=""
                aria-hidden="true"
                class="absolute inset-0 -z-20 size-full object-cover"
            >
            <div class="absolute inset-0 -z-10 bg-ink-950/75"></div>

            <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
                <div class="flex items-center gap-2">
                    <flux:icon.chat-bubble-left-right class="size-4 text-neon-cyan-400" />
                    <span class="font-mono text-xs text-mist-300">{{ __('portfolio.about.window_title') }}</span>
                </div>
                <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
            </div>

            {{-- Animacja jak w komunikatorze: nowe wiadomości rozwijają się od dołu;
                 okno ma stałą wysokość i przewija się w dół przy kolejnych wiadomościach. --}}
            <div
                class="flex min-h-0 flex-1 flex-col overflow-y-auto overscroll-y-contain p-4 sm:p-6"
                x-ref="chatScroll"
                x-data="{
                    shown: 0,
                    typing: false,
                    total: {{ count(__('portfolio.about.messages')) + 1 }},
                    started: false,
                    scrollToBottom() {
                        this.$nextTick(() => {
                            const el = this.$refs.chatScroll;
                            if (el) el.scrollTo({ top: el.scrollHeight, behavior: 'smooth' });
                        });
                    },
                    start() {
                        if (this.started) return;
                        this.started = true;
                        setTimeout(() => {
                            this.shown = 1;
                            this.scrollToBottom();
                            this.queueNext();
                        }, 600);
                    },
                    queueNext() {
                        if (this.shown >= this.total) return;
                        setTimeout(() => {
                            this.typing = true;
                            this.scrollToBottom();
                        }, 700);
                        setTimeout(() => {
                            this.typing = false;
                            this.shown++;
                            this.scrollToBottom();
                            this.queueNext();
                        }, 2000);
                    },
                }"
                x-init="new IntersectionObserver((entries, observer) => {
                    if (entries[0].isIntersecting) { start(); observer.disconnect(); }
                }, { threshold: 0.35 }).observe($el)"
            >
                <div class="mt-auto flex flex-col">
                <div class="chat-msg" :class="shown >= 1 && 'is-shown'">
                    <div class="chat-msg-clip">
                        <div class="flex justify-end pt-3">
                            <div class="max-w-[85%] rounded-2xl rounded-br-sm bg-ink-700/80 px-4 py-2.5 text-sm leading-relaxed text-mist-100 shadow-sm">
                                {{ __('portfolio.about.question') }}
                            </div>
                        </div>
                    </div>
                </div>

                @foreach (__('portfolio.about.messages') as $message)
                    <div class="chat-msg" :class="shown >= {{ $loop->index + 2 }} && 'is-shown'">
                        <div class="chat-msg-clip">
                            <div class="flex items-end gap-2 pt-3">
                                <span class="relative block size-8 shrink-0 overflow-hidden rounded-full ring-1 ring-neon-purple-400/50">
                                    <span
                                        class="absolute inset-0 bg-[image:var(--avatar-img)] bg-cover"
                                        style="--avatar-img: url('{{ asset('images/illustrations/hero-about.png') }}'); background-position: 44% 27%; background-size: 360%;"
                                    ></span>
                                </span>
                                <div class="max-w-[85%] rounded-2xl rounded-bl-sm bg-violet-200 px-4 py-2.5 text-sm leading-relaxed text-ink-950 shadow-sm">
                                    {{ $message }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Wskaźnik pisania — rozwija się i zwija tym samym mechanizmem co dymki. --}}
                <div class="chat-msg" :class="typing && 'is-shown'">
                    <div class="chat-msg-clip">
                        <div class="flex items-end gap-2 pt-3">
                            <span class="relative block size-8 shrink-0 overflow-hidden rounded-full ring-1 ring-neon-purple-400/50">
                                <span
                                    class="absolute inset-0 bg-[image:var(--avatar-img)] bg-cover"
                                    style="--avatar-img: url('{{ asset('images/illustrations/hero-about.png') }}'); background-position: 44% 27%; background-size: 360%;"
                                ></span>
                            </span>
                            <div class="flex items-center gap-1 rounded-2xl rounded-bl-sm bg-violet-200/90 px-4 py-3.5 shadow-sm">
                                <span class="typing-dot size-1.5 rounded-full bg-ink-700"></span>
                                <span class="typing-dot size-1.5 rounded-full bg-ink-700" style="animation-delay: 0.15s;"></span>
                                <span class="typing-dot size-1.5 rounded-full bg-ink-700" style="animation-delay: 0.3s;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
