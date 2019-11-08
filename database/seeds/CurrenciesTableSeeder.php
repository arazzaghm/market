<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'USD',
        ]);

        DB::table('currencies')->insert([
            'name' => 'UAH',
        ]);

        DB::table('currencies')->insert([
            'name' => 'RUB',
        ]);

        DB::table('currencies')->insert([
            'name' => 'EUR',
        ]);
    }
}
