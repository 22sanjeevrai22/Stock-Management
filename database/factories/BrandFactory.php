<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandName =  $this->faker->company;
        $slug = Str::slug($brandName);

        $suffix = 1;
        while (Brand::where('slug', $slug)->exists()) {
            $slug = Str::slug($brandName) . '-' . $suffix++;
        }

        return [
            'name' => $brandName,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
        ];
    }
}
