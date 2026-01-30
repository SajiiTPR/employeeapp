<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ([
            'Human Resources',
            'Information Technology',
            'Finance',
            'Sales',
            'Marketing',
            'Operations',
            'Customer Support',
            'Administration',
        ]);

        $description = ([
            'Handles employee recruitment, training, performance management, and workplace policies.',
            'Responsible for software development, system maintenance, networking, and IT support.',
            'Manages company finances, budgeting, payroll, accounting, and financial reporting.',
            'Focuses on selling products or services and maintaining customer relationships.',
            'Plans and executes marketing strategies, branding, promotions, and market research.',
            'Oversees daily business operations, logistics, and process optimization.',
            'Provides assistance to customers, resolves issues, and ensures customer satisfaction.',
            'Handles office administration, documentation, and organizational coordination.',
        ]);

        foreach ($name as $index => $names) {
            category::create([
                'name' => $names,
                'description' => $description[$index]
            ]);
        }
    }
}
