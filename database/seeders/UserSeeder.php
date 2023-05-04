<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enum\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayOfUsers = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('test12'),
                'role' => Role::ADMIN->value
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('test12'),
                'role' => Role::USER->value
            ],
        ];
        foreach($arrayOfUsers as $user){
            User::create($user);
        }
        
    }
}
