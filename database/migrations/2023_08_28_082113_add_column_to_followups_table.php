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
        Schema::table('followups', function (Blueprint $table) {
            //
            $table->bigInteger('class_number')->nullable();
            $table->dateTime('time_working')->nullable();
            $table->bigInteger('observer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followups', function (Blueprint $table) {
            //
        });
    }
};
