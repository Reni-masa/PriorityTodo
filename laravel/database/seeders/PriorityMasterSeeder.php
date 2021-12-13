<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priority_masters')->insert([
            [
                'id' => 1,
                'name' => "緊急、且つ重要",
            ],
            [
                'id' => 2,
                'name' => "緊急ではないが重要",
            ],
            [
                'id' => 3,
                'name' => "緊急だが重要ではない",
            ],
            [
                'id' => 4,
                'name' => "緊急でも重要でもない",
            ],
        ]);
    }
}
