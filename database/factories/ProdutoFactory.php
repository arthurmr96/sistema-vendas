<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'descricao' => $faker->text,
        'tipo' => $faker->word,
        'preco_custo' => $faker->word,
        'valor' => $faker->word,
        'quantidade' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
