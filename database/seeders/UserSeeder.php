<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        User::truncate();

        // Create fresh data without authentication fields
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'age' => 25,
            'bio' => 'Software developer from New York'
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
            'age' => 30,
            'bio' => 'UX Designer and coffee enthusiast'
        ]);

        User::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'phone' => null,
            'age' => 35,
            'bio' => 'Project manager with 10 years experience'
        ]);

        // Create additional users using factory - create exactly 10
        $users = User::factory(10)->make(); // Use make() instead of create() to get collection without saving
        
        foreach ($users as $user) {
            $user->save(); // Save each user individually
            $this->command->info('Created user: ' . $user->email);
        }
        
        $this->command->info('Total users created: ' . User::count());
    }
}