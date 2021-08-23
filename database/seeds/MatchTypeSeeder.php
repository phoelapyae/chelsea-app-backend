<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'FIXTURES'],
            ['name' => 'RESULTS'],
            ['name' => 'LEAGUE TABLES'],
            ['name' => 'DOWNLOADABLE FIXTURES'],
            ['name' => 'MATCHDAY EXPERIENCE']
        ];
        DB::table('match_types')->insert($names);
    }
}
