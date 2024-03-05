<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Detail;
use App\Models\Site;
use Database\Factories\PageFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected array $responseCodes = [200, 300, 400, 500];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Detail::factory()->create([
            'page_id' => 1,
            'status_code' => $this->responseCodes[rand(0, count($this->responseCodes) - 1)],
            'response_time' => rand(100, 10000),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Site::factory(30)->create();

         \App\Models\User::factory()->create([
             'name' => 'test',
             'email' => 'test@example.com',
             'email_verified_at' => now(),
             'password' => Hash::make('1234'),
             'remember_token' => Str::random(10),
         ]);
    }
}
