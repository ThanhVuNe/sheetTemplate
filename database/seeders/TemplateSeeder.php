<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $templates[] = [
                'name' => 'Template ' . $i,
                'price' => rand(10, 100) * 1000,
                'discount' => rand(0, 50),
                'image_path' => 'templates/example.png',
                'category_id' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('templates')->insert($templates);
    }
}
