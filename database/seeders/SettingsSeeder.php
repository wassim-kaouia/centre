<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloc1 = collect([
            'title'       => 'test1',
            'description' => 'test1',
        ])->toJson();

        $bloc2 = collect([
            'title'       => 'test2',
            'description' => 'test2',
        ])->toJson();
        
        $bloc3 = collect([
            'title'       => 'test3',
            'description' => 'test3',
        ])->toJson();

        DB::table('settings')->insert([
            'title'     => 'title',
            'subtitle'  => 'subtitle',
            'bloc1' => $bloc1,
            'bloc2' => $bloc2,
            'bloc3' => $bloc3,
        ]);   
    }
}
