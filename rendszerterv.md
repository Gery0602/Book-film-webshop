## 1. A rendszer célja

Az oldal célja, hogy a tartalom fogyasztási igényeket kiszolgáljuk, és ennek érdekében
átfogó szolgáltatást nyújtsunk a felhasználóknak, ahol különböző hozzáférési
szinteken vehetnek részt. Az oldal felépítése lehetőséget biztosít arra, hogy a
felhasználók eltérő jogosultságokkal rendelkezzenek attól függően, hogy milyen
tevékenységet szeretnének végezni.

## 2. Projektterv

### 2.1 Projektszerepkörök, felelőségek:

- Project managger(A sarkcsillag, ki utat mutat):

  - Erdész Réka

    Feladata: Felügyelni a projektet és (mindenek előtt) megakadályozni a harmadik villágháborút.
    Akadályok feltárása.  
    Következő elvégzendő feladatok átbeszélése.    
    Útmutatás.

- Product owner:

  - Horváth Márton Bendegúz
  - Kiss Gergő János
  - Botos Bálint
  - Kondás Gergő

### 2.2 Projektmunkások és felelőségek:

- Frontend:

  - Horváth Márton Bendegúz
  - Kiss Gergő János
  - Botos Bálint
  - Kondás Gergő

    Feladatuk: A felhasználók által elérhető felületek létrehozása.  
    A backend által biztosított funkciók igénybevétele.  
    Egységes design megalkotása.

- Backend:

  - Horváth Márton Bendegúz
  - Kiss Gergő János
  - Botos Bálint
  - Kondás Gergő

    Feladatuk: A frontend kiszolgálása adatokkal és adatok feldolgozásával.  
    Adatbázisok létrehozása.

- Tesztelés:

  - Horváth Márton Bendegúz
  - Kiss Gergő János
  - Botos Bálint
  - Kondás Gergő

  Feladatuk: Hibák feltárása az üzembe helyezés előtt.


## 5. Funkcionális terv

### 5.1 Rendszerszereplők

**ADMIN**  
Feladata a rendszer teljes körű felügyelete és karbantartása.  
- Kezelheti az összes felhasználói fiókot.  
- Hozzáadhat, módosíthat és törölhet termékeket (könyvek, filmek).  
- Jóváhagyhat vagy törölhet értékeléseket és visszajelzéseket.  
- Felügyelheti a rendelések állapotát, és statisztikákat készíthet az eladásokról.  
- Jogosultságokat módosíthat és új adminisztrátort adhat a rendszerhez.  

**FELHASZNÁLÓ (vásárló)**  
A regisztrált felhasználók alapértelmezett szerepköre.  
- Böngészhetik a könyv és film kínálatot.  
- Szűrhetnek kategória, ár, szerző/rendező, megjelenési év szerint.  
- Hozzáadhatják a termékeket a kosárhoz, majd leadhatják rendelésüket.  
- Fizethetnek online bankkártyával.  
- Nyomon követhetik a rendelés állapotát.  
- Értékelhetik és kommentálhatják a termékeket.  
- Módosíthatják profiladataikat (név, email, cím, jelszó).  

**ADMINISTRÁTOR (rendszerkarbantartó)**  
- Teljes hozzáféréssel rendelkezik minden adathoz és funkcióhoz.  
- Képes az adatbázis karbantartására, biztonsági mentések készítésére.  
- Jogosultságokat kezelhet, és hibajelentéseket vizsgálhat.  

**LÁTOGATÓ**  
- Regisztráció nélkül böngészhet a termékek között.  
- Csak az általános információkat látja (pl. leírás, ár, borító).  
- A vásárláshoz regisztráció vagy bejelentkezés szükséges.  


---

### 5.2 Menühierarchiák

#### Bejelentkezés (Kezdőlap)
- **Bejelentkezés**
- **Regisztráció**
- **Terméklista megtekintése (nyilvános rész)**
- **Kapcsolat / Segítség / GYIK**

#### Főoldal (Bejelentkezett felhasználó)
- **Könyvek**
- **Filmek**
- **Keresés / Szűrés**
- **Kosár**
- **Profil**
  - Profiladatok módosítása
  - Rendeléseim
  - Kedvenceim
- **Kijelentkezés**

#### Főoldal (Adminisztrátor)
- **Termékek kezelése**
  - Új termék hozzáadása (könyv/film)
  - Termékek módosítása/törlése
  - Akciók beállítása
- **Felhasználók kezelése**
  - Felhasználók listázása
  - Jogosultságok módosítása
  - Felhasználók törlése
- **Rendelések kezelése**
  - Aktív rendelések megtekintése
  - Rendelés státusz módosítása
