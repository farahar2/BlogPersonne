<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer le compte blogueur
        User::create([
            'name'     => 'Mon Blog',
            'email'    => 'blog@blog.com',
            'password' => Hash::make('password123'),
        ]);

        // Créer les catégories
        $this->call(CategorySeeder::class);
    }
}