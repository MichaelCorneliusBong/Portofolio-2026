<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'icon' => null],
            ['name' => 'Python', 'category' => 'Backend', 'icon' => null],
            ['name' => 'Java', 'category' => 'Backend', 'icon' => null],
            ['name' => 'C/C++', 'category' => 'Backend', 'icon' => null],
            ['name' => 'PHP', 'category' => 'Backend', 'icon' => null],
            ['name' => 'HTML', 'category' => 'Frontend', 'icon' => null],
            ['name' => 'CSS', 'category' => 'Frontend', 'icon' => null],
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => null],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'icon' => null],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
