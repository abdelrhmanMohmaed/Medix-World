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
        ]);
        
        $admin->assignRole('Admin');
 
        $serviceProvider = User::create([
            'name' => 'Service Provider',
            'email' => 'service@provider.com',
            'password' => 123456789,
        ]);
        $serviceProvider->assignRole('Service Providers');
 
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => 123456789,
        ]);
        $user->assignRole('User');
    }
}