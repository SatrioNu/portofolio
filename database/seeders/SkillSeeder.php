<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Backend Skills
            [
                'name' => 'PHP',
                'category' => 'backend',
                'proficiency_level' => 4,
                'description' => 'Server-side scripting language for web development',
                'sort_order' => 1
            ],
            [
                'name' => 'Laravel',
                'category' => 'backend',
                'proficiency_level' => 4,
                'description' => 'PHP framework for web applications',
                'sort_order' => 2
            ],
            [
                'name' => 'Node.js',
                'category' => 'backend',
                'proficiency_level' => 3,
                'description' => 'JavaScript runtime for server-side development',
                'sort_order' => 3
            ],
            [
                'name' => 'Python',
                'category' => 'backend',
                'proficiency_level' => 3,
                'description' => 'Versatile programming language',
                'sort_order' => 4
            ],

            // Frontend Skills
            [
                'name' => 'HTML',
                'category' => 'frontend',

                'proficiency_level' => 5,
                'description' => 'Markup language for web pages',
                'sort_order' => 1
            ],
            [
                'name' => 'CSS',
                'category' => 'frontend',

                'proficiency_level' => 4,
                'description' => 'Styling language for web pages',
                'sort_order' => 2
            ],
            [
                'name' => 'JavaScript',
                'category' => 'frontend',

                'proficiency_level' => 4,
                'description' => 'Client-side scripting language',
                'sort_order' => 3
            ],
            [
                'name' => 'React',
                'category' => 'frontend',

                'proficiency_level' => 3,
                'description' => 'JavaScript library for building user interfaces',
                'sort_order' => 4
            ],
            [
                'name' => 'Vue.js',
                'category' => 'frontend',

                'proficiency_level' => 3,
                'description' => 'Progressive JavaScript framework',
                'sort_order' => 5
            ],
            [
                'name' => 'Tailwind CSS',
                'category' => 'frontend',

                'proficiency_level' => 4,
                'description' => 'Utility-first CSS framework',
                'sort_order' => 6
            ],

            // Database Skills
            [
                'name' => 'MySQL',
                'category' => 'database',

                'proficiency_level' => 4,
                'description' => 'Relational database management system',
                'sort_order' => 1
            ],
            [
                'name' => 'PostgreSQL',
                'category' => 'database',

                'proficiency_level' => 3,
                'description' => 'Advanced relational database',
                'sort_order' => 2
            ],
            [
                'name' => 'MongoDB',
                'category' => 'database',

                'proficiency_level' => 3,
                'description' => 'NoSQL document database',
                'sort_order' => 3
            ],
            [
                'name' => 'Redis',
                'category' => 'database',

                'proficiency_level' => 3,
                'description' => 'In-memory data structure store',
                'sort_order' => 4
            ],

            // Tools Skills
            [
                'name' => 'Git',
                'category' => 'tools',

                'proficiency_level' => 4,
                'description' => 'Version control system',
                'sort_order' => 1
            ],
            [
                'name' => 'Docker',
                'category' => 'tools',

                'proficiency_level' => 3,
                'description' => 'Containerization platform',
                'sort_order' => 2
            ],
            [
                'name' => 'VS Code',
                'category' => 'tools',

                'proficiency_level' => 5,
                'description' => 'Code editor',
                'sort_order' => 3
            ],
            [
                'name' => 'Postman',
                'category' => 'tools',

                'proficiency_level' => 4,
                'description' => 'API testing tool',
                'sort_order' => 4
            ],
            [
                'name' => 'Figma',
                'category' => 'tools',

                'proficiency_level' => 3,
                'description' => 'Design and prototyping tool',
                'sort_order' => 5
            ]
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
