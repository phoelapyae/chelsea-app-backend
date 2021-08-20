<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'GOALKEEPERS'],
            ['name' => 'DEFENDERS'],
            ['name' => 'MIDFIELDERS'],
            ['name' => 'FORWARDS'],
            ['name' => 'HEAD COACH'],
            ['name' => 'ASSISTANT COACH'],
            ['name' => 'FIRST TEAM COACH'],
            ['name' => 'GOALKEEPER COACH'],
            ['name' => 'FITNESS COACH'],
            ['name' => 'MEDICAL DIRECTOR'],
            ['name' => 'TECHNICAL DIRECTOR'],
            ['name' => 'LOAN TECHNICAL COACH'],
            ['name' => 'INTERNATIONAL SCOUNTING'],
        ];

        DB::table('positions')->insert($names);
    }
}
