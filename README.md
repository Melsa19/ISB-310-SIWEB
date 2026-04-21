# CRUD PHP Native

## 1. Overview Project

Proyek ini merupakan aplikasi berbasis web sederhana yang mengimplementasikan operasi dasar **CRUD (Create, Read, Update, Delete)** menggunakan PHP Native, HTML, CSS, dan JavaScript murni tanpa bantuan _framework_.

Sistem ini dirancang untuk mengelola data pengguna (berupa Nama dan Email) dengan beberapa fitur validasi sebagai berikut:

- **Validasi Input Kosong:** Mencegah pengguna mengirimkan form jika ada kolom yang belum diisi.
- **Validasi Format Email:** Memastikan input pada kolom email memiliki format yang valid.
- **Validasi Duplikasi:** Sistem akan mengecek database terlebih dahulu untuk memastikan username dan email yang diinputkan belum terdaftar.
- **Notifikasi/Alert:** Menampilkan pesan berhasil atau pesan error langsung di halaman aplikasi ketika pengguna melakukan aksi (seperti _insert_ data).

Aplikasi ini dibungkus dengan antarmuka pengguna (UI) berdesain _card_ minimalis yang diletakkan persis di tengah layar.

## 2. Struktur Direktori

Sesuai dengan _repository_ proyek, berikut adalah struktur file dan direktori yang digunakan:

```text
├── week 6/
│   ├── delete.php     # Logika backend untuk menghapus data
│   ├── index.php      # Halaman utama (Form Create) dan logika insert data
│   ├── koneksi.php    # Konfigurasi penghubung antara PHP dan MySQL
│   ├── read.php       # Halaman untuk menampilkan list data dari database
│   ├── style.css      # Styling tampilan UI aplikasi
│   └── update.php     # Halaman form edit dan logika update data
├── crud_php.sql       # File export database
└── README.md          # Dokumentasi proyek
```

## 3. Penjelasan Teknis

Berikut adalah penjelasan fungsionalitas dari setiap file:

- **`crud_php.sql`**: Berisi _query_ DDL (Data Definition Language) untuk membuat database `crud_php` dan tabel `users` beserta atributnya (`id`, `name`, `email`). File ini digunakan untuk inisialisasi awal di phpMyAdmin.
- **`koneksi.php`**: Menggunakan fungsi `mysqli_connect()` untuk membangun jembatan komunikasi antara aplikasi web dan server database MySQL. File ini di-_require_ di seluruh file yang membutuhkan akses database.
- **`index.php` (Create)**: Menangani form _input_ data baru. Dilengkapi dengan atribut HTML5 seperti `required` dan `type="email"` untuk validasi sisi _client_. Pada sisi _server_, terdapat pengecekan menggunakan `mysqli_query()` untuk mencegah duplikasi data sebelum menjalankan _query_ `INSERT`.
- **`read.php` (Read)**: Menjalankan _query_ `SELECT * FROM users ORDER BY id DESC` untuk menarik seluruh data dan menampilkannya melalui perulangan `while()`. Baris data ini juga menampung tombol navigasi ke halaman Update dan proses Delete.
- **`update.php` (Update)**: Menangkap parameter `id` melalui metode HTTP GET dari URL, melakukan _query_ ke database, dan mengisi form dengan data yang sudah ada. Saat disubmit, file ini mengeksekusi _query_ `UPDATE` untuk mengubah data spesifik.
- **`delete.php` (Delete)**: Berjalan di latar belakang (tanpa UI spesifik) untuk mengeksekusi _query_ `DELETE` berdasarkan parameter `id`. Pada halaman `read.php`, tombol yang mengarah ke file ini dilengkapi atribut JavaScript sederhana `onclick="return confirm('Are you sure?')"` untuk mencegah penghapusan data yang tidak disengaja.
- **`style.css`**: Memanfaatkan properti CSS Flexbox (`display: flex`, `justify-content: center`, `align-items: center`) pada tag `body` untuk menempatkan kontainer utama tepat di tengah layar. Mengatur elemen visual seperti warna tombol, _padding_, form _input_, dan warna dinamis untuk notifikasi berhasil/gagal.
