@php
    $navLinks = [
        ['href' => '#about', 'label' => __('portfolio.nav.about'), 'icon' => 'user'],
        ['href' => '#skills', 'label' => __('portfolio.nav.skills'), 'icon' => 'wrench'],
        ['href' => '#projects', 'label' => __('portfolio.nav.projects'), 'icon' => 'folder'],
        ['href' => '#contact', 'label' => __('portfolio.nav.contact'), 'icon' => 'envelope'],
    ];
    $otherLocale = app()->getLocale() === 'pl' ? 'en' : 'pl';
@endphp

{{-- Górny pasek — widoczny na każdej szerokości ekranu. --}}
<header class="sticky top-0 z-40 border-b border-neon-purple-500/20 bg-ink-950/80 backdrop-blur-md">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3 sm:px-6">
        <a href="#about" class="flex items-center gap-2 text-neon-cyan-400 hover:text-neon-cyan-300">
            <flux:icon.code-bracket class="size-5" />
            <span class="font-pixel text-[1rem] tracking-widest">ALEKSANDRA IZABELA CHEŁMIŃSKA_</span>
        </a>

        <nav class="hidden items-center gap-6 sm:flex">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    class="text-sm font-medium text-mist-300 transition hover:text-neon-pink-400"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <a
            href="{{ route('locale.switch', $otherLocale) }}"
            class="flex items-center gap-1.5 rounded-full border border-neon-purple-500/30 px-3 py-1.5 text-xs font-medium text-mist-300 transition hover:border-neon-pink-400/60 hover:text-neon-pink-400"
            title="{{ strtoupper($otherLocale) }}"
        >
            <flux:icon.language class="size-4" />
            {{ strtoupper($otherLocale) }}
        </a>
    </div>
</header>

{{-- Dolny pasek nawigacji — tylko na mobile, jak w mockupie. --}}
<nav class="fixed inset-x-0 bottom-0 z-40 border-t border-neon-purple-500/20 bg-ink-950/95 backdrop-blur-md sm:hidden">
    <div class="mx-auto flex max-w-6xl items-stretch justify-between px-2">
        @foreach ($navLinks as $link)
            <a
                href="{{ $link['href'] }}"
                class="flex flex-1 flex-col items-center gap-1 py-2.5 text-[0.65rem] font-medium text-mist-500 transition hover:text-neon-pink-400"
            >
                <flux:icon :name="$link['icon']" class="size-5" />
                {{ $link['label'] }}
            </a>
        @endforeach
    </div>
</nav>
