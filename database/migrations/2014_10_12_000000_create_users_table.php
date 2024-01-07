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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->enum('gender',['male','female'])->nullable();
            $table->string('mobile', 15)->unique();
            $table->string('email', 56)->unique();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->enum('account_type', ['admin', 'agency', 'user','guide'])->default('user');
            $table->foreignId('register_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade')->comment('if NULL that mins fresh user');
            $table->enum('status', ['active', 'blocked', 'deleted'])->default('active');
            $table->string('block_reason')->nullable();
            $table->foreignId('blocked_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('blocked_at')->nullable();
            $table->string('delete_reason')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
