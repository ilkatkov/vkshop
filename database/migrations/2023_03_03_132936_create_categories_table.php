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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 32);
            $table->bigInteger('parent_id')->unsigned()->index();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');;
            $table->text('description');
            $table->string('link', 64);
            $table->string('image', 128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_parent_id_foreign');
            Schema::dropIfExists('categories');
        });
    }
};
