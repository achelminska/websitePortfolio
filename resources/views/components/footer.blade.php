<footer class="border-t border-neon-purple-500/20 bg-ink-950/60 pb-20 sm:pb-0">
    <div class="mx-auto max-w-6xl px-4 py-8 text-center sm:px-6">
        <p class="text-sm text-mist-300">{{ __('portfolio.footer.thanks') }}</p>
        <p class="mt-2 font-pixel text-[0.6rem] tracking-widest text-mist-700">
            {{ __('portfolio.footer.rights', ['year' => now()->year]) }}
        </p>
    </div>
</footer>
