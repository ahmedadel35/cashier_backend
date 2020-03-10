<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bill;
use App\Brand;
use App\Type;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    $brand = factory(Brand::class)->create();
    $q = $faker->randomFloat(4, 0, 1000);
    $price = $brand->price;
    return [
        'typeId' => factory(Type::class),
        'brandId' => $brand->id,
        'quantity' => $q,
        'price' => $price,
        'value' => $q * $price,
        'state' => ['hot', 'cold'][rand(0, 1)]
    ];
});
