<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriorityMaster;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  Has Manyリレーションでの作成
        PriorityMaster::truncate();
        Todo::truncate();

        $priorityMaster = PriorityMaster::factory()
            ->count(4)
            ->state(new Sequence(
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
            ))
            ->has(Todo::factory()->count(10), 'todos')
            ->create();
    }
}
