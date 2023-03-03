<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('field_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('field_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories_fields', function (Blueprint $table) {
            $table->dropForeign('categories_fields_category_id_foreign');
            $table->dropForeign('categories_fields_field_id_foreign');
        });
        Schema::dropIfExists('categories_fields');
    }
};
