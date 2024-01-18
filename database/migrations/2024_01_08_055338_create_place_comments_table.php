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
        Schema::create('place_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->constrained('tour_places')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('comment');
            $table->enum('status', ['published', 'unpublished', 'deleted'])->default('unpublished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_comments');
    }
};
