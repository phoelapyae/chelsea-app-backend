<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competitions = [
            ['name' => 'Premier League'],
            ['name' => 'Champion League'],
            ['name' => 'FA Cup'],
            ['name' => 'Carabong Cup'],
            ['name' => 'Club World Cup']
        ];

        DB::table('competitions')->insert($competitions);
    }
}
