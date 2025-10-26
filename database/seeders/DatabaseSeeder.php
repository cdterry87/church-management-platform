<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Event;
use App\Models\Church;
use App\Models\ChurchManager;
use App\Models\ChurchMember;
use App\Models\Person;
use App\Models\Donation;
use App\Models\UserAdmin;
use App\Models\Volunteer;
use App\Models\UserTeamMember;
use App\Models\OutreachProject;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use App\Models\UserChurchMember;
use App\Models\UserChurchManager;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create an admin user
        $adminUser = UserAdmin::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create a demo church
        $church = Church::factory()->create([
            'name' => 'Demo Church',
        ]);

        // Create a church manager
        $managerUser = UserChurchManager::factory()->create([
            'name' => 'Manager User',
            'email' => 'church_manager@example.com',
            'password' => bcrypt('password'),
        ]);

        // Associate manager with the church
        ChurchManager::create([
            'church_id' => $church->id,
            'user_church_manager_id' => $managerUser->id,
        ]);

        // Create a demo team
        $team = Team::factory()->create([
            'name' => 'Demo Team',
            'church_id' => $church->id,
        ]);

        // Create a demo team member
        $teamMember = UserTeamMember::factory()->create([
            'name' => 'Team Member',
            'email' => 'team_member@example.com',
            'password' => bcrypt('password'),
        ]);

        // Associate team member with the team
        TeamMember::create([
            'team_id' => $team->id,
            'user_team_member_id' => $teamMember->id,
        ]);

        // Create a user church member
        $churchMember = UserChurchMember::factory()->create([
            'name' => 'Church Member',
            'email' => 'church_member@example.com',
            'password' => bcrypt('password'),
        ]);

        // Associate church member with the church
        ChurchMember::create([
            'church_id' => $church->id,
            'user_church_member_id' => $churchMember->id,
        ]);
    }
}
