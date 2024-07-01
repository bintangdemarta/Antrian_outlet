# Sistem Antrian

Proyek ini adalah sistem pengambilan nomor antrian yang dibuat menggunakan PHP, JavaScript, MySQL, dan SweetAlert. Sistem ini memiliki dua tampilan: satu untuk admin (penjual) dan satu untuk user (pengguna). Sistem ini dinamis dan dapat diakses di berbagai platform.

## Fitur

- Admin dapat menambahkan nomor antrian.
- Pengguna dapat mengambil nomor antrian.
- SweetAlert digunakan untuk menampilkan notifikasi yang menarik.
- Responsive design untuk berbagai perangkat.

## Teknologi yang Digunakan

- PHP
- JavaScript
- MySQL
- SweetAlert
- HTML/CSS

## Struktur Direktori
<code>
antrian/
│
├── admin/
│ └── index.php
├── css/
│ └── style.css
├── js/
│ └── script.js
├── user/
│ └── index.php
├── db.php
└── index.php
<code>

## Langkah Instalasi

1. Clone repository ini.
2. Import database:
    - Buat database dengan nama `antrian_db`.
    - Import file SQL berikut untuk membuat tabel:

    ```sql
    CREATE DATABASE antrian_db;
    USE antrian_db;

    CREATE TABLE antrian (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nomor_antrian INT NOT NULL,
        status ENUM('waiting', 'called') DEFAULT 'waiting'
    );
    ```

3. Ubah konfigurasi database di `db.php` sesuai dengan pengaturan Anda.

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "antrian_db";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

4. Jalankan server lokal Anda (misalnya, menggunakan XAMPP atau WAMP) dan akses `index.php` melalui browser.

## Penggunaan

### Admin

1. Akses halaman admin di `admin/index.php`.
2. Tambahkan nomor antrian melalui form yang tersedia.
3. Nomor antrian yang berhasil ditambahkan akan ditampilkan di tabel di bawah form.

### User

1. Akses halaman user di `user/index.php`.
2. Halaman akan menampilkan nomor antrian yang sedang dipanggil.
3. Klik tombol "Ambil Nomor Antrian" untuk memperbarui nomor antrian yang ditampilkan.

## Screenshots

### Halaman Utama

![Halaman Utama](screenshots/home.png)

### Halaman Admin

![Halaman Admin](screenshots/admin.png)

### Halaman User

![Halaman User](screenshots/user.png)

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).


