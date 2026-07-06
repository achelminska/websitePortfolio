<?php

return [

    'meta' => [
        'title' => 'Ola — Fullstack Developer Portfolio',
        'description' => 'Fullstack developer who loves turning ideas into code. Java, React, TypeScript, .NET.',
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
            "Hi! I'm Ola 👋",
            'Fullstack developer who loves turning ideas into code.',
            'Passionate about clean UI, pixel art, and building things that make a difference.',
            "Let's build something amazing together! 💜",
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
            'user' => 'ola@portfolio',
            'list_cmd' => 'skills --list',
        ],
    ],

    'projects' => [
        'kicker' => '03. Projects',
        'title' => 'Things I\'ve built_',
        'view_project' => 'View project',
        'view_all' => 'View all',
    ],

    'contact' => [
        'kicker' => '04. Contact',
        'title' => "Let's work together_",
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
        'thanks' => "Thanks for visiting! Let's build something amazing together.",
        'rights' => ':year Ola. All rights reserved.',
    ],

];
