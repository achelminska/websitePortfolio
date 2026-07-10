<?php

/**
 * Dane sekcji "Projects" — bez bazy danych, edytuj bezpośrednio tutaj.
 * Publikacja nowego projektu = zmiana tej tablicy + commit + deploy.
 *
 * Mockup (laptop + telefon) w widoku szuka plików po 'slug':
 * public/images/projects/{slug}-desktop.png i {slug}-mobile.png.
 * Dokładne wymiary i format — zobacz docs/assets-guide.md (#7).
 * Jeśli pliku nie ma, w tym miejscu pokaże się szara "dziura" z nazwą
 * brakującego pliku — to normalne, dopóki nie wgrasz screenshotów.
 */
return [

    [
        // Multi-repo: DigiVaultWeb (ASP.NET Core 9 MVC) + DigiVaultAPI (ASP.NET Core Web API)
        // + DigiVaultMobile (React Native + TypeScript).
        'slug' => 'digivault',
        'title' => 'DigiVault',
        'description' => [
            'en' => 'Multi-platform e-learning marketplace (web, API & mobile) for browsing, buying and selling online courses.',
            'pl' => 'Wieloplatformowy marketplace e-learningowy (web, API i mobile) do przeglądania, kupowania i sprzedawania kursów online.',
        ],
        'tech' => ['ASP.NET Core', 'React Native', 'TypeScript'],
        'accent' => 'purple',
        'url' => null,
    ],

    [
        // Repo: telegram-priority-bot — oznaczone przez Ciebie jako "🚧 Work in progress".
        'slug' => 'qc-alerts',
        'title' => 'QC Alerts',
        'description' => [
            'en' => 'Telegram bot for real-time warehouse priority & QC alert notifications, integrated with Google Sheets.',
            'pl' => 'Bot na Telegramie do powiadomień o priorytetach i alertach QC w magazynie w czasie rzeczywistym, zintegrowany z Google Sheets.',
        ],
        'tech' => ['JavaScript', 'Google Apps Script', 'Telegram Bot API'],
        'accent' => 'blue',
        'url' => null,
    ],

    [
        // Repo: ReactApp — ASP.NET Core 8 Web API backend (EF Core + SQLite)
        // + React 19 (Vite) frontend z React-Bootstrap i React Router.
        'slug' => 'cinemabox',
        'title' => 'CinemaBox',
        'description' => [
            'en' => 'Cinema showtimes browser & ticket booking.',
            'pl' => 'Przegląd repertuaru kin i rezerwacja biletów.',
        ],
        'tech' => ['ASP.NET Core', 'React', 'SQLite', 'React-Bootstrap'],
        'accent' => 'green',
        'url' => null,
    ],

    [
        // Repo: ghst-market — "Marketplace for digital creative assets — built with
        // Laravel 13, Livewire, Flux UI & PostgreSQL" (ten sam stack co ta strona!).
        'slug' => 'ghost-market',
        'title' => 'Ghost Market',
        'description' => [
            'en' => 'Marketplace for digital creative assets — browse, buy or sell fonts, templates, illustrations and more.',
            'pl' => 'Marketplace cyfrowych zasobów kreatywnych — przeglądaj, kupuj i sprzedawaj fonty, szablony, ilustracje i więcej.',
        ],
        'tech' => ['Laravel', 'Livewire', 'Flux UI', 'PostgreSQL'],
        'accent' => 'orange',
        // Znaleziony w Twoim zrzucie ekranu (adres w przeglądarce mobilnej) — usuń, jeśli nie chcesz go jeszcze publicznie linkować.
        'url' => 'https://ghostmarket.onrender.com',
    ],

];
