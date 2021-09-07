<?php

use Illuminate\Database\Seeder;

class ClubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'BUY TICKETS'],
            ['name' => 'MATCHDAY PACKAGES'],
            ['name' => 'WESTVIEW'],
            ['name' => 'ANNUAL VIP PACKAGES'],
            ['name' => 'MEMBERS AREA'],
            ['name' => 'CONTACT HOSPITALITY']
        ];

        DB::table('club_categories')->insert($names);
    }
}
