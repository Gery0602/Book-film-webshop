# Követelmény specifikáció

## 1. Áttekintés

A MediaHub egy olyan innovatív online könyv és film platform, amelynek célja, hogy Magyarország vezető digitális tartalom szolgáltatójává váljon. A weboldal minden funkcióját arra terveztük, hogy felhasználóink gyorsan és kényelmesen vásároljanak vagy töltsenek le könyveket és filmeket bárhonnan az országban, és kiemelkedő élményt nyújtsunk minden tartalomfogyasztó számára.

## 2. A jelenlegi helyzet leírása

A jelenlegi állaspont szerint az oldal nem működőképes. Megértésüket köszönjük.

## 3. Vágyálomrendszer:
   A MediaHub célja egy felhasználóbarát és biztonságos platform létrehozása, amely egyszerű digitális tartalom szolgáltatójává váljon Magyarországon. A rendszer gyors regisztrációt és bejelentkezést tesz lehetővé, hogy a     felhasználók kényelmesen felfedezhessék a különböző álmokat kínálatát. Az filmek/könyvek részletes leírásokkal érhetők el, így az ajánlatok böngészése és a rendelés leadása egyszerű és gyors. A rendelési folyamat
   biztonságos, csak kártyás rendelés van érvényben az oldalon. A felhasználók kezelhetik fiókadataikat, míg az adminisztrátorok könnyedén frissíthetik a katalógus.

## 4. Jelenlegi üzleti folyamatok modellje
Jelenleg az szórakoztató piac több különböző platformra és helyi boltokra támaszkodik. Az alábbiakban összefoglaljuk a jellemző folyamatokat:

Felhasználói folyamatok: A vásárlók különböző oldalakon keresztül adják le rendeléseiket, azonban nem mindig találnak egységes kínálatot és kategorizált katalógust. Az film nézés több lépéses folyamat, amely során a felhasználóknak külön fiókokat kell létrehozniuk az egyes platformokon. A korábbi rendelések vagy kedvencek listája nem mindig elérhető egy helyen, így a felhasználóknak nehéz nyomon követniük, hogy mely filmeket/könyveket rendelték meg korábban.

Adminisztrátori folyamatok: Az adminisztrátorok különböző platformokon kezelik az katalógust és a rendelési adatokat. Az filmek/könyvek feltöltése, a katalógus frissítése és a vásárlói adatok kezelése időigényes folyamat, amely gyakran több lépcsőből áll, és be kell tartani az adatvédelmi szabályozásokat. Az adminisztrátorok feldolgozzák a beérkező rendeléseket, koordinálják a futárokat a szállítás érdekében, valamint kezelik a panaszokat és a visszatérítési igényeket.


## 5. Igényelt üzleti folyamatok modellje

A *MediaHub* célja, hogy egy **egységes, jól strukturált webshop rendszert** biztosítson mind a felhasználók, mind az adminisztrátorok számára.

### 5.1 Felhasználói folyamatok

1. **Regisztráció és bejelentkezés:**  
   A felhasználók gyorsan regisztrálhatnak, majd bejelentkezés után elérhetik fiókadataikat, rendeléseiket és kedvenceiket.

2. **Termékkatalógus böngészése:**  
   A felhasználók kategóriák, műfajok, ár, megjelenési év, szerző/rendező alapján kereshetnek könyveket és filmeket.  
   A találatok listája szűrhető és rendezhető.
   


5. **Kosár és rendelés:**  
   A kiválasztott termékek a virtuális kosárba helyezhetők, majd biztonságos online fizetéssel megvásárolhatók.

6. **Értékelés és visszajelzés:**  
   A vásárlók értékelhetik a könyveket, filmeket, illetve a kiszállítás és szolgáltatás minőségét.


### 5.2 Adminisztrátori folyamatok

1. **Termékkatalógus kezelése:**  
   Új könyvek és filmek feltöltése, szerkesztése, kategorizálása, készletkezelés, akciók és kedvezmények beállítása.

2. **Felhasználói és rendelési adatkezelés:**  
   A regisztrált vásárlók és rendelések adatainak megtekintése, módosítása, törlése.  
   Visszatérítések és reklamációk kezelése.

3. **Statisztikai jelentések:**  
   Eladások, látogatások, legnépszerűbb termékek, legaktívabb felhasználók és értékelések elemzése.



---

## 6. Követelménylista

| ID | Követelmény | Prioritás |
|----|--------------|-----------|
| 1 | Regisztráció és bejelentkezés funkció | Magas |
| 2 | Termékkatalógus böngészése és szűrése | Magas |
| 3 | Kosár | Magas |
| 4 | Biztonságos online fizetés | Magas |
| 5 | Rendeléskövetés funkció | Magas |
| 6 | Admin felület termék- és rendeléskezeléshez | Magas |
| 7 | Felhasználói értékelés és visszajelzés | Közepes |
| 8 | Adatvédelem és biztonsági előírások betartása | Magas |
| 9 | Statisztikai riportok és elemzések | Közepes |
| 10 | Reszponzív és felhasználóbarát felület | Magas |


---

## 7. Fogalomtár

- **Regisztráció:** Felhasználói fiók létrehozása a rendszerben.  
- **Kosár:** A vásárló által kiválasztott termékek ideiglenes tárolója.  
- **Digitális termék:** Letölthető tartalom, például e-könyv vagy filmfájl.  
- **Adminisztrátori felület:** Csak rendszergazdák számára elérhető kezelőfelület, ahol a termékadatok, rendelési információk és statisztikák kezelhetők.  
- **Fizikai termék:** Kézzelfogható árucikk (pl. nyomtatott könyv, DVD).  
- **Optimalizálás:** A rendszer teljesítményének, keresési sebességének és adatkezelésének javítása.  
- **Ajánlórendszer:** Olyan funkció, amely a korábbi vásárlások és keresések alapján új termékeket ajánl a felhasználónak.
