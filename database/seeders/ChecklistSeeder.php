<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    public function run(): void
    {
        Checklist::factory()->create([
            'user_id'=>'1',
            'checked' => '1',
            'product' => 'bread',
            'count' => '3',
        ]);
    }
}
