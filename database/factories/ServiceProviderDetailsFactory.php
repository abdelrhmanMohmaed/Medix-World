<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceProviderDetails>
 */
class ServiceProviderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = \App\Models\City::pluck('id')->toArray();
        $randomCityId = $this->faker->randomElement($city);

        $regionIds = \App\Models\Region::where('city_id', $randomCityId)->pluck('id')->toArray();

        return [
            'city_id' => $randomCityId,
            'region_id' => $this->faker->randomElement($regionIds),
            'major_id' => $this->faker->randomElement(\App\Models\Major::pluck('id')->toArray()),
            'title_id' => $this->faker->randomElement(\App\Models\Title::pluck('id')->toArray()),
            'name' => [
                'en'=> $this->faker->name(),
                'ar'=> $this->faker->name(), 
            ],
            'summary' => [
                'en'=> $this->faker->text(),
                'ar'=> $this->faker->text(),
            ],
            'address' => [
                'en'=> $this->faker->address(),
                'ar'=> $this->faker->address(),
            ],

            'price' => $this->faker->randomFloat(2, 100, 10000),
            'tel' => '+20' . $this->faker->numberBetween(1000000000, 1999999999),
            'medical_card' => $this->faker->randomElement([
                'assets/images/services/medicalCard/1.avif',
                'assets/images/services/medicalCard/2.avif',
                'assets/images/services/medicalCard/3.avif',
                'assets/images/services/medicalCard/4.avif',
                'assets/images/services/medicalCard/5.avif',
                'assets/images/services/medicalCard/6.avif',
            ]),
            'img' => $this->faker->randomElement([
                'assets/images/services/avatars/1.avif',
                'assets/images/services/avatars/2.avif',
                'assets/images/services/avatars/3.avif',
                'assets/images/services/avatars/4.avif',
                'assets/images/services/avatars/5.avif',
                'assets/images/services/avatars/6.avif',
            ]),
            'status' => $this->faker->randomElement(['Pending','Approval','Reject']),
        ];
    }
}
