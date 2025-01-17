<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $supplierName = $this->faker->unique()->company;
        return [
            'name' => $supplierName,
            'slug' => Str::slug($supplierName),
            'contact' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,


        ];
    }
}
