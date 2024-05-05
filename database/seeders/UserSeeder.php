<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 123456789, 
            'dateOfBirth' => '1992-12-12',
            'gender' => 1,
        ]);
        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => 123456789, 
            'dateOfBirth' => '1992-12-12',
            'gender' => 1,
        ]);
        $user->assignRole('User');


        $serviceProvider = User::create([
            'name' => 'Service Provider',
            'email' => 'service@provider.com',
            'password' => 123456789,
            'dateOfBirth' => '1992-12-12',
            'gender' => 1,
        ]);
        $serviceProvider->assignRole('Service Providers');
    }
}