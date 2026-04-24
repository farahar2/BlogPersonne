<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Laravel']);
        Category::create(['name' => 'PHP']);
        Category::create(['name' => 'JavaScript']);
        Category::create(['name' => 'Base de données']);
        Category::create(['name' => 'Conseils Dev']);
    }
}