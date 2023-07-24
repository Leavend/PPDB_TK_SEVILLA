<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name'=> 'Nadhira Rizqana',
        //     'email'=> 'nadhirarizqana@gmail.com',
        //     'password'=> Hash::make('admin'),
        //     'user_type'=> 1,
        // ]);

        // User::create([
        //     'name'=> 'Nadhira Rizqana Nur S',
        //     'email'=> 'nadhirarizqana2@gmail.com',
        //     'password'=> Hash::make('siswa'),
        //     'user_type'=> 2,
        // ]);
    }
}
