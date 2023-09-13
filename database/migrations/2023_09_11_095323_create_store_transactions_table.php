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
        Schema::create('store_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('permission_number')->unique();
            $table->string('movement_type'); // In or Out
            $table->string('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamp('movement_date')->useCurrent();
            $table->string('supplier')->nullable();
            $table->string('receiver')->nullable();
            $table->decimal('balance_after_movement', 10, 2);
            $table->decimal('current_balance', 10, 2);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('store_transactions');
    }
};
