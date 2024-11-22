## Task Management User

Sebuah aplikasi manajemen tugas berbasis web menggunakan Laravel, memungkinkan pengguna untuk menambah, memperbarui, dan menghapus tugas dengan fitur upload gambar dengan fitur authentikasi menggunakan Fortify.

## Fitur

- Autentikasi (Login, Logout, Registrasi, Reset Password, Verify Email).
- CRUD Task (Create, Read, Update, Delete).
- Upload gambar pada setiap tugas.
- Update status task (Pending/Completed).

## Persyartan Sistem

Sebelum menjalankan proyek, pastikan anda sudah menginstall:

- PHP
- Composer
- Database
- Git
- Mailtrap

## Installasi

1. Clone Repository
    Gunakan perintah berikut di terminal favorit anda:
    git clone https:/github.com/apriyes204/task-management.git
    cd task-management
   
3. Install Dependencies
    Jalankan perintah berikut:
    composer install
   
5. Setup Environment
   
   - Copy .env dari .env.example dengan perintah berikut:
    cp .env.example .env

   - Buat kunci baru di projek anda
    php artisan key:generate

   - Tambahkan direktori untuk laravel mengakses file
    php artisan storage:link

   - Buka file .env kemudian ubah beberapa konfigurasi berikut:
        - DB_CONNECTION= {Sesuaikan dengan type database anda, MYSQL/PGSQL}
        - DB_PORT= {Gunakan port sesuai database server anda, 3306 adalah port standar}
        - DB_USERNAME= {Sesuaikan dengan database server anda, root adalah username standar}
        - DB_HOST= {Sesuaikan dengan hostname database server anda, 127.0.0.1 jika anda menggunakan database lokal}
        - DB_DATABASE= {Sesuaikan dengan database server anda}
        - DB_PASSWORD= {Sesuaikan dengan database server anda, biasanya kosong jika anda menggunakan pengaturan database default}

    - Silahkan anda buat akun mailtrap untuk konfigurasi email berikut:
        - MAIL_MAILER=smtp
        - MAIL_HOST=smtp.mailtrap.io
        - MAIL_PORT=2525
        - MAIL_USERNAME=your_mailtrap_username
        - MAIL_PASSWORD=your_mailtrap_password
        - MAIL_ENCRYPTION=null
        - MAIL_FROM_ADDRESS=your_email@example.com
        - MAIL_FROM_NAME="${APP_NAME}"

6. Migrasikan database anda dengan perintah berikut di terminal:
   php artisan migrate --seed

8. Jalankan project di server lokal dengan perintah berikut di terminal:
   php artisan serve

## Catatan
Saya sangat berterima kasih atas apresiasi dan dukungan anda untuk memberikan bintang pada repositori ini.
