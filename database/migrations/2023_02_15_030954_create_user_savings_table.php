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
        Schema::create('user_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kop_product_id')->constrained('kop_products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('period_id')->constrained('periods')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('amount');
            $table->string('month');
            $table->year('year');
            $table->date('deposit_date');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('user_savings');
    }
};
