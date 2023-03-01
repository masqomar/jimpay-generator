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
        Schema::create('paylater_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paylater_id')->constrained('paylaters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('amount');
            $table->string('note');
            $table->date('date');
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
        Schema::dropIfExists('paylater_transactions');
    }
};
