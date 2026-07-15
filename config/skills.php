<?php

/**
 * Dane sekcji "Skills" — bez bazy danych, edytuj bezpośrednio tutaj.
 * Ikony technologii wskazują na public/images/tech/{icon}.{svg|webp}.
 * Wymiary/format ikon: zobacz docs/assets-guide.md.
 */
return [

    // Widok "Skills" (zakładka w oknie terminala) — tylko języki i frameworki, z poziomem % do paska postępu.
    // Podmień "level" na swoje realne poziomy biegłości.
    'terminal_skills' => [
        ['name' => 'C#',           'level' => 75], // WorkThen, GHST, CinemaBox — budujesz na tym aktywnie
        ['name' => '.NET',         'level' => 70], // Web API, Clean Arch, MediatR — ale wciąż uczysz się niuansów
        ['name' => 'PHP',          'level' => 70], // QualityCheck, GHSTmarket, portfolio
        ['name' => 'Laravel',      'level' => 65], // aktywnie budujesz, ale relatywnie nowy stack
        ['name' => 'JavaScript',   'level' => 75], // długi staż, React, RN, bot
        ['name' => 'TypeScript',   'level' => 65], // używasz, ale nie Twój default
        ['name' => 'React',        'level' => 70], // admin panel, CinemaBox
        ['name' => 'React Native', 'level' => 65], // WorkThen mobile, GHST mobile
        ['name' => 'Tailwind CSS', 'level' => 80], // to jest Twój default, czujesz się pewnie
    ],

    // Widok "Tools" — narzędzia pracy (celowo bez języków/frameworków, te są w zakładce "Skills").
    // Kolejność: VCS/infra → bazy → API/DB tools → edytory (siatka 4 kolumny).
    'tools' => [
        // Version control & infra
        ['name' => 'Git', 'icon' => 'git'],
        ['name' => 'GitHub', 'icon' => 'github'],
        ['name' => 'Docker', 'icon' => 'docker'],
        ['name' => 'Figma', 'icon' => 'figma'],
        // Databases
        ['name' => 'PostgreSQL', 'icon' => 'postgresql'],
        ['name' => 'MySQL', 'icon' => 'mysql'],
        ['name' => 'MongoDB', 'icon' => 'mongodb'],
        ['name' => 'SQLite', 'icon' => 'sqlite'],
        ['name' => 'SQL Server', 'icon' => 'sql-server'],
        // API & DB tools
        ['name' => 'DBeaver', 'icon' => 'dbeaver'],
        ['name' => 'Postman', 'icon' => 'postman'],
        ['name' => 'Swagger', 'icon' => 'swagger'],
        // Editors / IDEs
        ['name' => 'VS Code', 'icon' => 'vscode'],
        ['name' => 'Visual Studio', 'icon' => 'visual-studio'],
        ['name' => 'Rider', 'icon' => 'rider'],
        ['name' => 'PhpStorm', 'icon' => 'phpstorm'],
    ],

];
