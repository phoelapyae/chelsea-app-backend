<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'MEN'],
            ['name' => 'WOMEN'],
            ['name' => 'ACADEMY'],
            ['name' => 'ON LOAN']
        ];

        DB::table('team_types')->insert($names);
    }
}
