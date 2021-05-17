<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'name' => $this->faker->name,
            'code' => 'SP' . $this->faker->numberBetween(100000, 999999),
            'price' => $this->faker->numberBetween(10000, 500000),
            'quantity' => $this->faker->randomDigitNotNull,
            'description' => $this->faker->text($maxNbChars = 500),
            'images' => $this->faker->imageUrl($width = 480, $height = 640),
            'rate' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2),
            'weight' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
            'status' => $this->faker->numberBetween($min = 0, $max = 2),
        ];
    }
}
