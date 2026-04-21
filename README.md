# CRUD PHP Native 

Proyek ini adalah tugas praktikum sistem informasi web sederhana yang mengimplementasikan fungsi CRUD (*Create, Read, Update, Delete*) menggunakan **PHP Native** dan database **MySQL**.

## Fitur Utama
Sesuai dengan persyaratan tugas, sistem ini mencakup:
* **Create Data**: Menambahkan data username dan email.
* **Validasi Input**:
    * Mencegah input jika username atau email sudah terdaftar di database.
    * Validasi format email (harus mengandung `@` dan domain).
    * Validasi field tidak boleh kosong.
* **Read Data**: Menampilkan data dari database ke dalam tabel HTML.
* **Update Data**: Mengubah data yang sudah ada.
* **Delete Data**: Menghapus data dari database.
* **Notifikasi**: Pesan sukses atau error (alert) setelah melakukan aksi.


## Struktur Folder
```bash
Week6/
├── koneksi.php    # Konfigurasi koneksi ke database MySQL
├── index.php      # Halaman utama & Form Create Data
├── read.php       # Halaman untuk menampilkan daftar user
├── update.php     # Halaman edit data
├── delete.php     # Script proses hapus data
└── style.css      # File styling CSS