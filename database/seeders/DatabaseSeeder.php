<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencySeeder::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(UserSeedPivot::class);
        $this->call(RoleSeedPivot::class);
        // $this->call(ExpenseCategorySeeder::class);
        // $this->call(IncomeCategorySeeder::class);
    }
}
