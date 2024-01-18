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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('place_id')->constrained('tour_places')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->unique();
            $table->decimal('price', 7, 2);
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->string('duration', 10);
            $table->string('slug')->unique();
            $table->text('description', 5000);
            $table->enum('status', ['published', 'unpublished', 'deleted'])->default('unpublished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
