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
        $majors = [
            ['en' => 'Dermatology', 'ar' => 'جلدية'],
            ['en' => 'Dentistry', 'ar' => 'أسنان'],
            ['en' => 'Psychiatry', 'ar' => 'نفسي'],
            ['en' => 'Pediatrics', 'ar' => 'أطفال وحديثي الولادة'],
            ['en' => 'Neurology', 'ar' => 'مخ وأعصاب'],
            ['en' => 'Orthopedics', 'ar' => 'عظام'],
            ['en' => 'Obstetrics and Gynecology', 'ar' => 'نساء وتوليد'],
            ['en' => 'Otorhinolaryngology', 'ar' => 'أنف وأذن وحنجرة'],
            ['en' => 'Cardiology', 'ar' => 'قلب وأوعية دموية'],
            ['en' => 'Interventional Radiology', 'ar' => 'الأشعة التداخلية'],
            ['en' => 'Hematology', 'ar' => 'أمراض الدم'],
            ['en' => 'Oncology', 'ar' => 'أورام'],
            ['en' => 'Internal Medicine', 'ar' => 'باطنة'],
            ['en' => 'Weight Loss and Nutrition', 'ar' => 'تخسيس وتغذية'],
            ['en' => 'Pediatric Surgery', 'ar' => 'جراحة أطفال'],
            ['en' => 'Surgical Oncology', 'ar' => 'جراحة أورام'],
            ['en' => 'Vascular Surgery', 'ar' => 'جراحة أوعية دموية'],
            ['en' => 'Plastic Surgery', 'ar' => 'جراحة تجميل'],
            ['en' => 'Bariatric Surgery', 'ar' => 'جراحة سمنة ومناظير'],
            ['en' => 'General Surgery', 'ar' => 'جراحة عامة'],
            ['en' => 'Spinal Surgery', 'ar' => 'جراحة عمود فقري'],
            ['en' => 'Cardiac Surgery', 'ar' => 'جراحة قلب وصدر'],
            ['en' => 'Neurosurgery', 'ar' => 'جراحة مخ وأعصاب'],
            ['en' => 'Gastroenterology', 'ar' => 'جهاز هضمي ومناظير'],
            ['en' => 'Allergy and Immunology', 'ar' => 'حساسية ومناعة'],
            ['en' => 'Reproductive Medicine and IVF', 'ar' => 'حقن مجهري وأطفال الأنابيب'],
            ['en' => 'Andrology and Infertility', 'ar' => 'ذكورة وعقم'],
            ['en' => 'Rheumatology', 'ar' => 'روماتيزم'],
            ['en' => 'Endocrinology', 'ar' => 'سكر وغدد صماء'],
            ['en' => 'Audiology', 'ar' => 'سمعيات'],
            ['en' => 'Pulmonology', 'ar' => 'صدر وجهاز تنفسي'],
            ['en' => 'Family Medicine', 'ar' => 'طب الأسرة'],
            ['en' => 'Geriatrics', 'ar' => 'طب المسنين'],
            ['en' => 'Orthodontics', 'ar' => 'طب تقويمي'],
            ['en' => 'Pain Management', 'ar' => 'علاج الآلام'],
            ['en' => 'Physiotherapy and Sports Injuries', 'ar' => 'علاج طبيعي وإصابات ملاعب'],
            ['en' => 'Ophthalmology', 'ar' => 'عيون'],
            ['en' => 'Hepatology', 'ar' => 'كبد'],
            ['en' => 'Nephrology', 'ar' => 'كلى'],
            ['en' => 'Radiology Centers', 'ar' => 'مراكز الأشعة'],
            ['en' => 'Urology', 'ar' => 'مسالك بولية'],
            ['en' => 'Laboratories', 'ar' => 'معامل تحاليل'],
            ['en' => 'General Practice', 'ar' => 'ممارسة عامة'],
            ['en' => 'Speech Therapy', 'ar' => 'نطق وتخاطب']
        ];

        foreach ($majors as $item) {
            DB::table('majors')->insert([
                'name' => json_encode($item),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
