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
        Schema::create('package_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('comment_id')->constrained('package_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
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
        Schema::dropIfExists('package_comment_replies');
    }
};
