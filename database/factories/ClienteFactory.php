<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'sobrenome' => $faker->word,
        'telefone' => $faker->randomDigitNotNull,
        'email' => $faker->word,
        'celular' => $faker->randomDigitNotNull,
        'endereco' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
