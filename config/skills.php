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
        ['name' => 'JavaScript', 'level' => 90],
        ['name' => 'TypeScript', 'level' => 85],
        ['name' => 'React', 'level' => 90],
        ['name' => 'Node.js', 'level' => 80],
        ['name' => 'PHP', 'level' => 80],
        ['name' => 'C#', 'level' => 85],
        ['name' => '.NET', 'level' => 80],
        ['name' => 'Laravel', 'level' => 80],
        ['name' => 'C++', 'level' => 70],
        ['name' => 'HTML5', 'level' => 90],
        ['name' => 'Tailwind CSS', 'level' => 85],
        ['name' => 'Alpine.js', 'level' => 75],
    ],

    // Widok "Tools" — narzędzia pracy (celowo bez języków/frameworków, te są w zakładce "Skills").
    'tools' => [
        ['name' => 'Git', 'icon' => 'git'],
        ['name' => 'GitHub', 'icon' => 'github'],
        ['name' => 'Docker', 'icon' => 'docker'],
        ['name' => 'PostgreSQL', 'icon' => 'postgresql'],
        ['name' => 'MySQL', 'icon' => 'mysql'],
        ['name' => 'SQL', 'icon' => 'sql'],
        ['name' => 'SQLite', 'icon' => 'sqlite'],
        ['name' => 'Postman', 'icon' => 'postman'],
        ['name' => 'Swagger', 'icon' => 'swagger'],
        ['name' => 'DBeaver', 'icon' => 'dbeaver'],
        ['name' => 'Figma', 'icon' => 'figma'],
        ['name' => 'npm', 'icon' => 'npm'],
        ['name' => 'VS Code', 'icon' => 'vscode'],
        ['name' => 'Visual Studio', 'icon' => 'visual-studio'],
        ['name' => 'Rider', 'icon' => 'rider'],
        ['name' => 'PhpStorm', 'icon' => 'phpstorm'],
    ],

];
