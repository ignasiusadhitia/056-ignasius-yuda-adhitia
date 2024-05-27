<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Geography', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'History', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Culture', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Flora & Fauna', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tourism', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Languages', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Figure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
