<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            [ 
                'title' => ['en' => 'Professor', 'ar' => 'أستاذ'], 
            ],
            [ 
                'title' => ['en' => 'Lecturer', 'ar' => 'مدرس'],
            ],
            [ 
                'title' => ['en' => 'Consultant', 'ar' => 'استشاري'], 
            ],
            [ 
                'title' => ['en' => 'Specialist', 'ar' => 'أخصائي'],
            ]
        ];

        foreach ($titles as $item) {
            DB::table('titles')->insert([ 
                'title' => json_encode(@$item['title']), 
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}