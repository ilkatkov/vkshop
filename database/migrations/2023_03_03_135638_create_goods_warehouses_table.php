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
        Schema::create('goods_warehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('goods_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->foreign('goods_id')->references('id')->on('goods');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goods_warehouses', function (Blueprint $table) {
            $table->dropForeign('goods_warehouses_goods_id_foreign');
            $table->dropForeign('goods_warehouses_warehouse_id_foreign');
        });
        Schema::dropIfExists('goods_warehouses');
    }
};
