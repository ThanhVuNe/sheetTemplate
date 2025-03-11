<?php

namespace Database\Seeders;

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
        for ($i = 1; $i <= 5; $i++) {
            $templates[] = [
                'name' => 'Category ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($templates);
    }
}
