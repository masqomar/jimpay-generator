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
        Schema::create('cashflow_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashflow_id')->constrained('cashflows')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('bank_id')->constrained('banks')->cascadeOnUpdate()->cascadeOnDelete();
			$table->text('description')->nullable();
			$table->string('extra_field')->nullable();
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
        Schema::dropIfExists('cashflow_transactions');
    }
};
