Bagaimana cara menjalankan di local server ?

Berikut ini adalah cara menjalankan source code vanjava school di local server:

Download source code dengan klik button download di bawah ini.
Extract file
Masuk ke phpmyadmin, buat database baru dengan nama media_school (atau yang lain)
Buka folder hasil download yang sudah diextract tadi di text editor.
Buka terminal, masuk ke directory atau folder vanjava-school (folder hasil extract). Atau jika vjnetter menggunakan text editor visual studio code, vjnetter bisa menggunakan terminal di dalamnya.
Jalankan command composer install
Jika pada langkah no. 3 vjnetter menggunakan nama database lain, kalian juga perlu menyesuaikan pada file .env atau tepatnya pada line DB_DATABASE.
Langkah terakhir, jalankan command php artisan serve pada terminal.
SELESAI.
User Login:

Admin:

url: 127.0.0.1:8000/admin/login

user: admin@mail.test

pass: 12345678

Guru:

url: 127.0.0.1:8000/guru/login

user: pakguru@mail.test

pass: 12345678

Siswa:

url: 127.0.0.1:8000/siswa/login

user: ronaldo@mail.test

pass: 12345678
