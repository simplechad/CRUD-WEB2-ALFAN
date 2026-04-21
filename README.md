# 👟 Kicks Market - Sneaker Inventory System

Aplikasi web berbasis **Laravel 12** untuk mengelola data inventaris produk *sneakers* toko e-commerce. Aplikasi ini dibuat dengan fungsionalitas CRUD (Create, Read, Update, Delete) yang lengkap dan antarmuka yang bersih (*clean design*) menggunakan **Tailwind CSS**.

## ✨ Fitur Utama

- **Manajemen Inventaris**: Menambahkan, melihat detail, mengedit, dan menghapus produk sneaker.
- **Pencarian Produk**: Mencari produk berdasarkan Nama atau Brand secara *real-time* via *query string*.
- **Filter Otomatis (*Auto-Apply*)**: Menyaring tampilan produk berdasarkan **Brand**. Fitur ini akan otomatis memuat ulang data saat *dropdown* dipilih.
- **Pengurutan Otomatis (*Auto-Apply*)**: Mengurutkan produk berdasarkan:
  - Data Terbaru
  - Nama (A-Z, Z-A)
  - Harga (Termurah ke Termahal, Termahal ke Termurah)
- **Tampilan Responsif**: Desain UI sederhana dan responsif di berbagai ukuran perangkat, dibangun tanpa mengandalkan library eksternal yang berat (murni menggunakan Tailwind CDN).

## 💻 Tech Stack

- **Framework Backend**: Laravel 12
- **Database**: SQLite (Tanpa perlu konfigurasi server MySQL)
- **Frontend / Styling**: Blade Templating Engine + Tailwind CSS (via CDN)

## 🚀 Cara Instalasi & Menjalankan di Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer lokal:

1. **Clone repository ini**
   ```bash
   git clone https://github.com/simplechad/CRUD-WEB2-ALFAN.git
   cd CRUD-WEB2-ALFAN
