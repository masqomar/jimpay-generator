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
        Schema::create('kop_products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
			$table->string('cover')->nullable();
			$table->foreignId('kop_product_type_id')->constrained('kop_product_types')->cascadeOnUpdate()->cascadeOnDelete();
			$table->boolean('status');
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
        Schema::dropIfExists('kop_products');
    }
};
