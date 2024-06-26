<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\ServiceProviderDetails;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceProviderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(8000)
            ->has(ServiceProviderDetails::factory()->count(1))
            ->has(Phone::factory()->count(4))
            ->has(View::factory()->count(1))
            ->create();
    }
}
