<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'PLAYERS'],
            ['name' => 'MANAGEMENT']
        ];

        DB::table('work_types')->insert($names);
    }
}
