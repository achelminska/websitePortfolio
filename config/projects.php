<?php

/**
 * Dane sekcji "Projects" — bez bazy danych, edytuj bezpośrednio tutaj.
 * Publikacja nowego projektu = zmiana tej tablicy + commit + deploy.
 *
 * 'icon' wskazuje na public/images/projects/{icon}.{webp|svg} — zobacz
 * docs/assets-guide.md po dokładne wymiary i format.
 */
return [

    [
        'slug' => 'spykey',
        'title' => 'SpyKey',
        'description' => [
            'en' => 'Password manager with encryption.',
            'pl' => 'Menedżer haseł z szyfrowaniem.',
        ],
        'tech' => ['.NET', 'SQL'],
        'icon' => 'spykey',
        'accent' => 'purple',
        'url' => null,
    ],

    [
        'slug' => 'rotify',
        'title' => 'Rotify',
        'description' => [
            'en' => 'Spotify analytics & insights.',
            'pl' => 'Analityka i statystyki Spotify.',
        ],
        'tech' => ['React', 'Node.js'],
        'icon' => 'rotify',
        'accent' => 'blue',
        'url' => null,
    ],

    [
        'slug' => 'chatbox',
        'title' => 'ChatBox',
        'description' => [
            'en' => 'Real-time chat application.',
            'pl' => 'Aplikacja czatu w czasie rzeczywistym.',
        ],
        'tech' => ['TypeScript', 'Socket.IO'],
        'icon' => 'chatbox',
        'accent' => 'green',
        'url' => null,
    ],

    [
        'slug' => 'ghost-market',
        'title' => 'Ghost Market',
        'description' => [
            'en' => 'Secure P2P marketplace.',
            'pl' => 'Bezpieczny rynek P2P.',
        ],
        'tech' => ['Next.js', 'Tailwind'],
        'icon' => 'ghost-market',
        'accent' => 'orange',
        'url' => null,
    ],

];
