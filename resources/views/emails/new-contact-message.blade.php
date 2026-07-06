<x-mail::message>
# Nowa wiadomość z formularza kontaktowego

**Od:** {{ $senderName }} ({{ $senderEmail }})

---

{{ $body }}

---

Odpowiedz bezpośrednio na tego maila — pole "Odpowiedz do" jest już ustawione na adres nadawcy.

Wysłano ze strony {{ config('app.name') }}.
</x-mail::message>
