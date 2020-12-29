<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_name' => $this->faker->name,
            'car_type' => $this->faker->name,
            'image' => 'product-1.jpg',
            'hire_cost' => '20000',
            'capacity' => '2',
            'year' => '2020',
            'color' => "Black",
            'chassis' => Str::random(10),
            'status' => "Available", 
        ];
    }
}
