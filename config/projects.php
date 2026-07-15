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
 *
 * Rewers karty (po najechaniu myszką) pokazuje linki z 'github' (lista
 * repozytoriów: label + url) oraz 'live' (deploymenty / live demo: label + url).
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
        'tech' => ['ASP.NET Core MVC', 'Tailwind CSS', 'React Native', 'TypeScript', 'PostgreSQL'],
        'accent' => 'dark',
        'github' => [
            ['label' => 'DigiVaultWeb', 'url' => 'https://github.com/achelminska/DigiVaultWeb'],
            ['label' => 'DigiVaultAPI', 'url' => 'https://github.com/achelminska/DigiVaultAPI'],
            ['label' => 'DigiVaultMobile', 'url' => 'https://github.com/achelminska/DigiVaultMobile'],
        ],
        'live' => [
            ['label' => 'Portal WWW', 'url' => 'https://digivaultportal.onrender.com/'],
            ['label' => 'Intranet (admin)', 'url' => 'https://digivaultintranet.onrender.com/account/login'],
            ['label' => 'API — Swagger', 'url' => 'https://digivaultapi.onrender.com/swagger/index.html'],
            ['label' => 'Mobile — Appetize.io', 'url' => 'https://appetize.io/app/ios/org.reactjs.native.example.DigiVaultMobile?device=iphone14pro&osVersion=16.2&toolbar=true'],
        ],
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
        'accent' => 'dark',
        'github' => [
            ['label' => 'telegram-priority-bot', 'url' => 'https://github.com/achelminska/telegram-priority-bot'],
        ],
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
        'accent' => 'dark',
        'github' => [
            ['label' => 'ReactApp', 'url' => 'https://github.com/achelminska/ReactApp'],
        ],
        'live' => [
            ['label' => 'cinemabox-z52n.onrender.com', 'url' => 'https://cinemabox-z52n.onrender.com'],
            ['label' => 'Panel admina', 'url' => 'https://cinemabox-z52n.onrender.com/admin/login'],
        ],
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
        'accent' => 'dark',
        'github' => [
            ['label' => 'ghst-market', 'url' => 'https://github.com/achelminska/ghst-market'],
        ],
        'live' => [
            ['label' => 'ghstmarket.onrender.com', 'url' => 'https://ghstmarket.onrender.com'],
        ],
    ],

];
