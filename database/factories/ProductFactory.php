<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'cat_id' => \App\Category::all()->random()->id,
        'brand_id' => \App\Brand::all()->random()->id,
        'name' => $faker->name,
        'price' => $faker->randomNumber(3),
        'image' => "http://lorempixel.com/400/200/sports/",
    ];
});
