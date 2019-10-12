<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContasPagar;
use Faker\Generator as Faker;

$factory->define(ContasPagar::class, function (Faker $faker) {

    return [
        'valor_devido' => $faker->word,
        'valor_pago' => $faker->word,
        'pago' => $faker->word,
        'data_vencimento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
