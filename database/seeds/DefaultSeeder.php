<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
          'name' => 'Administrator',
          'email' => 'administrator@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Ketandan Lama 5A, Genteng - Ketabang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Rekam Medis',
          'email' => 'rekam_medis@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Dokter Umum',
          'email' => 'dokter_umum@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Dokter KIA',
          'email' => 'dokter_kia@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Dokter Gigi',
          'email' => 'dokter_gigi@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Apoteker',
          'email' => 'apoteker@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'pegawai',
          'gender' => 'laki_laki',
          'nis' => null,
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Pasien Santri',
          'email' => 'santri@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'santri',
          'gender' => 'laki_laki',
          'nis' => '1234567891',
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Pasien Umum',
          'email' => 'umum@simpuskestren.com',
          'password' => bcrypt('12345678'),
          'address' => 'Cukir, Kec. Diwek, Kabupaten Jombang',
          'phone' => '085711111111',
          'status_pendaftaran' => 'umum',
          'gender' => 'laki_laki',
          'nis' => '1234567892',
          'created_at' => Carbon::now(),
        ]]);

        Permission::insert([
          ['name' => 'add','created_at' => Carbon::now()],
          ['name' => 'edit','created_at' => Carbon::now()],
          ['name' => 'delete','created_at' => Carbon::now()],
          ['name' => 'store','created_at' => Carbon::now()],
        ]);

        Role::insert([
          ['name' => 'admin', 'created_at' => Carbon::now(),],
          ['name' => 'rekam_medis', 'created_at' => Carbon::now(),],
          ['name' => 'dokter', 'created_at' => Carbon::now(),],
          ['name' => 'apotek', 'created_at' => Carbon::now(),],
          ['name' => 'pasien', 'created_at' => Carbon::now(),],
        ]);

        DB::table('roles_permissions')->insert([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 1, 'permission_id' => 3],
            ['role_id' => 1, 'permission_id' => 4],
        ]);

        DB::table('users_permissions')->insert([
            ['user_id' => 1, 'permission_id' => 1],
            ['user_id' => 1, 'permission_id' => 2],
            ['user_id' => 1, 'permission_id' => 3],
            ['user_id' => 1, 'permission_id' => 4],
        ]);

        DB::table('users_roles')->insert([
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2],
            ['user_id' => 3, 'role_id' => 3],
            ['user_id' => 4, 'role_id' => 3],
            ['user_id' => 5, 'role_id' => 3],
            ['user_id' => 6, 'role_id' => 4],
            ['user_id' => 7, 'role_id' => 5],
            ['user_id' => 8, 'role_id' => 5],
        ]);
    }
}
