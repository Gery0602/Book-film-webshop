┌────────────────────────────────────────────────────────────────────────────┐
│                       BOOK & FILM WEBSHOP DATABASE                         │
│                           Adatbázis Diagram                                │
└────────────────────────────────────────────────────────────────────────────┘


                            ┌─────────────────────────┐
                            │      👤 USERS           │
                            │    Felhasználók         │
                            ├─────────────────────────┤
                            │ 🔑 id                   │
                            │    name                 │
                            │    email (unique)       │
                            │    password             │
                            │    phone                │
                            │    address              │
                            │    city                 │
                            │    postal_code          │
                            │    country              │
                            │    role (enum)          │
                            │    deleted_at           │
                            └─────────────────────────┘
                                    │        │
                        ┌───────────┘        └────────────┐
                        │ 1:N                             │ 1:N
                        ▼                                 ▼
        ┌─────────────────────────┐         ┌─────────────────────────┐
        │     📋 ORDERS           │         │  📚 USER_LIBRARIES      │
        │     Rendelések          │         │  Felhasználói könyvtár  │
        ├─────────────────────────┤         ├─────────────────────────┤
        │ 🔑 id                   │         │ 🔑 id                   │
        │ 🔗 user_id (FK)         │         │ 🔗 user_id (FK)         │
        │    total_amount         │         │ 🔗 product_id (FK)      │
        │    payment_method (enum)│         │ 🔗 order_id (FK)        │
        │    paid_at              │         └─────────────────────────┘
        └─────────────────────────┘                    │
                 │                                     │
                 │                                     │
                 │                                     │
                 │ 1:N                                 │
                 ▼                                     │
        ┌─────────────────────────┐                    │
        │  🛒 ORDER_ITEMS         │                   │
        │  Rendelési tételek      │                    │
        ├─────────────────────────┤                    │
        │ 🔑 id                   │                   │
        │ 🔗 order_id (FK)        │                   │
        │ 🔗 product_id (FK) ─────┼───────────────────┘
        │    price                │                   │
        └─────────────────────────┘                   │
                                                       ▼
                                        ┌─────────────────────────────────────┐
                                        │      📦 PRODUCTS                    │
                                        │   Termékek (könyv, film, zene)      │
                                        ├─────────────────────────────────────┤
                                        │ 🔑 id                               │
                                        │    title                            │
                                        │    slug (unique)                    │
                                        │    type (enum)                      │
                                        │    description                      │
                                        │    price                            │
                                        │    creator                          │
                                        │    release_year                     │
                                        │    duration                         │
                                        │    format (HD/4K)                   │
                                        │    cover_image                      │
                                        │    file_path                        │
                                        │    file_size                        │
                                        │    download_limit                   │
                                        │    deleted_at                       │
                                        └─────────────────────────────────────┘
                                                │               │
                                     ┌──────────┘               └──────────┐
                                     │ N:M                                 │ 1:N
                                     ▼                                     ▼
                ┌─────────────────────────────┐             ┌─────────────────────────┐
                │  🔗 PRODUCT_CATEGORY        │             │    ⭐ RATING           │
                │  Pivot tábla                │             │    Értékelések          │
                ├─────────────────────────────┤             ├─────────────────────────┤
                │ 🔑 id                       │             │ 🔑 id                   │
                │ 🔗 product_id (FK)          │             │ 🔗 user_id (FK)         │
                │ 🔗 category_id (FK)         │             │ 🔗 product_id (FK)      │
                └─────────────────────────────┘             │    rating (1-5)         │
                            │                               │    UNIQUE(user_id,      │
                            │                               │           product_id)   │
                            │ N:1                           └─────────────────────────┘ 
                            ▼                               
                ┌─────────────────────────┐                 
                │   🏷️ CATEGORIES         │                
                │   Kategóriák            │
                ├─────────────────────────┤
                │ 🔑 id                   │
                │    name                 │
                └─────────────────────────┘


═══════════════════════════════════════════════════════════════════════════════
                          KAPCSOLATOK (RELATIONSHIPS)
