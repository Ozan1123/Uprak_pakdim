<p align="center">
  <h1 align="center">🛒 TokoKu API</h1>
  <p align="center">
    <strong>Backend RESTful API untuk Platform E-Commerce</strong>
  </p>
  <p align="center">
    Dibangun dengan Laravel 12 &bull; Diamankan dengan Laravel Sanctum
  </p>
</p>

---

## 🚀 Tentang Proyek

**TokoKu API** adalah backend RESTful API untuk platform e-commerce sederhana yang dikembangkan sebagai proyek Ujian Praktik. API ini menyediakan layanan lengkap mulai dari autentikasi pengguna berbasis token, manajemen katalog (kategori & produk), hingga sistem transaksi pesanan yang terintegrasi dengan manajemen stok otomatis.

### ✨ Fitur Utama

| Fitur | Deskripsi |
|---|---|
| 🔐 **Autentikasi Token** | Register, Login, Logout, dan Profile menggunakan Laravel Sanctum |
| 📂 **Manajemen Kategori** | CRUD kategori dengan proteksi relasi terhadap produk |
| 📦 **Manajemen Produk** | CRUD produk dengan dukungan pagination dan validasi input |
| 🛍️ **Sistem Pesanan** | Pembuatan order dengan `DB::transaction`, pengecekan & pemotongan stok otomatis, serta kalkulasi total harga |
| 🔒 **Proteksi Route** | Endpoint sensitif dilindungi middleware `auth:sanctum` |
| 📄 **Konsistensi Response** | Seluruh endpoint mengembalikan format JSON yang seragam |

---

## 🛠️ Tech Stack

| Teknologi | Versi / Detail |
|---|---|
| **Framework** | Laravel 12 (laravel/framework `^13.8`) |
| **Bahasa** | PHP `^8.3` |
| **Autentikasi** | Laravel Sanctum `^4.3` |
| **Database** | MySQL |
| **Testing Tool** | Postman (20 skenario endpoint) |
| **Version Control** | Git & GitHub |
| **Local Server** | Laragon |

---

## 👥 Tim Pengembang & Kontribusi

Proyek ini dikembangkan secara kolaboratif oleh **7 anggota tim** dengan pembagian tanggung jawab yang jelas:

| No | Nama | Peran | Tanggung Jawab |
|:---:|---|---|---|
| 1 | **Fauzan** | Backend Lead | Bertanggung jawab atas arsitektur keamanan aplikasi menggunakan Laravel Sanctum, termasuk pembuatan `AuthController` yang menangani fitur Register, Login, Logout, dan Profile. |
| 2 | **Desi** | Database Architect | Merancang seluruh struktur database, membuat file Migration untuk setiap tabel, mendefinisikan relasi antar Eloquent Model, serta menyiapkan Database Seeder untuk data dummy. |
| 3 | **Awa** | API Developer — Catalog | Membangun `CategoryController` untuk pengelolaan etalase kategori toko, termasuk validasi input dan proteksi penghapusan kategori yang masih memiliki produk. |
| 4 | **Rahman** | API Developer — Product | Membangun `ProductController` dengan fitur CRUD lengkap, dukungan pagination, serta validasi data produk pada setiap operasi. |
| 5 | **Yanuar** | API Developer — Transaction | Membangun `OrderController` yang mengimplementasikan `DB::transaction` untuk menjamin atomicity pada proses pengecekan stok, pemotongan stok, kalkulasi total harga, dan pencatatan pesanan. |
| 6 | **Quin** | DevOps & Integration | Menginisiasi proyek Laravel, mengelola repositori Git, menyelesaikan merge conflict antar branch, dan menyatukan seluruh modul kode menjadi satu kesatuan yang fungsional. |
| 7 | **Rehan** | QA Engineer | Melakukan pengujian menyeluruh terhadap **20 skenario endpoint** menggunakan Postman, menerapkan script auto-token untuk otomatisasi header, dan mendokumentasikan seluruh hasil pengujian API. |

---

## ⚙️ Panduan Instalasi Lokal

### Prasyarat

Pastikan sistem Anda telah terinstal:

- **PHP** ≥ 8.3
- **Composer** ≥ 2.x
- **MySQL** ≥ 8.x
- **Git**

### Langkah-Langkah Instalasi

**1. Clone Repositori**

```bash
git clone https://github.com/username/Api_Ecomers.git
cd Api_Ecomers
```

**2. Install Dependensi PHP**

```bash
composer install
```

**3. Konfigurasi Environment**

```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tokoku_db
DB_USERNAME=root
DB_PASSWORD=
```

**4. Generate Application Key**

```bash
php artisan key:generate
```

**5. Jalankan Migrasi & Seeder**

```bash
php artisan migrate --seed
```

> Perintah ini akan membuat seluruh tabel yang dibutuhkan dan mengisi data dummy (users, categories, products, orders, dan order items).

