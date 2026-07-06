<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ustawia aktywny język strony na podstawie wyboru zapisanego w sesji
 * (plikowej — bez bazy danych), z fallbackiem do języka przeglądarki
 * i domyślnego locale aplikacji.
 */
class SetLocale
{
    private const SUPPORTED_LOCALES = ['pl', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale') ?? $request->getPreferredLanguage(self::SUPPORTED_LOCALES) ?? config('app.locale');

        if (in_array($locale, self::SUPPORTED_LOCALES, true)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
