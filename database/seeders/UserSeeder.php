<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        // How many users you need, defaulting to 10
        $numberOfUser = $this->command->ask('How many users do you need ?', 10);

        $this->command->info("Creating {$numberOfUser} users");

        User::factory()->times($numberOfUser)->create();

        $this->command->info('Users Created!');
    }
}
