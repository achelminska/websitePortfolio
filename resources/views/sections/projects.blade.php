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

    <div class="mt-8 grid gap-4 sm:grid-cols-2">
        @foreach (config('projects', []) as $project)
            <article
                class="pixel-panel flex flex-col gap-4 border-t-2 bg-gradient-to-b p-5 {{ $accentClasses[$project['accent']] ?? $accentClasses['purple'] }}"
            >
                <div class="flex items-center gap-3">
                    <img
                        src="{{ asset('images/projects/'.$project['icon'].'.webp') }}"
                        alt="{{ $project['title'] }}"
                        width="256"
                        height="256"
                        loading="lazy"
                        class="size-12 shrink-0 rounded-lg"
                    >
                    <h3 class="font-pixel text-sm text-mist-100">{{ $project['title'] }}</h3>
                </div>

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
