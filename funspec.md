# Funkcionális specifikáció

## 1. Jelenlegi helyzet leírása
Jelenlegi helyzet szerint a filmek online megtekintése legális módon kétféleképpen működhet:

- 1 Valamilyen streaming szolgáltatónál előfizetéssel (pl.: Netflix, MAX, stb.)

- 2 Alkalmi licence bérlés (pl.: YouTube)

Mindkét opció csupán ideiglenes vagy előfizetéshez kötött, azaz a felhasználó csak az adott szolgáltatás ideje alatt férhet hozzá a tartalomhoz.

Erre nyújt megoldást az oldal. Itt egyszeri vásárlás után a felhasználó végleges tulajdonjoggal rendelkezik a film licenc felett, így bármikor,
bárhonnan elérheti azt, anélkül, hogy az előfizetési vagy bérlési időszakra kellene korlátozódnia. Ez a modell előnyös, mivel lehetőséget ad arra,
hogy a vásárlók saját időbeosztásuk szerint nézhessék meg a filmeket, anélkül, hogy újra és újra fizetniük kellene.

A filmek mellett oldalunk könyveket is kínál, amelyek letölthető formában állnak rendelkezésre. A könyvek licencét hasonló módon lehet megszerezni,
mint a filmekét, így a vásárló egyszeri díj befizetésével véglegesen hozzáférhet a könyvekhez. Az ilyen típusú tartalom értékesítése kényelmes és
praktikus megoldást kínál azoknak, akik nem szeretnének előfizetéseket kötni, vagy egyszerűen hosszú távú hozzáférést keresnek a filmekhez és könyvekhez.

Erre nzújt megoldást ay oldal. Itt egzsyeri fiyetés után a vásárló végleges tulajdonjoggal rendelkeyik a film licence felett, így bármikor, bárhonnan elérheti azt.

A filmek mellett oldalunk könyveket is kínál, melyet más oldalakhoy hasonlóan, letölthető formában biytosít. 

## 2. Vágyálomrendszer leírása:


Ideális esetben a rendszer egy globális platformmá válna, amely lehetővé tenné a felhasználók számára, hogy mindenféle tartalomhoz – filmekhez, könyvekhez, zenékhez, videojátékokhoz – egyszeri vásárlással jussanak hozzá, anélkül, hogy bármilyen előfizetési díjat kellene fizetniük. A jövőben, amennyiben a jogszabályok lehetővé teszik, egy olyan dinamikus licencelési modellt alakíthatnánk ki, amely lehetővé tenné a felhasználók számára, hogy bármilyen tartalmat véglegesen birtokoljanak és szabadon megosszák azt, miközben az alkotók megfelelő kompenzációban részesülnek.

Ezen a platformon a vásárlók személyre szabott élményt kapnának, amely figyelembe venné korábbi érdeklődéseiket, és így ajánlásokat tudna adni számukra új filmekről, könyvekről vagy más digitális tartalmakról. A felhasználói élmény még inkább személyre szabottá válna azáltal, hogy a rendszer képes lenne értékeléseket és visszajelzéseket gyűjteni, valamint azokat felhasználni a releváns tartalmak ajánlására.

Továbbá, egy decentralizált tárolási rendszer is része lenne a vágyálomnak, amely lehetővé tenné, hogy a felhasználók saját maguk tárolhassák és kezelhessék a megvásárolt tartalmakat, miközben az oldal garantálná azok biztonságos és jogszerű hozzáférhetőségét. A jövőbeli fejlesztések során az oldal képes lenne interaktív közösségi élményeket is biztosítani, ahol a felhasználók megoszthatják egymással véleményeiket, értékeléseiket és akár a tartalmakkal kapcsolatos egyedi élményeiket is.

Ebben a modellben a legnagyobb előny az lenne, hogy a felhasználók nem lenne többé kiszolgáltatva a szolgáltatók időszakos döntéseinek és változásainak, hanem teljes mértékben saját kontrolljuk alatt állna a vásárolt tartalom.

## 3. Jelenlegi üzleti folyamatok modellje

