# 🌱 EcoBank

EcoBank adalah platform **Bank Sampah Digital** berbasis web yang dirancang untuk memudahkan manajemen penyetoran sampah (daur ulang) antara Nasabah dan Petugas Administratif (Admin). 
Aplikasi ini memungkinkan nasabah untuk melihat katalog limbah, menyetorkan sampah secara mandiri untuk dikonversi menjadi saldo (EcoWallet), dan membantu admin dalam memverifikasi setiap transaksi.

---

## 🚀 Panduan Instalasi (Development)

Berikut adalah panduan langkah demi langkah untuk menjalankan project web EcoBank jika Anda baru saja melakukan *clone* dari repository GitHub.

### 📋 Prasyarat Sistem
Pastikan komputer Anda sudah terinstal perangkat lunak berikut:
- **PHP** (Minimal versi 8.2 atau lebih baru)
- **Composer** (untuk instalasi *package* PHP Laravel)
- **Node.js & NPM** (untuk kompilasi aset *frontend* Tailwind CSS/JavaScript)
- **MySQL / MariaDB** (atau database seperti XAMPP / Laragon)
- **Git**

---

### 💻 Langkah Instalasi

**1. Clone Repository**
Buka terminal/Command Prompt Anda, lalu jalankan perintah berikut:
```bash
git clone <URL_GITHUB_REPOSITORY_ANDA>
cd echo-bank
```

**2. Instalasi Dependensi PHP (Composer)**
Jalankan perintah ini untuk menginstal seluruh package dan dependensi backend Laravel:
```bash
composer install
```

**3. Konfigurasi Environment File (.env)**
Laravel memerlukan file environment untuk konfigurasi lokal dan koneksi database.
Copy file `.env.example` lalu ubah namanya menjadi `.env`:
```bash
cp .env.example .env
# Jika di Windows Command Prompt, gunakan: copy .env.example .env
```

**4. Generate Application Key**
Buat *key* unik keamanan untuk instansi aplikasi Laravel Anda:
```bash
php artisan key:generate
```

**5. Pengaturan Database**
- Buka aplikasi XAMPP/Laragon Anda dan pastikan MySQL/MariaDB menyala (Start).
- Buat satu database kosong baru di phpMyAdmin (misal: beri nama `echo_bank`).
- Buka file `.env` yang baru Anda buat di editor kode (VS Code), dan edit baris konfigurasi berikut:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=echo_bank
DB_USERNAME=root
DB_PASSWORD=
```
*(Sesuaikan DB_PASSWORD jika database lokal Anda memiliki kata sandi)*

**6. Jalankan Migrasi Database & Data Dummy (Seeder)**
Struktur tabel database harus dibangun (termasuk tabel Users, Transactions, Waste Categories, dll). 
Jalankan komando ini untuk memigrasikan tabel sekaligus mengisi data awal (seperti Akun Admin):
```bash
php artisan migrate --seed
```

**7. Install Dependensi Frontend (Node.js)**
Unduh tools untuk framework *frontend* Vue/Blade/Tailwind yang dibutuhkan:
```bash
npm install
```

---

### 🌐 Menjalankan Aplikasi

Aplikasi membutuhkan dua terminal terbuka (satu untuk menjalankan *server backend*, satu lagi untuk mengompilasi aset *frontend* yang responsif).

**Terminal 1 (Backend - PHP artisan serve)**
```bash
php artisan serve
```
*Aplikasi akan berjalan di alamat http://127.0.0.1:8000*

**Terminal 2 (Frontend - NPM run dev)**
Buka tab terminal baru di project yang sama lalu jalankan:
```bash
npm run dev
```

---

### 🔐 Detail Akses Akun Tes
Sistem menggunakan *Role-Based Access Control* (User vs Admin).
Gunakan akun dummy ini untuk mencoba aplikasi (jika Anda sudah melakukan `--seed` sebelumnya):

**Login Admin:**
- **Email**: `admin@admin.com` *(Atau email yang sudah dikonfigurasi di DatabaseSeeder Anda)*
- **Password**: `password`

**Login Nasabah (User):**
- **Email**: `user@user.com` *(Atau buat klik register / tambah nasabah dari Panel Admin)*
- **Password**: `password`

---

## 🛠️ Stack Teknologi
- **Backend framework**: Laravel 11.x (PHP)
- **Frontend framework**: Tailwind CSS + Vanilla JS (Blade View)
- **Database**: MySQL Default
- **Auth System**: Laravel Breeze

**Selamat Berkarya Untuk Lingkungan Bersama EcoBank! ♻️**