═══════════════════════════════════════════════════════════════════════════════

📊 ONE TO MANY (1:N)
├─ User → Orders              Egy felhasználó több rendelést adhat le
├─ User → UserLibraries       Egy felhasználó több termékkel rendelkezik
├─ User → Reviews             Egy felhasználó több értékelést írhat
├─ Order → OrderItems         Egy rendeléshez több tétel tartozik
├─ Product → OrderItems       Egy termék több rendelésben szerepelhet
├─ Product → Reviews          Egy termékhez több értékelés tartozhat
└─ Product → UserLibraries    Egy termék több felhasználónál lehet

🔗 MANY TO MANY (N:M)
└─ Product ↔ Category         Egy termék több kategóriába tartozhat
                              Egy kategóriához több termék tartozik


═══════════════════════════════════════════════════════════════════════════════
                         INDEXEK ÉS MEGSZORÍTÁSOK
═══════════════════════════════════════════════════════════════════════════════

🔐 PRIMARY KEYS
├─ users.id
├─ products.id
├─ categories.id
├─ orders.id
├─ order_items.id
├─ user_libraries.id
├─ reviews.id
└─ product_category.id

🔗 FOREIGN KEYS
├─ orders.user_id → users.id
├─ order_items.order_id → orders.id
├─ order_items.product_id → products.id
├─ user_libraries.user_id → users.id
├─ user_libraries.product_id → products.id
├─ user_libraries.order_id → orders.id
├─ reviews.user_id → users.id
├─ reviews.product_id → products.id
├─ product_category.product_id → products.id
└─ product_category.category_id → categories.id

✨ UNIQUE CONSTRAINTS
├─ users.email
├─ products.slug
├─ categories.slug
├─ orders.order_number
├─ user_libraries(user_id, product_id)
└─ reviews(user_id, product_id)

🗑️ SOFT DELETES
├─ users.deleted_at
└─ products.deleted_at


═══════════════════════════════════════════════════════════════════════════════
                              ENUM MEZŐK
═══════════════════════════════════════════════════════════════════════════════

users.role:                  ['user', 'admin']
products.type:               ['book', 'film', 'music', 'game']
categories.type:             ['book', 'film', 'music', 'game']
orders.status:               ['pending', 'completed', 'failed', 'refunded']
orders.payment_method:       ['card', 'paypal', 'bank_transfer']


═══════════════════════════════════════════════════════════════════════════════
                           ADATTÍPUSOK ÖSSZEFOGLALÓ
═══════════════════════════════════════════════════════════════════════════════

🔢 INTEGER          id, download_count, duration, rating, download_limit
📝 STRING           name, email, title, slug, creator, phone, address, etc.
📄 TEXT             description, comment
💰 DECIMAL(10,2)    price, total_amount
📅 DATE             birth_date
🕐 TIMESTAMP        email_verified_at, paid_at, last_downloaded_at, timestamps
📊 JSON             screenshots
✅ BOOLEAN          is_active, is_approved, newsletter_subscription
🔐 HASHED           password
📆 YEAR             release_year
🗃️ BIGINT           file_size


═══════════════════════════════════════════════════════════════════════════════
                         ADATBÁZIS STATISZTIKÁK
═══════════════════════════════════════════════════════════════════════════════

📊 Táblák száma:           8
🔗 Kapcsolatok:            8 db (7x 1:N + 1x N:M)
🔑 Primary Keys:           8
🔗 Foreign Keys:           10
✨ Unique mezők:           6
🗑️ Soft Delete táblák:     2


═══════════════════════════════════════════════════════════════════════════════
                              JELMAGYARÁZAT
═══════════════════════════════════════════════════════════════════════════════

🔑  Primary Key (elsődleges kulcs)
🔗  Foreign Key (idegen kulcs)
👤  Felhasználók
📋  Rendelések
🛒  Rendelési tételek
📚  Felhasználói könyvtár
📦  Termékek
🏷️  Kategóriák
⭐  Értékelések
1:N  One to Many kapcsolat
N:M  Many to Many kapcsolat
