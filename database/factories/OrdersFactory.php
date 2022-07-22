<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "product_id" => Product::all()->random()->id,
            "order_qtyProduct" => rand(1,2000),
            "order_totalProduct" => rand(1,1000),
            "user_id" => User::all()->random()->id,
            "order_orderStatus" => rand(0,10),
        ];
    }
}
