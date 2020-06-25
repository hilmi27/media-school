<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'photo' => 'TA',
            'email' => 'admin@mail.test',
            'password' => bcrypt(12345678),
        ]);
    }
}