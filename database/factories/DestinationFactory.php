<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'destination_name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'location' => $this->faker->city,
            'entrance_fee' => $this->faker->numberBetween(25000, 100000),
            'image' => 'uxovCrfc2gInIg7lrF50ZMfPBCGfEqMqFchTidMi.jpg',
        ];
    }
}
