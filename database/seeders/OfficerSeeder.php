<?php

namespace Database\Seeders;

use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Officer::query()->create([
            "nama" => "Fulan",
            "email" => "fulan@gmail.com",
            "password" => "fulan123"
        ]);
    }
}
