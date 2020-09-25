<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(20),
        'phone' => $faker->tollFreePhoneNumber,
        'img_thumbnail' => $faker->randomElement(['Profile (1).jpg', 'Profile (2).jpg', 'Profile (3).jpg', 'Profile (4).jpg', 'Profile (5).jpg']),
        'attach_reference' => 'HtGYaZxnOQpukIL5aw4U1592429898413',
        'developer' => $faker->randomElement([0, 1]),
        'admin' => $faker->randomElement([0, 1]),
        'filter' => $faker->randomElement([0, 1]),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_es' => $faker->word,
        'category_en' => $faker->word,
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'tag_es' => $faker->word,
        'tag_en' => $faker->word,
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Serie::class, function (Faker $faker) {
    return [
        'serie_es' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'serie_en' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->safeEmail,
        'language' => $faker->randomElement(['es', 'en']),
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Collaborator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'country' => $faker->country,
        'phone' => $faker->tollFreePhoneNumber,
        'info_es' => $faker->sentences($nb = 3, $asText = true),
        'info_en' => $faker->sentences($nb = 3, $asText = true),
        'img_thumbnail' => $faker->randomElement(['Profile (1).jpg', 'Profile (2).jpg', 'Profile (3).jpg', 'Profile (4).jpg', 'Profile (5).jpg']),
        'website' => $faker->url,
        'attach_reference' => 'HtGYaZxnOQpukIL5aw4U1592429898413',
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'role' =>  $faker->sentence($nb = 3, $asText = true),
        'role_en' =>  $faker->sentence($nb = 3, $asText = true),
        'country' => $faker->country,
        'instagram' => $faker->url,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'youtube' => $faker->url,
        'img_thumbnail' => $faker->randomElement(['Profile (1).jpg', 'Profile (2).jpg', 'Profile (3).jpg', 'Profile (4).jpg', 'Profile (5).jpg']),
        'website' => $faker->url,
        'attach_reference' => 'HtGYaZxnOQpukIL5aw4U1592429898413',
        'status' => 1,
        'deleted_at' => NULL
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title_es' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'title_en' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'short_description_es' => $faker->sentences($nb = 3, $asText = true),
        'short_description_en' => $faker->sentences($nb = 3, $asText = true),
        'full_content_es' => '<p class="MsoNormal" style="line-height: 1.8;"><span style="line-height: 107%; font-size: 17px; color: rgb(0, 0, 0);">Historian Mark Noll once famously worried about the scandal of the evangelical mind, contending that Christians had turned their backs on the academic world. Decades before Noll’s concern, a small group of leaders were laying the groundwork for developing the Christian mind in the church’s pews.</span></p><p class="MsoNormal"><span style="font-size: 17px; color: rgb(0, 0, 0);">The quest accelerated after World War II, thanks to writers and thin﻿kers such as C. S. Lewis, Francis Schaeffer, and Carl Henry. Blending theology, philosophy, and other academic tools for popular evangelical audiences, they wanted Christians to use their minds, as well as their hearts, in the full and in-depth research in this new book, To Think Christianly: A History of L’Abri, Regent College, and the Christian Study Center Movement.</span></p>',
        'full_content_en' => '<p class="MsoNormal" style="line-height: 1.8;"><span style="line-height: 107%; font-size: 17px; color: rgb(0, 0, 0);">Historian Mark Noll once famously worried about the scandal of the evangelical mind, contending that Christians had turned their backs on the academic world. Decades before Noll’s concern, a small group of leaders were laying the groundwork for developing the Christian mind in the church’s pews.</span></p><p class="MsoNormal"><span style="font-size: 17px; color: rgb(0, 0, 0);">The quest accelerated after World War II, thanks to writers and thin﻿kers such as C. S. Lewis, Francis Schaeffer, and Carl Henry. Blending theology, philosophy, and other academic tools for popular evangelical audiences, they wanted Christians to use their minds, as well as their hearts, in the full and in-depth research in this new book, To Think Christianly: A History of L’Abri, Regent College, and the Christian Study Center Movement.</span></p>',
        'url_es' => $faker->slug,
        'url_en' => $faker->slug,
        'author_id' => 0,
        'img_thumbnail' => $faker->randomElement(['Article Picture (1).jpg', 'Article Picture (2).jpg', 'Article Picture (3).jpg', 'Article Picture (4).jpg', 'Article Picture (5).jpg', 'Article Picture (6).jpg', 'Article Picture (7).jpg', 'Article Picture (8).jpg', 'Article Picture (9).jpg', 'Article Picture (10).jpg', 'Article Picture (11).jpg', 'Article Picture (12).jpg', 'Article Picture (13).jpg',]),
        'attach_reference' => '5TVGaLAhHwrNWbv5OD3D1598559086947',
        'deleted_at' => NULL
    ];
});