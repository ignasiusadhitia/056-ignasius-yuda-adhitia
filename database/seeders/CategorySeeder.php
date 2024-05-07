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
            ['name' => 'Geografi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sejarah', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Budaya', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Flora & Fauna', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pariwisata', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tokoh', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
