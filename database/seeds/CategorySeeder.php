<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'LATEST NEWS'],
            ['name' => 'TRANSFER NEWS'],
            ['name' => 'MATCH PREVIEW'],
            ['name' => 'HISTORY'],
            ['name' => 'INTERVIEW'],
            ['name' => 'EVENTS'],
            ['name' => 'FOUNDATION']
        ];

        DB::table('categories')->insert($names);
    }
}
