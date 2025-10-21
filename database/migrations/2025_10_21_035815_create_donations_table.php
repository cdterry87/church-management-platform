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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id')->constrained('churches')->cascadeOnDelete();
            $table->foreignId('person_id')->nullable()->constrained('persons')->nullOnDelete();
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['cash', 'check', 'card', 'online', 'other'])->default('online');
            $table->string('designation')->nullable();
            $table->string('transaction_id')->nullable();
            $table->dateTime('donated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