**6. Jalankan Server Lokal**

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.

---

## 📡 Ringkasan Endpoint API

> **Base URL:** `http://localhost:8000/api`
>
> 🔓 = Public (tanpa token) &nbsp;&nbsp;|&nbsp;&nbsp; 🔐 = Protected (memerlukan Bearer Token)

### 🔑 Authentication

| Method | Endpoint | Akses | Deskripsi |
|:---:|---|:---:|---|
| `POST` | `/auth/register` | 🔓 | Mendaftarkan pengguna baru |
| `POST` | `/auth/login` | 🔓 | Login dan mendapatkan access token |
| `POST` | `/auth/logout` | 🔐 | Logout dan menghapus token aktif |
| `GET` | `/auth/profile` | 🔐 | Mengambil data profil pengguna |

### 📂 Categories

| Method | Endpoint | Akses | Deskripsi |
|:---:|---|:---:|---|
| `GET` | `/categories` | 🔓 | Mengambil seluruh daftar kategori |
| `GET` | `/categories/{id}` | 🔓 | Mengambil detail kategori beserta produknya |
| `POST` | `/categories` | 🔐 | Membuat kategori baru |
| `PUT` | `/categories/{id}` | 🔐 | Memperbarui data kategori |
| `DELETE` | `/categories/{id}` | 🔐 | Menghapus kategori (gagal jika memiliki produk) |

### 📦 Products

| Method | Endpoint | Akses | Deskripsi |
|:---:|---|:---:|---|
| `GET` | `/products` | 🔓 | Mengambil daftar produk (dengan pagination) |
| `GET` | `/products/{id}` | 🔓 | Mengambil detail produk |
| `POST` | `/products` | 🔐 | Menambahkan produk baru |
| `PUT` | `/products/{id}` | 🔐 | Memperbarui data produk |
| `DELETE` | `/products/{id}` | 🔐 | Menghapus produk |

### 🛍️ Orders

| Method | Endpoint | Akses | Deskripsi |
|:---:|---|:---:|---|
| `GET` | `/orders` | 🔐 | Mengambil daftar pesanan milik user |
| `POST` | `/orders` | 🔐 | Membuat pesanan baru (otomatis cek & potong stok) |
| `GET` | `/orders/{id}` | 🔐 | Mengambil detail pesanan (hanya milik user) |
| `PATCH` | `/orders/{id}/status` | 🔐 | Memperbarui status pesanan (`pending`, `processing`, `done`, `cancelled`) |

---

## 🔐 Autentikasi

TokoKu API menggunakan **Laravel Sanctum** dengan mekanisme **Bearer Token**. Untuk mengakses endpoint yang dilindungi (🔐), sertakan header berikut pada setiap request:

```
Authorization: Bearer {your-access-token}
```

**Alur autentikasi:**

```
Register/Login  →  Dapatkan Token  →  Gunakan Token di Header  →  Akses Endpoint Protected
```

---

## 📁 Struktur Proyek

```
Api_Ecomers/
├── app/
│   ├── Http/Controllers/Api/
│   │   ├── AuthController.php        # Autentikasi (Register, Login, Logout, Profile)
│   │   ├── CategoryController.php    # CRUD Kategori
│   │   ├── ProductController.php     # CRUD Produk
│   │   └── OrderController.php       # Manajemen Pesanan & Transaksi
│   └── Models/
│       ├── User.php                  # Model pengguna dengan Sanctum trait
│       ├── Category.php              # Model kategori (hasMany products)
│       ├── Product.php               # Model produk (belongsTo category)
│       ├── Order.php                 # Model pesanan (belongsTo user, hasMany items)
│       └── OrderItem.php             # Model item pesanan (belongsTo order & product)
├── database/
│   ├── migrations/                   # Skema tabel database
│   └── seeders/                      # Data dummy untuk testing
├── routes/
│   └── api.php                       # Definisi seluruh route API
└── ...
```

---

## 📜 Contoh Request & Response

### Register

**Request:**

```http
POST /api/auth/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response (201 Created):**

```json
{
    "success": true,
    "message": "Registrasi berhasil.",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "token": "1|abc123..."
    }
}
```

### Buat Pesanan

**Request:**

```http
POST /api/orders
Authorization: Bearer {token}
Content-Type: application/json

{
    "notes": "Tolong packing yang rapi",
    "items": [
        { "product_id": 1, "quantity": 2 },
        { "product_id": 3, "quantity": 1 }
    ]
}
```

**Response (201 Created):**

```json
{
    "success": true,
    "message": "Pesanan berhasil dibuat.",
    "data": {
        "id": 1,
        "user_id": 1,
        "total_price": 150000,
        "status": "pending",
        "notes": "Tolong packing yang rapi",
        "items": [...]
    }
}
```

---

<p align="center">
  Dibuat dengan ❤️ oleh <strong>Tim TokoKu</strong> — Ujian Praktik 2026
</p>
