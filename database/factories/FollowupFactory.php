<?php

namespace Database\Factories;

use App\Models\Followup;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class FollowupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Followup::class;

    public function definition()
    {
        return [
            "instructor_id" => $this->faker->randomElement([6, 10]),
            "subject_id" => $this->faker->numberBetween(1, 4),
            "status" => $this->faker->numberBetween(0, 1),
            "type" => $this->faker->numberBetween(1, 3),
            // Add more fields here...
        ];
    }
}
