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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reference')->constrained('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_id')->nullable()->unique();
            $table->integer('debit')->nullable();
            $table->integer('credit')->nullable();
            $table->enum('type', ['booking', 'release', 'commission']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
