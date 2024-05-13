<?php

namespace Database\Factories;

use App\Models\Volt;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoltFactory extends Factory
{
    protected $model = Volt::class;

    public function definition()
    {
        return [
            'name' => $this->faker->colorName
        ];
    }
}
