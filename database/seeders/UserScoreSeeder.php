<?php

namespace Database\Seeders;

use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(13)->create()->each(function ($user) {
            Score::create([
                'user_id' => $user->id,
                'score' => rand(0, 1000),
            ]);
        });
    }
}
