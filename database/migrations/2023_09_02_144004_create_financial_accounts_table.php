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
        Schema::create('financial_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('trans_no');
            $table->date('student_id');
            $table->date('branch_id');
            $table->date('name');
            $table->string('description');
            $table->decimal('amount', 10, 2); // Example: 12345.67
            $table->enum('transaction_type', ['income', 'expense']); // Transaction type: income or expense
            // Add other relevant fields as needed
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
        Schema::dropIfExists('financial_accounts');
    }
};
