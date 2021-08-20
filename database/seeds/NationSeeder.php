<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'England'],
            ['name' => 'Spain'],
            ['name' => 'France'],
            ['name' => 'Balgium'],
            ['name' => 'Netherland'],
            ['name' => 'Germany'],
            ['name' => 'Etaly']
        ];
        DB::table('nations')->insert($names);
    }
}
