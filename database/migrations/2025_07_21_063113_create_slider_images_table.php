<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slider_images', static function (Blueprint $table) {
            $table->id();
            $table->string('image_type')->nullable();
            $table->text('image_url')->nullable();
            $table->string('image_slogan')->nullable();
            $table->string('image_title')->nullable();
            $table->string('image_offer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_images');
    }
};
