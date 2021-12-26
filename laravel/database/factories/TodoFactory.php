<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Todo;
use App\Models\PriorityMaster;

class TodoFactory extends Factory
{
    /**
     * モデルに対応したファクトリの名前
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'priority_id' => PriorityMaster::class,
            'content' => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
        ];
    }
}
