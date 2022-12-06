# Website Pos Pengaduan

[![made-with-laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/) [![made-with-bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/) [![made-with-mysql](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

Website sistem penanganan pengaduan pelanggan Kantor Pos Surabaya 60000 [PosBantuan](https://posbantuan.rgtasty.com/) merupakan sistem penanganan pengaduan berbasis website yang dibuat untuk mempermudah dalam penanganan pengaduan dengan diintegrasikan dengan fitur Telegram Bot agar proses pelayanan pelanggan dapat lebih responsive.

Untuk akses website klik [PosBantuan](https://posbantuan.rgtasty.com/) dengan akses login:
Username: admin01
Password: admin

## Fitur

- Pusat Monitoring
Halaman dashboard untuk memantau jumlah data pengaduan yang masuk, keluar, diproses, selesai diproses, jumlah sesuai kategori pengaduan, tampilan grafik jumlah pengaduan, dan grafik kinerja customer service.

- Data Pengaduan
Halaman yang berisi data-data pengaduan yang tercatat didalam database sistem pengaduan.

- Data Ganti Rugi
Halaman yang berisi data pengajuan ganti rugi dari sanksi keterlambatan, kerusakan, dan kehilangan paket.

- Bantuan
Halaman yang berisi fitur cek seri dan cek tarif pengiriman paket.

- Pengaturan Bot Telegram
Halaman yang digunakan untuk mengatur pesan di bot telegram.

- Regristrasi Akun
Halaman untuk melakukan pendaftaran akun customer service.



## Teknologi

PosBantuan menggunakan sejumlah proyek open source untuk bekerja dengan baik:
- [PHP](https://www.php.net/) - bahasa skrip dengan fungsi umum yang terutama digunakan untuk pengembangan web.
- [Laravel](https://laravel.com/) - Framework web developer berbasis PHP
- [Bootstrap](https://getbootstrap.com/) - adalah framework front-end gratis untuk pengembangan web yang lebih cepat dan lebih mudah.
- [jQuery] - adalah pustaka JavaScript yang cepat, kecil, dan kaya fitur.
- [AJAX](https://api.jquery.com/category/ajax/) - suatu teknik pemrograman berbasis web untuk menciptakan aplikasi web interaktif.
- [toastr](https://codeseven.github.io/toastr/) -  perpustakaan Javascript untuk pemberitahuan non-pemblokiran.
- [Font Awesome](https://fontawesome.com/) - toolkit font dan ikon berdasarkan CSS dan Less.
- [Google Font API](https://developers.google.com/fonts) - layanan web yang mendukung file font sumber terbuka yang dapat digunakan pada desain web Anda.
- [ECharts](https://echarts.apache.org/) - open-source JavaScript visualisation library.
- [Chart.js](https://www.chartjs.org/) - open-source JavaScript library yang memungkinkan Anda menggambar berbagai jenis bagan dengan menggunakan elemen kanvas HTML5.
- [MySQL](https://www.mysql.com/) -  sebuah sistem manajemen database relasional (Relational Database Management System – RDBMS).

## Requirement
- Laravel 9.3.0
- PHP 8.0.19
- Bootstrap 5.2
- MySQL

## Instalasi

PosBantuan membutuhkan [Laravel](https://laravel.com/) dengan versi 9.3.0 untuk dapat dijalanakan.

pastikan sudah terinstall composer dan PHP pada komputer, kemudian jalankan lokal server Laravel dengan menggunakan  Artisan CLI artisan:

```php artisan serve```



## Credit
> Irham Maulana Abid
Politeknik Elektronika Negeri Surabaya
D3 Teknik Telekomunikasi
2022