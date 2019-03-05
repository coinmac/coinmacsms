<?php

use Faker\Generator as Faker;

$factory->define(App\Phonebook::class, function (Faker $faker) {
    return [
        'contact_name' => $faker->name,
        'phone_number' => $faker->e164PhoneNumber,        
        'username' => 'gintec',
        'phonegroup' => 'friends',
    ];
});
