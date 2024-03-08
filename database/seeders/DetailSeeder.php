<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{

    protected array $responseCodes = [200, 300, 400, 500];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail::factory(30)->create([
            'page_id' => function () {
                $id = 0;

                $id += 1;

                return $id;
            },
            'status_code' => function () {
                return $this->responseCodes[rand(0, count($this->responseCodes) - 1)];
            },
            'response_time' => function () {
                return rand(100, 10000);
            },
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
