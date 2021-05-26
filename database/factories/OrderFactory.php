<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => 'DH' . $this->faker->numberBetween(100000, 999999),
            'user_id' => $this->faker->numberBetween(1, 20),
            'address' => $this->faker->address,
            'total_price' => 0,
            'status' => $this->faker->numberBetween(1, 4),
        ];
    }
}
