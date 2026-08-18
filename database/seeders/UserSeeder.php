<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        User::truncate();

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('Password@123'),
            'phone' => '1234567890',
            'age' => 25,
            'employment_status' => 'employed',
            'company_name' => 'ABC Technologies',
            'bio' => 'Software developer from New York',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('Password@123'),
            'phone' => '9876543210',
            'age' => 30,
            'employment_status' => 'self-employed',
            'company_name' => 'Jane Design Studio',
            'bio' => 'UX Designer and coffee enthusiast',
        ]);

        User::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'password' => Hash::make('Password@123'),
            'phone' => null,
            'age' => 35,
            'employment_status' => 'student',
            'company_name' => null,
            'bio' => 'Project manager with 10 years experience',
        ]);

        // Create additional users using factory
        $users = User::factory(10)->make();

        foreach ($users as $user) {
            $user->password = Hash::make('Password@123');

            $user->employment_status = 'employed';
            $user->company_name = 'Demo Company';

            $user->save();

            $this->command->info(
                'Created user: ' . $user->email
            );
        }

        $this->command->info(
            'Total users created: ' . User::count()
        );
    }
}