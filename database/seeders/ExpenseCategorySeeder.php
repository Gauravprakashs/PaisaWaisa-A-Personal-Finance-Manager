<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1, 5) as $id)
        {
            ExpenseCategory::create([
                'name' => $faker->unique()->text(12),
                'user_id' => 1
            ]);
        }

    }
}
