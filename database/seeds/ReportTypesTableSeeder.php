<?php

use Illuminate\Database\Seeder;

class ReportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('report_types')->insert([
           'name' => 'Scam',
           'name_ru' => 'Обман',
           'name_uk' => 'Обман',
           'model_type' => \App\Models\User::class,
       ]);

        DB::table('report_types')->insert([
            'name' => 'Scam',
            'name_ru' => 'Обман',
            'name_uk' => 'Обман',
            'model_type' => \App\Models\Company::class,
        ]);

        DB::table('report_types')->insert([
            'name' => 'Scam',
            'name_ru' => 'Обман',
            'name_uk' => 'Обман',
            'model_type' => \App\Models\Post::class,
        ]);
    }
}
