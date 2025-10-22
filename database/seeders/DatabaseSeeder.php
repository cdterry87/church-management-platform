<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Church;
use App\Models\User;
use App\Models\Person;
use App\Models\Event;
use App\Models\Donation;
use App\Models\Volunteer;
use App\Models\OutreachProject;
use App\Models\Team;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 1 demo church with staff and data
        $church = Church::factory()->create([
            'name' => 'New Hope Church',
            'slug' => 'new-hope-church',
        ]);

        $admin = User::factory()->admin()->create([
            'church_id' => $church->id,
            'name' => 'Admin User',
            'email' => 'admin@church.test',
        ]);

        // Create people
        $people = Person::factory()->count(10)->create([
            'church_id' => $church->id,
        ]);

        // Events
        Event::factory()->count(5)->create([
            'church_id' => $church->id,
        ]);

        // Donations
        Donation::factory()->count(20)->create([
            'church_id' => $church->id,
            'person_id' => $people->random()->id,
        ]);

        // Volunteers
        $team = Team::factory()->create([
            'church_id' => $church->id,
            'name' => 'Outreach Team',
        ]);

        Volunteer::factory()->count(5)->create([
            'church_id' => $church->id,
            'team_id' => $team->id,
        ]);

        OutreachProject::factory()->count(2)->create([
            'church_id' => $church->id,
        ]);
    }
}
