<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('media_series_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_series_id')->constrained()->cascadeOnDelete();
            $table->foreignId('church_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('speaker')->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('video_path')->nullable();
            $table->string('audio_path')->nullable();
            $table->text('transcript')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_series_items');
        Schema::dropIfExists('media_series');
    }
};
