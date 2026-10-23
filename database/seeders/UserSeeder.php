<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Yönetici',
            'email' => 'admin@example.com',
            'role' => 'yönetici',
        ]);

        User::factory()->count(4)->create(['role' => 'editör']);
        User::factory()->count(95)->create(['role' => 'kullanıcı']);
    }
}
