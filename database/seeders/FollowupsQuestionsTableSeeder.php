<?php

namespace Database\Seeders;

use App\Models\Followup;
use App\Models\FollowupQuestions;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowupsQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FollowupQuestions::factory(20)->create(); // Adjust the number as needed

    }
}
