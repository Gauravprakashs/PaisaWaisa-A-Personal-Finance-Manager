<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'USD', 'symbol' => '$', 'money_format_thousands' => ',', 'money_format_decimal' => '.'],
            ['id' => 2, 'title' => 'Rupiah', 'symbol' => 'Rp', 'money_format_thousands' => '.', 'money_format_decimal' => ','],
            ['id' => 3, 'title' => 'GBP', 'symbol' => '£', 'money_format_thousands' => '.', 'money_format_decimal' => ','],

        ];

        foreach ($items as $item) {
            Currency::create($item);
        }
    }
}
