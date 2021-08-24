<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'opponent_id' => 1,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 2,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 3,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 4,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 5,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 6,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 7,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 8,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 9,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 10,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 11,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 12,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 13,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 14,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 15,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 16,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 17,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 18,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 19,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ],
            [
                'opponent_id' => 20,
                'pwal' => 2,
                'win' => 2,
                'draw' => 0,
                'lose' => 0,
                'GF' => 8,
                'GD' => 3,
                'GA' => 5,
                'pts' => 6
            ]
        ];

        DB::table('league_tables')->insert($rows);
    }
}
