<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'company_name' => $this->faker->company,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'start_date' => '2011-06-01',
            'end_date' => '2020-01-01',
            'responsibilities' => $this->faker->paragraph,
        ];
    }
}
