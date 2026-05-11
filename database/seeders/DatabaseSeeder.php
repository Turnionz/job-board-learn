<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {

        User::factory()->create([
            'name' => 'testuser',
            'email' => 'test@example.com'
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory(1)->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employeers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employeers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
