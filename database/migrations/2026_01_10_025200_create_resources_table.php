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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 255);
            $table->text('description', 511);

            $table->integer('creator_id');
            $table->index('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');

            $table->string('type', 127);

            $table->json('misc')->nullable();

            $table->string('image_path', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
