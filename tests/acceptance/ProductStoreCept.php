<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();

$I = new AcceptanceTester($scenario);
$I->wantTo('store an item');

$faker->seed(rand(1,1000));

$param = array(
        'name' => $faker->name,
        'slug' => $faker->sentence(rand(5,12)),
        'description' => $faker->text(rand(50,100)),
        'shortDescription' => $faker->sentence(rand(5,12)),
        'metaDescription' => $faker->sentence(rand(5,12)),
        'metaKeywords' => $faker->sentence(rand(5,12)),
);

$I->sendPOST('/product/store', $param);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 'ok'));