<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuyTicketStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'SEAT SELECTION'],
            ['name' => 'SHOPPING CART'],
            ['name' => 'PAYMENT'],
            ['name' => 'CONFIRMATION']
        ];
        DB::table('buy_ticket_steps')->insert($names);
    }
}
