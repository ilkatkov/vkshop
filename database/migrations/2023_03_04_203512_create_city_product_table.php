<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('city_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('city_product', function (Blueprint $table) {
            $table->dropForeign('city_product_product_id_foreign');
            $table->dropForeign('city_product_city_id_foreign');
        });
        Schema::dropIfExists('city_product');
    }
};
