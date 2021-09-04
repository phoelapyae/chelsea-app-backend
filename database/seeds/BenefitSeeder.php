<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'West Stand, middle tier'],
            ['name' => 'Three-course fine dining'],
            ['name' => 'Complimentary bar'],
            ['name' => 'Appearance by Chelsea legends'],
        ];

        DB::table('benefits')->insert($names);
    }
}
