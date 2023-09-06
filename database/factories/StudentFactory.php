<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name, // updated from $request->first_name
            'code' =>  mt_rand(1000, 9999), // updated from $request->first_name
            'email' => $this->faker->email, // updated from $request->first_name
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement([1, 2]),
            'about_me' => $this->faker->text,
            'birthdate' => $this->faker->date,
            'status' => 1,
            'city_id' => 173, // newly added
            'branch_id' => $this->faker->randomElement([1, 2, 3]), // newly added
            'period' => $this->faker->randomElement([1, 2, 3]), // newly added
            'bus' => $this->faker->randomElement([0, 1]), // newly added
            'blood_type' => $this->faker->randomElement([0, 1]), // newly added
            'joining_date' => $this->faker->date, // newly added
            'department_id' => $this->faker->randomElement([12, 13, 14]), // newly added
            'subject_id' => $this->faker->randomElement([1, 2, 4, 3]), // newly added
            'appointment' => $this->faker->date, // newly added
            'classroom' => 0, // newly added
            'password' =>  Hash::make($this->faker->password), // newly added
            // Add more fields here...
        ];
    }
}
