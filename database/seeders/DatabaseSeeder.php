<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Phone;
use App\Models\ServiceProviderDetails;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            RegionSeeder::class,
            MajorSeeder::class,
            TitleSeeder::class,
            AdviceSeeder::class,
            TermsConditionSeeder::class,
            ServiceProviderDetailsSeeder::class
        ]);

        ServiceProviderDetails::create([
            'user_id' => 3,
            'city_id' => 1,
            'region_id' => 1,
            'title_id' => 1,
            'major_id' => 1,

            'name' => [
                    'en' => 'Service Provider',
                    'ar' => 'مزود خدمة'
                ],
            'summary' => [
                    'en' => 'Service Provider Summary',
                    'ar' => 'مزود خدمة ملخص'
                ],
            'address' => [
                'en' =>  'Service Provider Address',
                'ar' => 'مزود خدمة عنوان',
            ],
            'price' => 123465,
            'status' => 'Approval',
            'img' => 'assets/images/services/avatars/2.avif',
            'medical_card' => 'assets/images/services/avatars/2.avif',
        ]);
        // required phones
        $phones = [
            ['type' => 'personal', 'tel' => '+201840394088'],
            ['type' => 'clinic', 'tel' => '+201503052568'],
        ];
        // required phones
        // optional 
            $phones[] = ['type' => 'personal', 'tel' => '+201503052568'];
            $phones[] = ['type' => 'clinic', 'tel' => '+201503052568'];
        // optional
        
        foreach ($phones as $phoneData) {
            Phone::create([
                'type' => $phoneData['type'],
                'user_id' => 3,
                'tel' => $phoneData['tel'],
                'active' => 1,
            ]);
        }
        
        View::create([
            'view'=>50,
            'user_id'=>3
        ]);
    }
}
