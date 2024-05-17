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
        Schema::create('art_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id');
            $table->string('title')->nullable();
            $table->string('image-path')->unique();
            $table->enum('form', ['painting','sculpture','drawing','photography'])->nullable();
            $table->enum('medium', ['pencil','ink','chalk', 'oil', 'tempera', 'watercolor', 'acrylic', 'bronze', 'marble', 'wood', 'metal', 'digital', 'film', 'mixed', 'temporary'])->nullable();
            $table->string('size');
            $table->boolean('certificate');
            $table->boolean('signature');

            $table->foreign('artist_id')
                ->references('id')
                ->on('artists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_works');
    }
};
