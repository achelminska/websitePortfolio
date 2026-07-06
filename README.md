# Portfolio — Aleksandra Chełmińska

Jednostronicowe portfolio zbudowane w Laravel 13 + Blade + Tailwind CSS v4 + Alpine.js,
z Livewire ograniczonym wyłącznie do formularza kontaktowego i Flux UI jako biblioteką
komponentów. **Projekt świadomie nie używa bazy danych** — treść (projekty, umiejętności)
edytowana jest bezpośrednio w kodzie (`config/*.php`), a jedynym dynamicznym elementem
jest formularz kontaktowy, który wysyła maila przez Resend (SMTP) i niczego nie zapisuje.

## Stack

- **Backend**: Laravel 13 (routing, walidacja, mailery — bez Eloquent/DB)
- **Frontend**: Blade + Tailwind CSS v4 + Alpine.js
- **Interaktywność**: Livewire (wyłącznie `app/Livewire/ContactForm.php`)
- **UI**: [Flux](https://fluxui.dev) (wersja darmowa)
- **Poczta**: Resend przez SMTP
- **Lokalizacja**: PL/EN (przełącznik w nawigacji, bez bazy — wybór trzymany w sesji)

## Wymagania

- PHP 8.3+
- Composer
- Node.js 20+ / npm

## Instalacja lokalna

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build   # lub: npm run dev (z hot-reloadem)
php artisan serve
```

Lokalnie maile z formularza kontaktowego lądują w `storage/logs/laravel.log`
(`MAIL_MAILER=log`). Zobacz komentarze w `.env` / `.env.example`, jak przełączyć na
prawdziwą wysyłkę przez Resend na produkcji.

## Edycja treści (bez bazy danych)

| Co | Gdzie |
|---|---|
| Projekty | [config/projects.php](config/projects.php) |
| Umiejętności / narzędzia | [config/skills.php](config/skills.php) |
| Teksty UI (PL/EN) | [lang/pl/portfolio.php](lang/pl/portfolio.php), [lang/en/portfolio.php](lang/en/portfolio.php) |
| Grafiki | `public/images/{illustrations,tech,projects,mascots}/` — patrz [docs/assets-guide.md](docs/assets-guide.md) |

Publikacja zmiany treści = edycja odpowiedniego pliku + commit + deploy.

## Formularz kontaktowy

`app/Livewire/ContactForm.php` waliduje dane po stronie serwera, chroni honeypotem
i rate limiterem (na cache, nie na bazie danych), po czym wysyła `app/Mail/NewContactMessage.php`
na adres z `CONTACT_RECIPIENT_EMAIL`. E-mail jest jedynym źródłem prawdy o wiadomości.

## Testy

```bash
php artisan test
```

## Dlaczego bez bazy danych

Strona nie ma potrzeby przechowywania stanu między odwiedzinami poza wysyłką pojedynczych
wiadomości. Baza danych, migracje i panel admina zostały świadomie pominięte — treść
zmienia się rzadko i wystarczająco dobrze żyje w kodzie wersjonowanym przez Git.
