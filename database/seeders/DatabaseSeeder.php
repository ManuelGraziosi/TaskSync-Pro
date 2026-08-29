<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (! env('DEFAULT_ADMIN_PASSWORD') || ! env('DEFAULT_USER_PASSWORD')) {
            $this->command->error('Le password di default non sono state definite nel file .env. Impossibile eseguire il seeder.');

            return;
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make(env('DEFAULT_USER_PASSWORD')),
        ]);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
        ]);
    }
}