A MediaHub üzleti folyamatai gondosan megtervezettek, hogy maximális kényelmet és hatékonyságot 
biztosítsanak mind a felhasználók, mind az adminisztrátorok számára. A rendszer célja, hogy egy 
zökkenőmentes és felhasználóbarát élményt nyújtson, amely hozzájárul a sikeres film- vagy könyvbeszerzéshez.

A felhasználói folyamatok kezdődnek a regisztrációval, amely lehetővé teszi a vásárlók számára, hogy 
egyszerűen létrehozzanak egy profilt, amelyel teljeskörű hozzáférést kapnak ay oldal felhasználói felületéhez. A felhasználók 
az alkalmazáson keresztül könnyedén böngészhetnek a különböző filmek és könyvek között, azok adatai (Cím, ár, leírás, stb), kategóriákra bontva.
Az adminisztrátori folyamatok szintén kulcsfontosságúak a MediaHub működésében. Az adminisztrátorok 
felelősek a platform napi működtetéséért, beleértve a filmek és könyvek folyamatos frissítését. 

### 3.1 Felhasználói folyamatok:

A HuDora felhasználói folyamatai célzottan arra épülnek, hogy a vásárlók számára zökkenőmentes és 
élvezetes böngésyési és vásárlási élményt nyútsanak.

### 4. Alap forgatókönyv

Ebben a forgatókönyvben leírjuk a rendszer működésének alapvető folyamatait, amelyek lehetővé teszik az általános felhasználói interakciókat.

#### 1. Bejelentkezés:

A felhasználó megnyitja a bejelentkezési oldalt és megadja a felhasználónevét és jelszavát.
A rendszer ellenőrzi a felhasználói adatokat az adatbázisban.
Ha a bejelentkezési adatok helyesek, a felhasználó a főoldalra kerül, ahol a szerepkörének megfelelő menüpontok jelennek meg.
Hibás bejelentkezési adatok esetén a rendszer figyelmeztetést ad, és a felhasználó újra próbálkozhat.

#### 2. Regisztráció:

A felhasználó kitölti a regisztrációs űrlapot a kötelező mezők (név, email, jelszó) megadásával.
A rendszer ellenőrzi az adatok helyességét és egyediségét (pl. email-cím).
Sikeres regisztráció esetén a rendszer automatikusan alapértelmezett (pl. „felhasználó”) jogosultságot rendel a regisztrált felhasználónak, és átirányítja a bejelentkező oldalra.

#### 3. Vásárlás (rendelés):

A bejelentkezett felhasználó böngészhet az oldalon.
Kiválaszt egy terméket, majd rákattint a „Vásárlás” gombra.
A rendszer megjeleníti a vásárlási információkat (pl. termék ára).        

#### 4. Admin felület elérése:

A bejelentkezett admin felhasználó a menüben az „Admin” opcióra kattint.
A rendszer megjeleníti az adminisztrációs felületet, ahol az adminisztrátor kezelheti a felhasználókat.
Az adminisztrátor hozzáférhet a rendszerstatisztikákhoz és jogosultsági szintekhez is.

#### 5.  Profilkezelés:

A felhasználó megnyitja a profiloldalát, ahol módosíthatja az adatokat, például nevét, email-címét vagy jelszavát.
A rendszer ellenőrzi az új adatokat, és frissíti azokat az adatbázisban.

## 5. Fogalomszótár

* Admin: Admin vagy másnéven adminisztrátor olyan felhasználói szerepkör, amely különleges jogosultságokkal rendelkezik a weboldal kezeléséhez és fenntartásához. 

* Adatbázis: Az adatbázis olyan strukturált adatok gyűjteménye, amelyeket egy számítógépes rendszer tárol, kezel és lekérdez. Az adatbázis célja, hogy hatékonyan tárolja és hozzáférhetővé tegye a különféle információkat.

* Felhasználó: A felhasználó olyan személy, aki bejelentkezik vagy böngészi az oldalt, és különböző interakciókat végezhet az elérhető funkciók alapján. A felhasználók hozzáférési szintje és jogosultságai eltérőek lehetnek attól függően, hogy regisztrált felhasználókról, vendégekről, vagy különleges jogosultsággal rendelkező szerepkörökről (pl. adminisztrátor) van szó.


