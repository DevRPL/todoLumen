<?php

use Illuminate\Database\Seeder;
use App\Entities\Todo;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) {
            Todo::create([
                'user_id'  => 1,
                'title' => $faker->name,
                'body' => $faker->name,
                'description' => $faker->address
            ]);
        }
    }
}
