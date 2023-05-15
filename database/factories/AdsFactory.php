<?php

use App\Models\Ads;
use Faker\Generator as Faker;

$factory->define(Ads::class, function (Faker $faker) {
    return [
        'name' => $faker->text(15),
        'price' => rand(1, 20000),
        'category_id' => rand(1, 4),
        'status_id' => rand(1, 2),
        'description' => $faker->text(50),
        'contact' => '+79234371382',
        'user_creat_id' => 1,
    ];
});
