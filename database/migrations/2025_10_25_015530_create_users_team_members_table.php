<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users_team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('teams_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_team_member_id')->constrained('users_team_members')->cascadeOnDelete();
            $table->foreignId('team_role_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->timestamps();
        });

        Schema::create('teams_members_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_member_id')->constrained('teams_members')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('teams_members_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_member_id')->constrained('teams_members')->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams_members_events');
        Schema::dropIfExists('teams_members_services');
        Schema::dropIfExists('teams_members');
        Schema::dropIfExists('users_team_members');
    }
};
