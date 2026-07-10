# Przewodnik po grafikach portfolio

Dwa mockupy w `_mockups/` (wygenerowane w ChatGPT) pokazują docelowy styl całej strony,
ale są to gotowe kompozycje — **nie da się ich pociąć programowo** na osobne elementy.
Każdy element (ilustrację, ikonę, maskotkę) trzeba wygenerować/wyeksportować osobno,
jako samodzielny plik z przezroczystym tłem, w rozmiarze i formacie opisanym niżej.

Trzymanie się tych zasad zapewnia spójny wygląd na każdej rozdzielczości ekranu —
od telefonu po duży desktop — bez potrzeby generowania wielu wersji tego samego pliku.

## Zasady ogólne (dotyczą każdej kategorii)

- **Przezroczyste tło** — PNG lub WebP z kanałem alfa (nie dodawaj białego/czarnego tła).
- **Format**: WebP dla ilustracji/scen z cieniowaniem, SVG dla płaskich, prostych ikon
  (skaluje się w nieskończoność, najmniejszy rozmiar pliku). Jeśli generujesz ikony
  narzędziem AI, które nie eksportuje SVG, użyj WebP/PNG w podanych rozmiarach.
- **Eksportuj "za duże"**: master 2-3x większy niż maksymalny rozmiar wyświetlania na
  stronie — pokrywa ekrany retina bez potrzeby `srcset` i wielu wersji pliku.
  Przeglądarka i tak skaluje w dół, więc jeden dobrze wyeksportowany plik wystarczy
  od telefonu po desktop.
- **Nazwy plików**: kebab-case, po angielsku, dokładnie takie jak w `config/projects.php`
  i `config/skills.php` (patrz tabelki niżej) — inaczej obrazki się nie wyświetlą.
- **Spójność w obrębie zestawu**: ten sam styl, poziom szczegółu i nasycenie kolorów
  między plikami tej samej kategorii (np. wszystkie ikony technologii), żeby siatka
  wyglądała spójnie, a nie jak zbiór przypadkowych obrazków.
- Każdy `<img>` w kodzie ma już `width`/`height` + `loading="lazy"` (poza ilustracją
  hero, która ładuje się od razu) — to zapobiega przeskokom layoutu; nie musisz nic
  dodatkowo robić w tym zakresie.

## 1. Ilustracja główna — sekcja About

| | |
|---|---|
| Plik | `public/images/illustrations/hero-about.webp` |
| Wymiary eksportu | ok. **1600×1600 px** (kwadrat), przezroczyste tło |
| Format | WebP (ewentualnie PNG) |
| Gdzie w kodzie | [resources/views/sections/hero.blade.php](../resources/views/sections/hero.blade.php) |
| Sposób wyświetlania | kontener `aspect-square max-w-[420px]`, `object-contain` |

Jedna scena: postać przy laptopie + otoczenie (książki, roślinki, kubek). Ponieważ
kontener ma stały `aspect-square` i `object-contain`, obrazek skaluje się płynnie od
telefonu do desktopa bez przycinania — nie potrzebujesz osobnej wersji mobilnej.

## 2. Ikony narzędzi — sekcja Skills ("Tools")

| | |
|---|---|
| Folder | `public/images/tech/` |
| Wymiary eksportu | **256×256 px** na ikonę, jednolite dla całego zestawu |
| Format | SVG (preferowane) lub WebP/PNG |
| Gdzie w kodzie | [config/skills.php](../config/skills.php) → klucz `tools.*.icon` |
| Sposób wyświetlania | siatka, każda ikona `size-10` (40px) |

Celowo bez języków/frameworków (te są w zakładce "Skills" jako paski % — patrz
`config/skills.php` → `terminal_skills`) — tu tylko narzędzia pracy, żeby się nie dublowały.

Wymagane pliki (nazwa musi się zgadzać z `icon` w `config/skills.php`):

`git.png`, `github.png`, `docker.png`, `postgresql.png`, `mysql.png`, `sql.png`,
`sqlite.png`, `postman.png`, `swagger.png`, `dbeaver.png`, `figma.png`, `npm.png`,
`vscode.png`, `visual-studio.png`, `rider.png`, `phpstorm.png`

Rekomendacja: to rozpoznawalne logotypy narzędzi — trudno o spójność, generując
12 osobnych obrazków AI. Dwie opcje:

1. **Gotowy zestaw SVG** (np. [Simple Icons](https://simpleicons.org) lub
   [Devicon](https://devicon.dev)) w jednolitym rozmiarze — szybkie, zawsze czytelne.
2. **Pełny pixel-art jak w mockupie** — generuj cały zestaw jednym promptem opisującym
   "ujednolicony zestaw 12 ikon technologicznych w stylu pixel-art", każda na
   identycznym płótnie 256×256 px, przezroczyste tło, ten sam poziom detalu i paleta.

## 3. Ikony projektów — sekcja Projects

| | |
|---|---|
| Folder | `public/images/projects/` |
| Wymiary eksportu | **256×256 px**, przezroczyste tło |
| Format | WebP (ewentualnie SVG jeśli to płaska ikona) |
| Gdzie w kodzie | [config/projects.php](../config/projects.php) → klucz `icon` |
| Sposób wyświetlania | `size-12` (48px) obok tytułu karty |

Wymagane pliki: `spykey.webp`, `rotify.webp`, `chatbox.webp`, `ghost-market.webp`.

Zachowaj spójny styl ramki/kolorystyki między tymi czterema ikonami — to one budują
wrażenie spójnej siatki kart projektów.

## 4. Maskotki / dekoracje (opcjonalnie)

Mockup zawiera drobne dekoracje (kaczuszka, kotek, duszek, gwiazdka) rozrzucone po
stronie. Nie są jeszcze podpięte w kodzie — to opcjonalny "polish" na później.

| | |
|---|---|
| Folder | `public/images/mascots/` (utwórz, gdy zaczniesz ich używać) |
| Wymiary eksportu | **512×512 px** na sztukę, przezroczyste tło |
| Format | WebP/PNG |
| Sposób wyświetlania | bardzo małe, np. `size-10 sm:size-14`, `hidden sm:block` na mobile |

Duży master (512px) przy tak małym wyświetlaniu daje ostrość na ekranach retina bez
generowania osobnych wersji. Na telefonie chowaj część z nich (`hidden sm:block`) albo
pomniejszaj (`scale-75`), żeby nie zaśmiecać małego ekranu — tak jak w Twoim mobilnym
mockupie.

## 5. Tła sekcji (opcjonalnie)

Jeśli zechcesz odtworzyć klimatyczne tło "pokoju hakera" za całą sekcją (książki,
lampiony, girlandy) zamiast pojedynczych elementów: eksportuj **jedno szerokie tło na
sekcję** (ok. 1920×600 px, WebP), wyświetlane jako `object-cover` w tle, przyciemnione
lub rozmyte pod treścią dla czytelności tekstu — zamiast dziesiątek małych, osobno
pozycjonowanych sprite'ów, które trudno utrzymać spójnie na różnych szerokościach ekranu.

## 6. Tło kafelka czatu "about.me" — sekcja About

| | |
|---|---|
| Plik | `public/images/illustrations/chat-bg.webp` |
| Wymiary eksportu | ok. **1600×1200 px** (4:3), **bez** przezroczystości (pełne tło) |
| Format | WebP (ewentualnie JPG) |
| Gdzie w kodzie | [resources/views/sections/hero.blade.php](../resources/views/sections/hero.blade.php) |
| Sposób wyświetlania | `object-cover` na całej wysokości/szerokości kafelka + ciemna nakładka `bg-ink-950/75` narzucona w kodzie |

Ten kafelek zmienia proporcje w zależności od ekranu — na desktopie jest szeroki i niski
(obok ilustracji), na mobile wąski i wysoki (pod ilustracją). Dlatego format 4:3 to
kompromis: `object-cover` przytnie środek obrazka w obu przypadkach bez rozciągania.

Przyciemnienie (żeby dymki i tekst zostały czytelne) jest już dodane w kodzie jako
osobna warstwa — **nie musisz** sama przyciemniać obrazka przed eksportem, może być w
pełnej jasności/nasyceniu. Dobry motyw: to samo "hacker room" tło co w ilustracji
głównej (biurko, girlandy, monitory), ale bardziej stonowane/zamglone, żeby nie
konkurowało wizualnie z awatarami i dymkami na pierwszym planie.

## 7. Screenshoty projektów — sekcja Projects (mockup laptop + telefon)

| | |
|---|---|
| Pliki | `public/images/projects/{slug}-desktop.png` i `public/images/projects/{slug}-mobile.png` |
| `slug` | patrz [config/projects.php](../config/projects.php) → klucz `slug` każdego projektu (np. `spykey`, `rotify`, `chatbox`, `ghost-market`) |
| Wymiary — desktop | ok. **1600×900 px** (16:9), **bez** przezroczystości |
| Wymiary — mobile | ok. **540×1140 px** (9:19), **bez** przezroczystości |
| Format | PNG lub WebP |
| Gdzie w kodzie | [resources/views/sections/projects.blade.php](../resources/views/sections/projects.blade.php) |
| Sposób wyświetlania | `object-cover` w ramce laptopa/telefonu — obie ramki (bezel, "podstawka" laptopa) są narysowane w kodzie, nie w grafice |

To mają być **realne, płaskie screenshoty** Twoich aplikacji (bez żadnej ramki urządzenia
na grafice — ramkę dorysowuje CSS). Desktop = zrzut całego okna/widoku aplikacji w
proporcji 16:9 (dopasuj kadrowanie tak, żeby najważniejsza część UI była na środku, bo
`object-cover` przycina brzegi). Mobile = zrzut widoku aplikacji na telefonie, w
proporcji zbliżonej do typowego ekranu smartfona (9:19).

Jeśli dla któregoś projektu nie masz jeszcze screenshotów — nic nie musisz robić,
sekcja pokaże wtedy szarą "dziurę" z nazwą brakującego pliku, żebyś wiedziała co
wgrać.

## Szybka checklista przed wrzuceniem pliku

- [ ] Tło przezroczyste (sprawdź w podglądzie na szachownicy, nie na białym tle)
- [ ] Nazwa pliku dokładnie zgodna z configiem (kebab-case, bez spacji/wielkich liter)
- [ ] Rozmiar zgodny z tabelką powyżej dla danej kategorii
- [ ] Styl spójny z resztą plików w tej samej kategorii
- [ ] Plik trafia do właściwego podfolderu w `public/images/`
