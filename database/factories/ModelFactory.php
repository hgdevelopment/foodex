<?php

/*

|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\country::class, function (Faker\Generator $faker) {
   
    return [
        'countryCode' => $faker->numberBetween($min=0, $max =50),
        'countryName' => $faker->country,
        'countryId' => $faker->numberBetween($min=0, $max =50)
    ];
});



$factory->define(App\accountmaster::class, function (Faker\Generator $faker) {
   
    return [
        'bankDetails' => $faker->numberBetween($min=556666685, $max =556996685),
        'tcnType' => $faker->randomElement($array = array ('A','B','C')),
        'currencyType' => $faker->currencyCode  
    ];
});



$factory->define(App\address::class, function (Faker\Generator $faker) {

    return [
        'userId' => $faker->numberBetween($min=1, $max =20),
        'state' => $faker->state,
        'city' => $faker->city,
        'pin' => $faker->postcode,                             
        'typeOfAddress' => $faker->randomElement($array = array ('official','permanent','correspondance'))
    ];
});

$factory->define(App\login::class, function (Faker\Generator $faker) {

    return [
        'username' => $faker->numberBetween($min=1, $max =20),
        'password' => $faker->numberBetween($min=1111, $max =9999),
        'userType' => $faker->randomElement($array = array ('MEM', 'DSA', 'EMP', 'OI', 'ME')),
        'status' =>  $faker->randomElement($array = array ('Pending','Active','Block'))       
    ];
});


