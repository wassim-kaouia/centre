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
        DB::table('settings')->insert([
            'title'     => 'title',
            'subtitle'  => 'subtitle',
            'bloc1' => "{'title' : 'title1','description' : 'description 1'}",
            'bloc2' => "{'title' : 'title2','description' : 'description 2'}",
            'bloc3' => "{'title' : 'title3','description' : 'description 3'}",
        ]);   
    }
}
