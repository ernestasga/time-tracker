<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach(range(1,200) as $index){
            Task::create([
                'user_id' => rand(1, 10),
                'title' => $faker->sentence(5),
                'comment' => $faker->sentence(20),
                'date' => $faker->dateTimeThisYear(),
                'mins_spent' => rand(5,600),
            ]);
        }
    }
}
