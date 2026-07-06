@php
    $terminalSkills = config('skills.terminal', []);
    $toolSkills = config('skills.tools', []);
@endphp

<section id="skills" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.skills.kicker') }}</p>
    <h2 class="mt-2 font-pixel text-xl leading-relaxed text-mist-100 sm:text-2xl">
        {{ __('portfolio.skills.title') }}
    </h2>

    <div x-data="{ tab: 'terminal' }" class="pixel-panel mt-8 p-4 sm:p-6">
        {{-- Przełącznik zakładek — czysty Alpine.js, bez Livewire (Flux Tabs to komponent Pro). --}}
        <div class="inline-flex rounded-lg border border-neon-purple-500/30 bg-ink-950/60 p-1">
            <button
                type="button"
                @click="tab = 'terminal'"
                :class="tab === 'terminal' ? 'bg-neon-purple-600 text-white' : 'text-mist-500 hover:text-mist-100'"
                class="rounded-md px-4 py-1.5 text-xs font-medium transition"
            >
                {{ __('portfolio.skills.tab_terminal') }}
            </button>
            <button
                type="button"
                @click="tab = 'tools'"
                :class="tab === 'tools' ? 'bg-neon-purple-600 text-white' : 'text-mist-500 hover:text-mist-100'"
                class="rounded-md px-4 py-1.5 text-xs font-medium transition"
            >
                {{ __('portfolio.skills.tab_tools') }}
            </button>
        </div>

        {{-- Widok "Terminal": paski postępu. --}}
        <div x-show="tab === 'terminal'" x-cloak class="mt-6 space-y-3 font-mono text-sm">
            <p class="text-neon-cyan-400">$ skills --list</p>
            @foreach ($terminalSkills as $skill)
                <div class="flex items-center gap-3">
                    <span class="w-24 shrink-0 text-mist-300">{{ $skill['name'] }}</span>
                    <span class="h-2 flex-1 overflow-hidden rounded-full bg-ink-800">
                        <span
                            class="block h-full rounded-full bg-gradient-to-r from-neon-purple-500 to-neon-pink-500"
                            style="width: {{ (int) $skill['level'] }}%"
                        ></span>
                    </span>
                    <span class="w-10 shrink-0 text-right text-mist-500">{{ (int) $skill['level'] }}%</span>
                </div>
            @endforeach
            <p class="text-mist-700">$ _</p>
        </div>

        {{-- Widok "Tools": siatka ikon. --}}
        <div x-show="tab === 'tools'" x-cloak class="mt-6 grid grid-cols-3 gap-3 sm:grid-cols-4 md:grid-cols-6">
            @foreach ($toolSkills as $tool)
                <div class="flex flex-col items-center gap-2 rounded-lg border border-neon-purple-500/20 bg-ink-800/50 p-3 text-center">
                    <img
                        src="{{ asset('images/tech/'.$tool['icon'].'.svg') }}"
                        alt="{{ $tool['name'] }}"
                        width="56"
                        height="56"
                        loading="lazy"
                        class="size-10"
                    >
                    <span class="text-xs text-mist-300">{{ $tool['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
