<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CmsDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cms_data')->insert([
            'title' => 'O desafio da vez é',
            'subtitle' => 'Terraplanagem sustentavel',
            'bg_image_path' => Storage::path('Vitrine.png'),
            'content' => fake()->paragraph(3),
        ]);
    }
}
