<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/products'), $width = 640, $height = 480, 'cats', false);
        return [
            "name" => $this->faker->name(),
            'price' => rand(1,2000),
            'sale_price' => rand(5,1000),
            "cate_id" => Category::all()->random()->id,
            'details' => $this->faker->name(),
            'feature_image' => "uploads/products/" . $imgPath,
            'status'  => rand(0, 1),
        ];
    }
}
