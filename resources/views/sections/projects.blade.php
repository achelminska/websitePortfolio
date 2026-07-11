@php
    $accentClasses = [
        'purple' => 'from-neon-purple-600/30 to-transparent border-neon-purple-500/40',
        'blue' => 'from-sky-600/30 to-transparent border-sky-500/40',
        'green' => 'from-emerald-600/30 to-transparent border-emerald-500/40',
        'orange' => 'from-orange-600/30 to-transparent border-orange-500/40',
        'dark' => 'from-purple-950/30 to-zinc-950 border-purple-900/30',
    ];
@endphp

<section id="projects" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.projects.kicker') }}</p>
    <h2 class="mt-2 font-pixel text-2xl leading-relaxed text-mist-100 sm:text-4xl">
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

                // Pixel-artowe ikony na rewersie karty (opcjonalne) — jeśli ich nie ma,
                // używamy ikon z Flux. Zobacz docs/assets-guide.md (#8).
                $githubIcon = file_exists(public_path('images/ui/github.png')) ? asset('images/ui/github.png') : null;
                $liveIcon = file_exists(public_path('images/ui/live.png')) ? asset('images/ui/live.png') : null;

                // Logo projektu na rewersie (opcjonalne) — wgraj jako {slug}-logo.png.
                // Opcjonalny wariant na małe ekrany: {slug}-logo-mobile.png.
                $logoRel = 'images/projects/'.$project['slug'].'-logo.png';
                $hasLogo = file_exists(public_path($logoRel));
                $logoMobileRel = 'images/projects/'.$project['slug'].'-logo-mobile.png';
                $hasLogoMobile = file_exists(public_path($logoMobileRel));

                // Tło rewersu (opcjonalne) — wgraj jako {slug}-bg.png; kod przyciemnia je nakładką.
                $backBgRel = 'images/projects/'.$project['slug'].'-bg.png';
                $hasBackBg = file_exists(public_path($backBgRel));

                // Przy większej liczbie linków układamy je w dwóch kolumnach, żeby zmieściły się na karcie.
                $linkCount = count($project['github'] ?? []) + count($project['live'] ?? []);
            @endphp

            {{-- Karta 3D: najechanie (lub focus na dotyku) odwraca ją i pokazuje linki projektu. --}}
            <article class="group [perspective:1400px]" tabindex="0">
            <div class="relative h-full transition-transform duration-700 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)] group-focus-within:[transform:rotateY(180deg)] group-focus:[transform:rotateY(180deg)]">

            {{-- Awers karty. --}}
            <div
                class="pixel-panel flex h-full flex-col gap-4 border-t-2 bg-gradient-to-b p-5 [backface-visibility:hidden] {{ $accentClasses[$project['accent']] ?? $accentClasses['purple'] }}"
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

                <h3 class="font-pixel text-base text-mist-100">{{ $project['title'] }}</h3>

                <p class="text-sm leading-relaxed text-mist-300">
                    {{ $project['description'][app()->getLocale()] ?? $project['description']['en'] }}
                </p>

                <div class="flex flex-wrap gap-2">
                    @foreach ($project['tech'] as $tech)
                        <flux:badge size="sm" color="zinc">{{ $tech }}</flux:badge>
                    @endforeach
                </div>

                <div class="mt-auto flex items-center gap-1.5 pt-2 text-xs text-mist-700">
                    <flux:icon.cursor-arrow-ripple class="size-4" />
                    {{ __('portfolio.projects.flip_hint') }}
                </div>
            </div>

            {{-- Rewers karty — linki do repozytoriów i deploymentu, na czarnym tle (jak terminal w sekcji Skills)
                 lub na opcjonalnej grafice {slug}-bg.png przyciemnionej nakładką. --}}
            <div
                class="pixel-panel absolute inset-0 flex flex-col overflow-hidden border-t-2 bg-black [transform:rotateY(180deg)] [backface-visibility:hidden] {{ $accentClasses[$project['accent']] ?? $accentClasses['purple'] }}"
            >
                @if ($hasBackBg)
                    <img
                        src="{{ asset($backBgRel) }}"
                        alt=""
                        aria-hidden="true"
                        class="absolute inset-0 -z-20 size-full object-cover"
                    >
                    <div class="absolute inset-0 -z-10 bg-black/70"></div>
                @endif

                <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
                    <div class="flex items-center gap-2">
                        <flux:icon.link class="size-4 text-neon-cyan-400" />
                        <span class="font-mono text-xs text-mist-300">{{ $project['slug'] }}.links</span>
                    </div>
                    <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
                </div>

                {{-- Logo + linki jako jedna grupa wyśrodkowana w pionie na całej wysokości karty. --}}
                <div class="flex flex-1 flex-col justify-center p-4 sm:p-5">
                    @if ($hasLogo)
                        <div class="flex justify-center px-4 pb-10 sm:pb-14">
                            @if ($hasLogoMobile)
                                <img
                                    src="{{ asset($logoMobileRel) }}"
                                    alt="{{ $project['title'] }} — logo"
                                    loading="lazy"
                                    class="h-32 w-auto max-w-[85%] object-contain opacity-75 brightness-90 sm:hidden"
                                >
                            @endif
                            <img
                                src="{{ asset($logoRel) }}"
                                alt="{{ $project['title'] }} — logo"
                                loading="lazy"
                                class="h-32 w-auto max-w-[85%] object-contain opacity-75 brightness-90 sm:h-48 {{ $hasLogoMobile ? 'hidden sm:block' : '' }}"
                            >
                        </div>
                    @endif
                    <div class="grid gap-2 sm:gap-2.5 {{ $linkCount > 4 ? 'grid-cols-2' : '' }}">
                    @foreach ($project['github'] ?? [] as $repo)
                        <a
                            href="{{ $repo['url'] }}"
                            target="_blank"
                            rel="noopener"
                            class="flex items-center gap-2 rounded-lg border border-neon-purple-500/30 bg-ink-950/60 px-2.5 py-2 transition hover:border-neon-cyan-400/60 hover:bg-ink-800/60 sm:gap-3 sm:px-3.5 sm:py-2.5"
                        >
                            @if ($githubIcon)
                                <img src="{{ $githubIcon }}" alt="" class="size-6 shrink-0 sm:size-7" />
                            @else
                                <flux:icon.code-bracket class="size-6 shrink-0 text-neon-purple-400" />
                            @endif
                            <span class="min-w-0 flex-1">
                                <span class="block truncate text-xs font-medium text-mist-100 sm:text-sm">{{ __('portfolio.projects.source_code') }}</span>
                                <span class="block truncate font-mono text-[0.65rem] text-mist-500 sm:text-xs">{{ $repo['label'] }}</span>
                            </span>
                            <flux:icon.arrow-up-right class="size-4 shrink-0 text-mist-500" />
                        </a>
                    @endforeach

                    @foreach ($project['live'] ?? [] as $live)
                        <a
                            href="{{ $live['url'] }}"
                            target="_blank"
                            rel="noopener"
                            class="flex items-center gap-2 rounded-lg border border-neon-cyan-400/40 bg-ink-950/60 px-2.5 py-2 transition hover:border-neon-cyan-400 hover:bg-ink-800/60 sm:gap-3 sm:px-3.5 sm:py-2.5"
                        >
                            @if ($liveIcon)
                                <img src="{{ $liveIcon }}" alt="" class="size-6 shrink-0 sm:size-7" />
                            @else
                                <flux:icon.rocket-launch class="size-6 shrink-0 text-neon-cyan-400" />
                            @endif
                            <span class="min-w-0 flex-1">
                                <span class="block truncate text-xs font-medium text-mist-100 sm:text-sm">{{ __('portfolio.projects.live_demo') }}</span>
                                <span class="block truncate font-mono text-[0.65rem] text-mist-500 sm:text-xs">{{ $live['label'] }}</span>
                            </span>
                            <flux:icon.arrow-up-right class="size-4 shrink-0 text-neon-cyan-400" />
                        </a>
                    @endforeach
                    </div>
                </div>
            </div>

            </div>
            </article>
        @endforeach
    </div>
</section>
