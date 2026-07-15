<?php

return [

    'meta' => [
        'title' => 'Aleksandra — Fullstack Developer Portfolio',
        'description' => 'Fullstack developer — .NET/C#, Laravel/PHP, React Native. Looking for my first job as a junior developer in the Netherlands.',
    ],

    'nav' => [
        'about' => 'About',
        'skills' => 'Skills',
        'projects' => 'Projects',
        'contact' => 'Contact',
    ],

    'about' => [
        'kicker' => '01. About',
        'title' => 'Let me introduce myself_',
        'window_title' => 'about.me',
        'question' => 'Who are you?',
        'messages' => [
            "Hi! I'm Aleksandra 👋",
            'Fullstack developer in my final year of engineering studies, living in the Netherlands.',
            'Day to day I work with .NET, Laravel and React Native. I don\'t like locking myself into one stack.',
            "More than frontend, I'm interested in what you can't see — how data flows through a system and why some architectures fit the problem while others only complicate it.",
            'Currently looking for my first job as a junior fullstack developer in the Netherlands 🇳🇱',
        ],
    ],

    'skills' => [
        'kicker' => '02. Skills',
        'title' => 'Tools & technologies I use_',
        'tab_terminal' => 'Skills',
        'tab_tools' => 'Tools',
        'window_title' => 'skills.sh',
        'tools_window_title' => 'tools.sh',
        'terminal' => [
            'user' => 'aleksandra@portfolio',
            'list_cmd' => 'skills --list',
        ],
    ],

    'projects' => [
        'kicker' => '03. Projects',
        'title' => 'Things I\'ve built_',
        'view_project' => 'View project',
        'view_all' => 'View all',
        'source_code' => 'Source code',
        'live_demo' => 'Live demo',
        'live_demo_hint' => 'See the app in action',
        'flip_hint' => 'Hover or tap to see links',
    ],

    'contact' => [
        'kicker' => '04. Contact',
        'title' => "Let's work together_",
        'window_title' => 'new-message.eml',
        'name' => 'Your name',
        'name_placeholder' => 'Enter your name',
        'email' => 'Email address',
        'email_placeholder' => 'Enter your email',
        'message' => 'Message',
        'message_placeholder' => 'Write your message here...',
        'honeypot_label' => 'Leave this field empty',
        'send' => 'Send message',
        'sending' => 'Sending...',
        'sent_title' => 'Message sent!',
        'sent_body' => "Thanks for reaching out — I'll get back to you soon.",
        'error_title' => 'Something went wrong',
        'error_body' => 'Please try again in a moment, or email me directly.',
        'rate_limited' => 'Too many attempts. Please wait a few minutes before trying again.',
        'errors' => [
            'name_required' => 'Please tell me your name.',
            'name_max' => 'That name looks a bit too long.',
            'email_required' => 'Please enter your email address.',
            'email_invalid' => 'That doesn\'t look like a valid email address.',
            'message_required' => 'Please write a message.',
            'message_min' => 'Your message is a little too short.',
            'message_max' => 'Your message is too long — please keep it under 2000 characters.',
        ],
    ],

    'footer' => [
        'thanks' => "Thanks for visiting! Let's build something together.",
        'rights' => ':year Aleksandra. All rights reserved.',
    ],

];
