<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilepathsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('filepaths')->insert([
            'filepath' => Storage::url('samplePDF1.pdf'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('filepaths')->insert([
            'filepath' => Storage::url('samplePDF2.pdf'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('filepaths')->insert([
            'filepath' => Storage::url('sampleDOC1.docx'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('filepaths')->insert([
            'filepath' => Storage::url('sampleDOC2.doc'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
