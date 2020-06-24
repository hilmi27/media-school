<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'address' => 'Bangorejo',
            'birth_p' => 'Banyuwangi',
            'birth_d' => '2003-06-20',
            'email' => 'admin@mail.test',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Siswa',
            'address' => 'Bangorejo',
            'birth_p' => 'Banyuwangi',
            'birth_d' => '2003-06-20',
            'email' => 'siswa@mail.test',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('siswa');

         $user = User::create([
            'name' => 'Guru',
            'address' => 'Bangorejo',
            'birth_p' => 'Banyuwangi',
            'birth_d' => '2003-06-20',
            'email' => 'guru@mail.test',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('guru');
    }
}