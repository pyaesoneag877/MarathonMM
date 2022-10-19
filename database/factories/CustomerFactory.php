<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'phone_no'=>$this->faker->unique()->phoneNumber(),
            'city_id'=>City::factory(),
            'zone_id'=>Zone::factory(),
            'address'=>$this->faker->address()
        ];
    }
}
