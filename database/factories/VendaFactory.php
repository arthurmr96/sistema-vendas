<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Venda;
use Faker\Generator as Faker;

$factory->define(Venda::class, function (Faker $faker) {

    return [
        'cliente_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'valor' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
