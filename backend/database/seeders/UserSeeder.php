<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        collect(range(1, 10))->each(function ($id) {
            User::factory()->create(['email' => "user_{$id}@test.lk"]);
        });
    }
}
