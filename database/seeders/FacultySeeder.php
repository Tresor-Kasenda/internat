<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'Literature',
            'Scientifique',
            'Math Informatique',
            'Commerciale et gestion',
            'Mecanique generale',
            'Mecanique automobile',
            'Electrique',
            'Electronique',
            'Pedagogie generale',
        ])->each(fn ($faculty) => Faculty::factory()->create([
            'name' => $faculty,
        ]));
    }
}
