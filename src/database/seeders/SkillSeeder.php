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
            ['name' => 'Laravel', 'category' => 'Backend', 'icon' => 'profile/laravel.png'],
            ['name' => 'Python', 'category' => 'Backend', 'icon' => 'profile/python.png'],
            ['name' => 'C/C++', 'category' => 'Backend', 'icon' => 'profile/c++.png'],
            ['name' => 'PHP', 'category' => 'Backend', 'icon' => 'profile/php.png'],
            ['name' => 'Java', 'category' => 'Backend', 'icon' => 'profile/java.png'],
            ['name' => 'HTML', 'category' => 'Frontend', 'icon' => 'profile/html.png'],
            ['name' => 'CSS', 'category' => 'Frontend', 'icon' => 'profile/css.png'],
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => 'profile/mysql.png'],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'icon' => 'profile/postgresql.png'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
