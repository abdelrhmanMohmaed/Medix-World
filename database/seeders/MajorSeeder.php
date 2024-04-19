<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            ['en' => 'Cardiology', 'ar' => 'طب القلب'],
            ['en' => 'Dermatology', 'ar' => 'طب الجلدية'],
            ['en' => 'Endocrinology', 'ar' => 'الغدد الصماء'],
            ['en' => 'Gastroenterology', 'ar' => 'أمراض الجهاز الهضمي'],
            ['en' => 'Hematology', 'ar' => 'أمراض الدم'],
            ['en' => 'Neurology', 'ar' => 'طب الأعصاب'],
            ['en' => 'Oncology', 'ar' => 'طب الأورام'],
            ['en' => 'Orthopedics', 'ar' => 'طب العظام'],
            ['en' => 'Pediatrics', 'ar' => 'طب الأطفال'],
            ['en' => 'Psychiatry', 'ar' => 'طب النفسيات'],
            ['en' => 'Radiology', 'ar' => 'الأشعة'],
            ['en' => 'Urology', 'ar' => 'طب المسالك البولية'],
            // يمكنك إضافة المزيد من التخصصات هنا
        ];

        foreach ($specialties as $specialty) {
            DB::table('majors')->insert([
                'name' => json_encode($specialty),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
