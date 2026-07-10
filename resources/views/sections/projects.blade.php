@php
    $accentClasses = [
        'purple' => 'from-neon-purple-600/30 to-transparent border-neon-purple-500/40',
        'blue' => 'from-sky-600/30 to-transparent border-sky-500/40',
        'green' => 'from-emerald-600/30 to-transparent border-emerald-500/40',
        'orange' => 'from-orange-600/30 to-transparent border-orange-500/40',
    ];
@endphp

<section id="projects" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.projects.kicker') }}</p>
    <h2 class="mt-2 font-pixel text-xl leading-relaxed text-mist-100 sm:text-2xl">
        {{ __('portfolio.projects.title') }}
    </h2>

    <div class="mt-8 grid gap-6 sm:grid-cols-2">
        @foreach (config('projects', []) as $project)
            @php
                // Realne screenshoty wgrywane ręcznie — zobacz docs/assets-guide.md (#7).
                $desktopRel = 'images/projects/'.$project['slug'].'-desktop.png';
                $mobileRel = 'images/projects/'.$project['slug'].'-mobile.png';
                $hasDesktop = file_exists(public_path($desktopRel));
                $hasMobile = file_exists(public_path($mobileRel));
            @endphp

            <article
                class="pixel-panel flex flex-col gap-4 border-t-2 bg-gradient-to-b p-5 {{ $accentClasses[$project['accent']] ?? $accentClasses['purple'] }}"
            >
                {{-- Mockup: laptop na całą szerokość + telefon nachodzący na dolny prawy narożnik. --}}
                <div class="relative mb-5 px-1 pb-9 pt-1">
                    <div class="overflow-hidden rounded-md border-[3px] border-neon-purple-500/40 bg-ink-950">
                        <div class="flex h-3 items-center justify-center bg-ink-900/80">
                            <span class="size-1 rounded-full bg-ink-700"></span>
                        </div>
                        <div class="aspect-video w-full">
                            @if ($hasDesktop)
                                <img
                                    src="{{ asset($desktopRel) }}"
                                    alt="{{ $project['title'] }} — desktop"
                                    loading="lazy"
                                    class="size-full object-cover"
                                >
                            @else
                                <div class="flex size-full items-center justify-center bg-ink-900/60 px-2 text-center font-mono text-[0.6rem] leading-relaxed text-mist-700">
                                    {{ $desktopRel }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mx-auto h-1.5 w-3/5 rounded-b-sm border-x-[3px] border-b-[3px] border-neon-purple-500/40 bg-ink-900"></div>

                    <div class="absolute -bottom-3 right-2 w-[30%] overflow-hidden rounded-xl border-[3px] border-neon-purple-500/50 bg-ink-950 shadow-lg shadow-black/50">
                        <div class="aspect-[9/19] w-full">
                            @if ($hasMobile)
                                <img
                                    src="{{ asset($mobileRel) }}"
                                    alt="{{ $project['title'] }} — mobile"
                                    loading="lazy"
                                    class="size-full object-cover"
                                >
                            @else
                                <div class="flex size-full items-center justify-center bg-ink-900/60 px-1 text-center font-mono text-[0.45rem] leading-tight text-mist-700">
                                    {{ $mobileRel }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <h3 class="font-pixel text-sm text-mist-100">{{ $project['title'] }}</h3>

                <p class="text-sm leading-relaxed text-mist-300">
                    {{ $project['description'][app()->getLocale()] ?? $project['description']['en'] }}
                </p>

                <div class="flex flex-wrap gap-2">
                    @foreach ($project['tech'] as $tech)
                        <flux:badge size="sm" color="zinc">{{ $tech }}</flux:badge>
                    @endforeach
                </div>

                <div class="mt-auto pt-2">
                    @if ($project['url'])
                        <a
                            href="{{ $project['url'] }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-1.5 text-xs font-medium text-neon-cyan-400 hover:text-neon-cyan-300"
                        >
                            {{ __('portfolio.projects.view_project') }} →
                        </a>
                    @else
                        <span class="text-xs text-mist-700">{{ __('portfolio.projects.view_project') }}</span>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</section>
