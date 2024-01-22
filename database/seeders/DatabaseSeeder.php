<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Checklist;
use Database\Factories\ChecklistFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Checklist::factory()->connection(ChecklistFactory::class);
        $this->call(ChecklistSeeder::class);
    }
}
