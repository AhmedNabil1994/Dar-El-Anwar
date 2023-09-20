<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_reveiws', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('question')->nullable();
            $table->integer('answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_reveiws');
    }
};
