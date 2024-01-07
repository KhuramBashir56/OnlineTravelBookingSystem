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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 56)->unique();
            $table->string('logo', 255);
            $table->foreignId('owner_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 48);
            $table->string('email', 48)->unique();
            $table->string('contact', 15)->unique();
            $table->string('address', 255);
            $table->foreignId('register_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->comment('if NULL that mins fresh user');
            $table->enum('status', ['active', 'blocked', 'deleted'])->default('active');
            $table->string('block_reason')->nullable();
            $table->foreignId('blocked_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('blocked_at')->nullable();
            $table->string('delete_reason')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};