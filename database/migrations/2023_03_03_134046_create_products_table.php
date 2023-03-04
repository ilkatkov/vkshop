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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
            $table->bigInteger('manufacturer_id')->unsigned()->index();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');;
            $table->string('title', 64);
            $table->text('description');
            $table->string('image', 128);
            $table->string('link', 128)->unique();
            $table->json('fields')->nullable();
            $table->integer('purchased')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_manufacturer_id_foreign');
        });
        Schema::dropIfExists('products');
    }
};
