/*Install Source Code*/
0. siapkan database terlebih dahulu, beri nama simpuskestren
1. git clone *link_git_source_code*
2. masuk folder master source code nya, lakukan "composer update"
3. buat file .env, sesuaikan setting database dengan koneksi database anda (menggunakan mysql)
4. generate key (php artisan generate key)
5. masukkan data dummy dan schema database (php artisan migrate:fresh --seed)
6. aplikasi siap digunakan

/*cara menjalankan aplikasi*/
0. buka file master aplikasi
1. buka terminal/cmd pada folder file master aplikasi tsb, gunakan "php artisan serve" untuk menjalankan aplikasi
2. silakan ketikkan ip dan port yang tertera
3. untuk login akun silakan buka file "database/seeds/DefaultSeeder.php", silakan pilih akun yang ada di static method User

/*progres 1*/
0. desain database aplikasi
1. desain tampilan awal
2. membuat dummy data untuk aplikasi
3. membuat fungsi dasar untuk data master
4. membuat tampilan untuk level user pasien
