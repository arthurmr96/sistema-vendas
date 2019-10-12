<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Convenio;
use Faker\Generator as Faker;

$factory->define(Convenio::class, function (Faker $faker) {

    return [
        'cliente_id' => $faker->randomDigitNotNull,
        'valor' => $faker->word,
        'data_vencimento' => $faker->word,
        'pago' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
