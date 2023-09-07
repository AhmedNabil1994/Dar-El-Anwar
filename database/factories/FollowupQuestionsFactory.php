<?php

namespace Database\Factories;

use App\Models\Followup;
use App\Models\FollowupQuestions;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class FollowupQuestionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FollowupQuestions::class;

    public function definition()
    {
        return [
            "followup_id" => 'follow_up_reading',
            "type" => 'textarea',
        ];
    }
}