- **Statisztikák**
  - Napi/Heti/Havi eladások
  - Legnépszerűbb termékek
- **Kijelentkezés**

#### Regisztráció
- Adatok megadása:
  - Felhasználónév
  - Email cím
  - Jelszó
  - Telefonszám
  - Szállítási cím
- **Regisztráció elküldése**
- **Vissza a kezdőlapra**

#### Kosár
- Termékek listázása (cím, ár, mennyiség)
- Termék törlése a kosárból
- Összesített ár megjelenítése
- **Fizetés indítása (kártyás fizetés)**

#### Profil módosítása
- Név
- Email cím
- Telefonszám
- Szállítási cím
- Jelszó módosítása

#### Rendeléseim
- Aktív és korábbi rendelések megtekintése
- Szállítási státusz követése
- Számla letöltése PDF formátumban

---

## 6. Fizikai környezet

A rendszer **webes platformként** kerül kialakításra, amely bármely modern böngészőből elérhető.  
Támogatott eszközök:
- Asztali számítógép  
- Laptop  
- Okostelefon  
- Tablet  

Nem igényel telepítést vagy böngészőbővítményeket.  
A rendszer **HTTPS** protokollt és **SSL tanúsítványt** használ az adatok titkosítására.

**Fejlesztői eszközök:**
- Visual Studio Code  
- XAMPP  
- phpMyAdmin  
- GitHub verziókezelés  
- Laravel (PHP keretrendszer)  

---

## 7. Architekturális terv

### Webszerver
A rendszer az **Apache HTTP Serveren** fut, amely a felhasználói kéréseket kezeli és a Laravel backendhez továbbítja.  
A frontend statikus tartalmait (HTML, CSS, JavaScript, képek) a szerver közvetlenül szolgálja ki.

### Adatbázis rendszer
Az adatok a **MySQL** adatbázisban kerülnek tárolásra.  
Minden fő adatentitás (felhasználók, termékek, rendelések, értékelések) külön táblában helyezkedik el, idegen kulcsos kapcsolatokkal.

### Program elérése és kezelése
A rendszer webes felületen keresztül, böngészőből érhető el.  
A backend a Laravel MVC architektúrára épül:
- **Model**: adatbázis-kezelés  
- **View**: frontend megjelenítés (Blade templating)  
- **Controller**: üzleti logika és folyamatirányítás  

A frontend reszponzív kialakítású, **Bootstrap 5** és **Vue.js** technológiával.

---

## 8. Adatbázis terv

1. **users**  
   - `user_id`  
   - `username`  
   - `password`  
   - `email`  
   - `phone`  
   - `address_id`  
   - `role_id`  

2. **user_addresses**  
   - `address_id`  
   - `street`  
   - `city`  
   - `zipcode`  
   - `country`  

3. **products**  
   - `product_id`  
   - `title`  
   - `category` (könyv / film)  
   - `author_or_director`  
   - `description`  
   - `price`  
   - `stock`  
   - `release_year`  
   - `image_url`  

4. **orders**  
   - `order_id`  
   - `user_id`  
   - `order_date`  
   - `status`  
   - `total_price`  

5. **order_items**  
   - `order_item_id`  
   - `order_id`  
   - `product_id`  
   - `quantity`  
   - `subtotal_price`  

6. **reviews**  
   - `review_id`  
   - `product_id`  
   - `user_id`  
   - `rating` (1–5)  
   - `comment`  
   - `review_date`  

7. **roles**  
   - `role_id`  
   - `role_name` (admin / user)  

**Adatkapcsolatok:**  
- `users` → `user_addresses` (1:1)  
- `users` → `orders` (1:N)  
- `orders` → `order_items` (1:N)  
- `products` → `order_items` (1:N)  
- `products` → `reviews` (1:N)  
- `users` → `reviews` (1:N)

---

## 9. Implementációs terv

A rendszer **Laravel (PHP)** keretrendszerben kerül fejlesztésre, **MySQL** adatbázis-háttérrel.  
Az MVC architektúra biztosítja a kód átláthatóságát és bővíthetőségét.

### Backend
- A Laravel kezeli az adatbázis műveleteket (Eloquent ORM).  
- API végpontok biztosítják a termékek, rendelések és felhasználói adatok kezelését.  
- Auth modul felel a bejelentkezésért és jogosultságokért.  
- Payment modul az online fizetések feldolgozására (pl. Stripe).  

### Frontend
- Bootstrap + Vue.js alapú reszponzív felület.  
- AJAX és REST API integráció.  
- Egységes, modern UI/UX.  

### Adatbiztonság
- Jelszavak bcrypt algoritmussal kerülnek titkosításra.  
- SSL alapú kommunikáció.  
- Rendszeres adatmentés és admin felügyelet.  

---


