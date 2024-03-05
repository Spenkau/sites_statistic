<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Detail;
use App\Models\Site;
use App\Models\User;
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

        Site::factory(30)->create();

        Detail::factory(30)->create([
            'site_id' => function () {
               $id = 0;

               $id += 1;

               return $id;
            },
            'status_code' => function() {
                return $this->responseCodes[rand(0, count($this->responseCodes) - 1)];
            },
            'response_time' => function() {
                return rand(100, 10000);
            },
            'created_at' => now(),
            'updated_at' => now()
        ]);


        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
        ]);

        Admin::factory()->create([
            'user_id' => 1,
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
