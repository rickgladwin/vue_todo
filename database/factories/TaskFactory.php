<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Status;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {

    $status_id_items = Status::all(['id'])->toArray();
    $status_ids = [];

    //format of $status_id_items is [['id']]
    foreach ($status_id_items as $status_id_item) {
        array_push($status_ids, $status_id_item['id']);
    }

    return [
        'name' => $faker->text(20),
        'description' => $faker->text(100),
        'complete' => $faker->boolean(15),
        'status_id' => $faker->randomElement($status_ids),
        'target_completion_date' => $faker->dateTimeBetween('now', '+1 year')
    ];
});
