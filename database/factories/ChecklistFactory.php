<?php

namespace Database\Factories;

use App\Models\Checklist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Random\RandomException;

class ChecklistFactory extends Factory
{
    /**
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array{
        return [
            'user_id' => Auth::check() ? Auth::user()->id : '1',
            'checked'=> random_int(0, 1),
            'product' => fake()->name,
            'count' => Str::random(3),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => []);
    }
}
