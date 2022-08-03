<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SlideBanner>
 */
class SlideBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/slides'), $width = 640, $height = 480, 'cats', false);
        return [
            'title' => $this->faker->name(),
            'slides_image' => "uploads/slides/" . $imgPath,
            'status' => rand(0,1),
        ];
    }
}
