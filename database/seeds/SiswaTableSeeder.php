<?php

use App\Siswa;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'id_kelas' => 1,
            'nis' => 244422121,
            'photo' => 'TA',
            'name' => 'Hilmi',
            'gender' => 'Laki-laki',
            'birth_p' => 'Banyuwangi',
            'birth_d' => '1997-12-12',
            'address' => 'Dsn. Sambirejo, Kec. BAngorejo',
            'email' => 'hilmi@mail.test',
            'password' => bcrypt(12345678),
        ]);
    }
}