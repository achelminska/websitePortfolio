@php
    $terminal = __('portfolio.skills.terminal');
    $terminalSkills = config('skills.terminal_skills', []);
    $toolSkills = config('skills.tools', []);

    // Skala paska umiejętności — monochromatyczna (biało-czarna), jak w prawdziwym terminalu.
    $skillScaleBlocks = 20;
@endphp

<section id="skills" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.skills.kicker') }}</p>
    <h2 class="mt-2 font-pixel text-xl leading-relaxed text-mist-100 sm:text-2xl">
        {{ __('portfolio.skills.title') }}
    </h2>

    <div class="mt-8 grid gap-6 lg:grid-cols-2 lg:items-stretch">
        {{-- Czarne okno terminala z paskami postępu. --}}
        <div class="overflow-hidden rounded-lg border border-neon-purple-500/20 bg-black">
            <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
                <div class="flex items-center gap-2">
                    <flux:icon.command-line class="size-4 text-neon-cyan-400" />
                    <span class="font-mono text-xs text-mist-300">{{ __('portfolio.skills.window_title') }}</span>
                </div>
                <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
            </div>

            <div class="space-y-3 p-4 font-mono text-sm leading-relaxed sm:p-6">
                <p>
                    <span class="text-mist-300">{{ $terminal['user'] }}:~$</span>
                    <span class="text-emerald-400">{{ $terminal['list_cmd'] }}</span>
                </p>

                @foreach ($terminalSkills as $skill)
                    @php $filledBlocks = (int) round($skill['level'] / 100 * $skillScaleBlocks); @endphp
                    <div class="flex items-center gap-3">
                        <span class="w-28 shrink-0 text-mist-100">{{ $skill['name'] }}</span>
                        <span class="flex flex-1 gap-2.5">
                            @for ($i = 0; $i < $skillScaleBlocks; $i++)
                                <span
                                    class="h-3 flex-1 rounded-[4px] {{ $i < $filledBlocks ? 'bg-zinc-300' : 'bg-white/10' }}"
                                ></span>
                            @endfor
                        </span>
                        <span class="w-10 shrink-0 text-right text-mist-500">{{ (int) $skill['level'] }}%</span>
                    </div>
                @endforeach

                <p>
                    <span class="text-mist-300">{{ $terminal['user'] }}:~$</span>
                    <span class="cursor-blink ml-1 inline-block h-3.5 w-2 bg-emerald-400 align-middle"></span>
                </p>
            </div>
        </div>

        {{-- Siatka ikon. Pliki w public/images/tech/ mają własną ramkę/tło wypalone
             w grafice — bez dodatkowego kontenera, żeby nie dublować ramek. --}}
        <div class="pixel-panel flex flex-col overflow-hidden p-0">
            <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
                <div class="flex items-center gap-2">
                    <flux:icon.wrench-screwdriver class="size-4 text-neon-cyan-400" />
                    <span class="font-mono text-xs text-mist-300">{{ __('portfolio.skills.tools_window_title') }}</span>
                </div>
                <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
            </div>

            <div class="grid flex-1 grid-cols-4 content-start gap-4 place-items-center p-4 sm:p-6">
                @foreach ($toolSkills as $tool)
                    <img
                        src="{{ asset('images/tech/'.$tool['icon'].'.png') }}"
                        alt="{{ $tool['name'] }}"
                        title="{{ $tool['name'] }}"
                        width="256"
                        height="256"
                        loading="lazy"
                        class="size-full max-w-24 rounded-lg"
                    >
                @endforeach
            </div>
        </div>
    </div>
</section>
