<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengumuman;
use Faker\Generator as Faker;

$factory->define(Pengumuman::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'desc' => $faker->paragraph(10) ,
        'cover' => 'images/pengumuman/K4U4NiSPmnV5A1ndgGd6byLzCPhIS0gk9ed0WcH0.jpeg',
        'date' => $faker->date(),
    ];
});
