<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use Database\Factories\PageFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Page::factory(30)->create();

         \App\Models\User::factory()->create([
             'name' => 'test',
             'email' => 'test@example.com',
             'email_verified_at' => now(),
             'password' => Hash::make('1234'),
             'remember_token' => Str::random(10),
         ]);
    }
}
