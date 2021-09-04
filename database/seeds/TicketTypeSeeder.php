<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypeSeeder extends Seeder
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
            ['name' => 'TICKET INFOS'],
            ['name' => 'MATCHDAY INFO'],
            ['name' => 'MEMBERSHIPS'],
            ['name' => 'SEASON TICKETS']
        ];

        DB::table('ticket_types')->insert($names);
    }
}
