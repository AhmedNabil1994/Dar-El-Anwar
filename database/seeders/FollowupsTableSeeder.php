<?php

namespace Database\Seeders;

use App\Models\Followup;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Followup::factory(50)->create(); // Adjust the number as needed

    }
}
