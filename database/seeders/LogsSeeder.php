<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Logs;
use App\Models\User;

class LogsSeeder extends Seeder
{
    public function run(): void
    {
        Logs::factory()
            ->count(4)
            ->recycle(User::factory())
            ->create();
    }
}
