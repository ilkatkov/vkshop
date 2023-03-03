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
        Schema::create('orders_goods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('goods_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('goods_id')->references('id')->on('goods');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders_goods', function (Blueprint $table) {
            $table->dropForeign('orders_goods_goods_id_foreign');
            $table->dropForeign('orders_goods_order_id_foreign');
        });
        Schema::dropIfExists('orders_goods');
    }
};
