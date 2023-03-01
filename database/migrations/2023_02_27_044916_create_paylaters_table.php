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
        Schema::create('paylaters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('paylater_provider_id')->constrained('paylater_providers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('bank_id')->constrained('banks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('bank_account_number')->nullable();
            $table->string('bank_account_name', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->boolean('status');
            $table->integer('amount');
            $table->integer('duration');
            $table->text('note');
            $table->string('image')->nullable();
            $table->string('product', 255);
            $table->string('product_specification');
            $table->string('extra_field');
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
        Schema::dropIfExists('paylaters');
    }
};
