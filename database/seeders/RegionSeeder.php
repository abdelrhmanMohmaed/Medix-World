<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            // Cairo
            [
                'city_id' => 1,
                'name' => ['en' => 'Maadi', 'ar' => 'المعادي']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Zamalek', 'ar' => 'الزمالك']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Nasr City', 'ar' => 'مدينة نصر']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Heliopolis', 'ar' => 'مصر الجديدة']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Dokki', 'ar' => 'الدقي']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Mohandessin', 'ar' => 'المهندسين']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => '6th of October City', 'ar' => 'مدينة 6 أكتوبر']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Tagamo\' Al Khames', 'ar' => 'التجمع الخامس']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'El Rehab City', 'ar' => 'مدينة الرحاب']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Sheikh Zayed City', 'ar' => 'مدينة الشيخ زايد']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Manial', 'ar' => 'المنيل']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Helwan', 'ar' => 'حلوان']
            ],
            [
                'city_id' => 1,
                'name' => ['en' => 'Giza Square', 'ar' => 'ميدان الجيزة']
            ],
            // Alexandria
            [
                'city_id' => 2,
                'name' => ['en' => 'Montaza', 'ar' => 'المنتزة']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Smouha', 'ar' => 'سموحة']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Roshdy', 'ar' => 'روشدي']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Miami', 'ar' => 'ميامي']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Bolkly', 'ar' => 'بولكلي']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Sidi Gaber', 'ar' => 'سيدي جابر']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Saba Pasha', 'ar' => 'سابا باشا']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Stanley', 'ar' => 'ستانلي']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Agami', 'ar' => 'العجمي']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Kafr Abdo', 'ar' => 'كفر عبده']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'Sidi Bishr', 'ar' => 'سيدي بشر']
            ],
            [
                'city_id' => 2,
                'name' => ['en' => 'San Stefano', 'ar' => 'سان ستيفانو']
            ],
            // Aswan
            [
                'city_id' => 3,
                'name' => ['en' => 'Aswan Center', 'ar' => 'وسط أسوان']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Kom Ombo', 'ar' => 'كوم أمبو']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Daraw', 'ar' => 'دراو']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Abu Simbel', 'ar' => 'أبو سمبل']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Aswan High Dam', 'ar' => 'السد العالي']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Edfu', 'ar' => 'إدفو']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Kalabsha', 'ar' => 'كلبشة']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Philae', 'ar' => 'فيلة']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Seheil Island', 'ar' => 'جزيرة سهيل']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Elephantine Island', 'ar' => 'جزيرة الفنتين']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Unfinished Obelisk', 'ar' => 'المسلة الغير منتهية']
            ],
            [
                'city_id' => 3,
                'name' => ['en' => 'Nubian Museum', 'ar' => 'المتحف النوبي']
            ],
            
             // Asyut
            [
                'city_id' => 4,
                'name' => ['en' => 'Assiut University', 'ar' => 'جامعة أسيوط']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'El-Ghanayem', 'ar' => 'الغنيم']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'El-Sadfa', 'ar' => 'الصدفة']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Al-Makabaty', 'ar' => 'المكباتي']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Dairout', 'ar' => 'ديروط']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Abnoub', 'ar' => 'أبنوب']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Abu Tig', 'ar' => 'أبو تيج']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Abu Korkas', 'ar' => 'أبو كركاص']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Sahel Selim', 'ar' => 'ساحل سليم']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Dayrut Al-Sharif', 'ar' => 'ديروط الشريف']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Sodfa', 'ar' => 'الصدفة']
            ],
            [
                'city_id' => 4,
                'name' => ['en' => 'Al Ghanayim', 'ar' => 'الغنيم']
            ],
            // Beheira
            [
                'city_id' => 5,
                'name' => ['en' => 'Damanhur', 'ar' => 'دمنهور']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Kafr El-Dawar', 'ar' => 'كفر الدوار']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Rosetta', 'ar' => 'رشيد']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Abu Hummus', 'ar' => 'أبو حمص']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Shubrakhit', 'ar' => 'شبراخيت']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Wadi El-Natrun', 'ar' => 'وادي النطرون']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Hosh Essa', 'ar' => 'حوش عيسى']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Hosh Essa', 'ar' => 'حوش عيسى']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Abu Al Matamir', 'ar' => 'أبو المطامير']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Badr', 'ar' => 'بدر']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Wadi El Natrun', 'ar' => 'وادي النطرون']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Edko', 'ar' => 'إيدكو']
            ],
            [
                'city_id' => 5,
                'name' => ['en' => 'Kom Hamada', 'ar' => 'كوم حمادة']
            ],
            // Beni Suef 9
            [
                'city_id' => 6,
                'name' => ['en' => 'El-Fashn', 'ar' => 'الفشن']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'El-Wasta', 'ar' => 'الواسطى']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Biba', 'ar' => 'بيبا']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Samasta', 'ar' => 'سمسطا']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Nasser', 'ar' => 'ناصر']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Al Wasty', 'ar' => 'الواسطى']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Ahmedin', 'ar' => 'أحمدين']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'El-Wasta', 'ar' => 'الواسطى']
            ],
            [
                'city_id' => 6,
                'name' => ['en' => 'Nile Dor', 'ar' => 'نيل دور']
            ],
            // Dakahlia 9
            [
                'city_id' => 7,
                'name' => ['en' => 'Agami', 'ar' => 'أجمي']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Mit Ghamr', 'ar' => 'ميت غمر']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'El Senbellawein', 'ar' => 'السنبلاوين']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Mansoura', 'ar' => 'المنصورة']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Sherbin', 'ar' => 'شربين']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Tamy al-Amdid', 'ar' => 'تمى الأمديد']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Manzala', 'ar' => 'المنزلة']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Mit al-Qamh', 'ar' => 'ميت القمح']
            ],
            [
                'city_id' => 7,
                'name' => ['en' => 'Talkha', 'ar' => 'طلخا']
            ],
            // Damietta 9
            [
                'city_id' => 8,
                'name' => ['en' => 'Kafr El-Batikh', 'ar' => 'كفر البطيخ']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Ras El-Bar', 'ar' => 'رأس البر']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Zarqa', 'ar' => 'زرقا']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Faraskur', 'ar' => 'فارسكور']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'New Damietta', 'ar' => 'الدمياط الجديدة']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Ras El-Hekma', 'ar' => 'رأس الحكمة']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Meet Abou Ghalib', 'ar' => 'ميت أبو غالب']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'El-Zarka', 'ar' => 'الزرقا']
            ],
            [
                'city_id' => 8,
                'name' => ['en' => 'Baltim', 'ar' => 'بلطيم']
            ],
            // Faiyum
            [
                'city_id' => 9,
                'name' => ['en' => 'Faiyum City', 'ar' => 'مدينة الفيوم']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Tamiya', 'ar' => 'طامية']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Senouras', 'ar' => 'سنورس']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Ihnasia', 'ar' => 'إهناسيا']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Yusuf El Sadiq', 'ar' => 'يوسف الصديق']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'New Faiyum', 'ar' => 'الفيوم الجديدة']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Abshway', 'ar' => 'ابشواي']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Kom Oshim', 'ar' => 'كوم أوشيم']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'El Ghanayem', 'ar' => 'الغنايم']
            ],
            [
                'city_id' => 9,
                'name' => ['en' => 'Ameria', 'ar' => 'أميرية']
            ],
            // Gharbia
            [
                'city_id' => 10,
                'name' => ['en' => 'Tanta', 'ar' => 'طنطا']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Mahalla El Kubra', 'ar' => 'المحلة الكبرى']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Zefta', 'ar' => 'زفتى']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Kafr El Zayat', 'ar' => 'كفر الزيات']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Samannoud', 'ar' => 'سمنود']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Basyoun', 'ar' => 'بسيون']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'El Santa', 'ar' => 'السنطة']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Tanta El Gharbia', 'ar' => 'طنطا الغربية']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Qutour', 'ar' => 'قطور']
            ],
            [
                'city_id' => 10,
                'name' => ['en' => 'Kotoor', 'ar' => 'كتور']
            ],
            // Giza
            [
                'city_id' => 11,
                'name' => ['en' => 'Giza', 'ar' => 'الجيزة']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => '6th of October', 'ar' => '6 أكتوبر']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Sheikh Zayed City', 'ar' => 'مدينة الشيخ زايد']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Al Haram', 'ar' => 'الهرم']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Dokki', 'ar' => 'الدقي']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Mohandessin', 'ar' => 'المهندسين']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Imbaba', 'ar' => 'إمبابة']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Agouza', 'ar' => 'العجوزة']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Badrashin', 'ar' => 'بدرشين']
            ],
            [
                'city_id' => 11,
                'name' => ['en' => 'Saqiyat Mekki', 'ar' => 'ساقية مكى']
            ],
            // Ismailia
            [
                'city_id' => 12,
                'name' => ['en' => 'Ismailia City', 'ar' => 'مدينة الإسماعيلية']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'Fayed', 'ar' => 'الفيض']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'Qantara Sharq', 'ar' => 'قنطرة شرق']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'El-Tal El-Kebir', 'ar' => 'التل الكبير']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'El Qassaseen', 'ar' => 'القصاصين']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'Abu Swear', 'ar' => 'أبو صوير']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'El Qantara Gharb', 'ar' => 'قنطرة غرب']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'El Qantara Sharq', 'ar' => 'قنطرة شرق']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'El Qassaseen', 'ar' => 'القصاصين']
            ],
            [
                'city_id' => 12,
                'name' => ['en' => 'Toukh', 'ar' => 'طوخ']
            ],
            // Kafr El Sheikh
            [
                'city_id' => 13,
                'name' => ['en' => 'Kafr El Sheikh City', 'ar' => 'مدينة كفر الشيخ']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Desouk', 'ar' => 'دسوق']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Fouh', 'ar' => 'فوه']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Kafr El Sheikh El Bahary', 'ar' => 'كفر الشيخ البحري']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Qallin', 'ar' => 'قلين']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Riyadh', 'ar' => 'رياض']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Birket El Sab', 'ar' => 'بركة السبع']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Sidi Salem', 'ar' => 'سيدي سالم']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Hamool', 'ar' => 'حمول']
            ],
            [
                'city_id' => 13,
                'name' => ['en' => 'Sakha', 'ar' => 'ساقلته']
            ],
            // Luxor
            [
                'city_id' => 14,
                'name' => ['en' => 'Luxor City', 'ar' => 'مدينة الأقصر']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Armant', 'ar' => 'أرمنت']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Esna', 'ar' => 'إسنا']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Tod', 'ar' => 'طود']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Qurna', 'ar' => 'القرنة']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Armant Center', 'ar' => 'وسط أرمنت']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Al Bayadiyah', 'ar' => 'البياضية']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Al Bayadiyah El Sharqiyah', 'ar' => 'البياضية الشرقية']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Al Bayadiyah El Gharbiyah', 'ar' => 'البياضية الغربية']
            ],
            [
                'city_id' => 14,
                'name' => ['en' => 'Al Gezira Al Garabia', 'ar' => 'الجزيرة الغربية']
            ],

            // Matrouh
            [
                'city_id' => 15,
                'name' => ['en' => 'Marsa Matrouh', 'ar' => 'مرسى مطروح']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'Sidi Barrani', 'ar' => 'سيدي براني']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'El Hamam', 'ar' => 'الحمام']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'El-Negila', 'ar' => 'النجيلة']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'El Saloum', 'ar' => 'السلوم']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'Dabaa', 'ar' => 'الضبعة']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'Siwa', 'ar' => 'سيوة']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'El Negila', 'ar' => 'النجيلة']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'New Nubaria', 'ar' => 'نوبارية الجديدة']
            ],
            [
                'city_id' => 15,
                'name' => ['en' => 'Al-Alamein', 'ar' => 'العلمين']
            ],

            // Minya
            [
                'city_id' => 16,
                'name' => ['en' => 'Minya City', 'ar' => 'مدينة المنيا']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Maghagha', 'ar' => 'مغاغة']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Samalut', 'ar' => 'سمالوط']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Abu Qurqas', 'ar' => 'أبو قرقاص']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Beni Mazar', 'ar' => 'بني مزار']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Matay', 'ar' => 'مطاي']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Malawi', 'ar' => 'ملوي']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Deir Mawas', 'ar' => 'دير مواس']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Akhmim', 'ar' => 'أخميم']
            ],
            [
                'city_id' => 16,
                'name' => ['en' => 'Magaghah', 'ar' => 'مغاغة']
            ],

            // Monufia
            [
                'city_id' => 17,
                'name' => ['en' => 'Shebin El Koum', 'ar' => 'شبين الكوم']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Tala', 'ar' => 'طلخا']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Ashmoun', 'ar' => 'أشمون']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Quesna', 'ar' => 'قويسنا']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Birket El Sab', 'ar' => 'بركة السبع']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Al-Shuhada', 'ar' => 'الشهداء']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Sers El-Lyan', 'ar' => 'سرس الليان']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Menouf', 'ar' => 'منوف']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Sadat City', 'ar' => 'مدينة السادات']
            ],
            [
                'city_id' => 17,
                'name' => ['en' => 'Shubra El-Kheima', 'ar' => 'شبرا الخيمة']
            ],

            // New Valley
            [
                'city_id' => 18,
                'name' => ['en' => 'Kharga', 'ar' => 'الخارجة']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Dakhla', 'ar' => 'الداخلة']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Farafra', 'ar' => 'الفرافرة']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Baris', 'ar' => 'باريس']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Mut', 'ar' => 'موت']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Al-Wahat Al-Bahriya', 'ar' => 'الواحات البحرية']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Al-Dabaa', 'ar' => 'الضبعة']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Al-Qasr', 'ar' => 'القصر']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'Al-Farafra', 'ar' => 'الفرافرة']
            ],
            [
                'city_id' => 18,
                'name' => ['en' => 'El-Mestawaa', 'ar' => 'المستوى']
            ],
            // North Sinai
            [
                'city_id' => 19,
                'name' => ['en' => 'Arish', 'ar' => 'العريش']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Rafah', 'ar' => 'رفح']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Bir al-Abed', 'ar' => 'بئر العبد']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Nakhl', 'ar' => 'نخل']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Hasana', 'ar' => 'الحسنة']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Sheikh Zuweid', 'ar' => 'الشيخ زويد']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Al-Qantarah Gharb', 'ar' => 'القنطرة غرب']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Al-Qantarah Sharq', 'ar' => 'القنطرة شرق']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Al-Arish', 'ar' => 'العريش']
            ],
            [
                'city_id' => 19,
                'name' => ['en' => 'Rafah', 'ar' => 'رفح']
            ],

            // Port Said
            [
                'city_id' => 20,
                'name' => ['en' => 'Port Said', 'ar' => 'بورسعيد']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Port Fouad', 'ar' => 'بورفؤاد']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Arab', 'ar' => 'العرب']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Manakh', 'ar' => 'المناخ']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Zohour', 'ar' => 'الزهور']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Masaeed', 'ar' => 'المساعيد']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Adabia', 'ar' => 'العدبية']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Shuhada', 'ar' => 'الشهداء']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Tayaran', 'ar' => 'الطيران']
            ],
            [
                'city_id' => 20,
                'name' => ['en' => 'Al-Midan', 'ar' => 'الميدان']
            ],

            // Qalyubia
            [
                'city_id' => 21,
                'name' => ['en' => 'Benha', 'ar' => 'بنها']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Qalyub', 'ar' => 'القليوب']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Tukh', 'ar' => 'طوخ']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Shubra al-Khaymah', 'ar' => 'شبرا الخيمة']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Qanatir al-Khayriyah', 'ar' => 'قناطر الخيرية']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Kafr Shukr', 'ar' => 'كفر شكر']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Al-Qanatir al-Khayriyah', 'ar' => 'القناطر الخيرية']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Khanka', 'ar' => 'الخانكة']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Obour', 'ar' => 'العبور']
            ],
            [
                'city_id' => 21,
                'name' => ['en' => 'Shibin al-Qanatir', 'ar' => 'شبين القناطر']
            ],

            // Qena
            [
                'city_id' => 22,
                'name' => ['en' => 'Qena', 'ar' => 'قنا']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Nag Hammadi', 'ar' => 'نجع حمادي']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Dendera', 'ar' => 'دندرة']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Farshout', 'ar' => 'فرشوط']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Qift', 'ar' => 'قفط']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Naqada', 'ar' => 'نقادة']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Abu Tesht', 'ar' => 'أبو تشت']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Elwa', 'ar' => 'إلوة']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Al-Waqf', 'ar' => 'الوقف']
            ],
            [
                'city_id' => 22,
                'name' => ['en' => 'Deshna', 'ar' => 'دشنا']
            ],
            // Red Sea
            [
                'city_id' => 23,
                'name' => ['en' => 'Hurghada', 'ar' => 'الغردقة']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Marsa Alam', 'ar' => 'مرسى علم']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'El Qoseir', 'ar' => 'القصير']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Safaga', 'ar' => 'سفاجا']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Ras Gharib', 'ar' => 'رأس غارب']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Shalateen', 'ar' => 'شلاتين']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Marsa Allam', 'ar' => 'مرسى علم']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Marsa Allam', 'ar' => 'مرسى علم']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Shalateen', 'ar' => 'شلاتين']
            ],
            [
                'city_id' => 23,
                'name' => ['en' => 'Ras Banas', 'ar' => 'رأس بناس']
            ],

            // Sharqia
            [
                'city_id' => 24,
                'name' => ['en' => 'Zagazig', 'ar' => 'الزقازيق']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Abu Hammad', 'ar' => 'أبو حماد']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Al Husseiniyah', 'ar' => 'الحسينية']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Abu Kabeer', 'ar' => 'أبو كبير']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Belbeis', 'ar' => 'بلبيس']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Minya al-Qamh', 'ar' => 'منيا القمح']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Hijazah', 'ar' => 'الهجنازية']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Kafr Saqr', 'ar' => 'كفر صقر']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Mashtool El Souk', 'ar' => 'مشتول السوق']
            ],
            [
                'city_id' => 24,
                'name' => ['en' => 'Abo Kbeer', 'ar' => 'أبو كبير']
            ],

            // Sohag
            [
                'city_id' => 25,
                'name' => ['en' => 'Sohag', 'ar' => 'سوهاج']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Akhmim', 'ar' => 'أخميم']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Gerga', 'ar' => 'جرجا']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Tama', 'ar' => 'طما']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Dar El Salam', 'ar' => 'دار السلام']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Tahta', 'ar' => 'طهطا']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Goha', 'ar' => 'جها']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'El Maragha', 'ar' => 'المراغة']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Saqilatuh', 'ar' => 'ساقلتة']
            ],
            [
                'city_id' => 25,
                'name' => ['en' => 'Girga', 'ar' => 'جرجا']
            ],

            // South Sinai
            [
                'city_id' => 26,
                'name' => ['en' => 'Sharm El Sheikh', 'ar' => 'شرم الشيخ']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Dahab', 'ar' => 'دهب']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Nuweiba', 'ar' => 'نويبع']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Saint Catherine', 'ar' => 'سانت كاترين']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Ras Sedr', 'ar' => 'رأس سدر']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Taba', 'ar' => 'طابا']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Abu Zenima', 'ar' => 'أبو زنيمة']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Nekhel', 'ar' => 'نخل']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'El-Tor', 'ar' => 'الطور']
            ],
            [
                'city_id' => 26,
                'name' => ['en' => 'Wadi Feiran', 'ar' => 'وادي فيران']
            ],

            // Suez
            [
                'city_id' => 27,
                'name' => ['en' => 'Suez', 'ar' => 'السويس']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'El Qantara', 'ar' => 'القنطرة']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'El-Tur', 'ar' => 'الطور']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Arbaeen', 'ar' => 'الأربعين']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Ataqah', 'ar' => 'العتاقة']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Fayed', 'ar' => 'فايد']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'El Qoseir', 'ar' => 'القصير']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Ras Gharib', 'ar' => 'رأس غارب']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Tor Sinai', 'ar' => 'طور سيناء']
            ],
            [
                'city_id' => 27,
                'name' => ['en' => 'Zaafarana', 'ar' => 'زفارنة']
            ],
        ];

        foreach ($regions as $item) {
            DB::table('regions')->insert([
                'city_id' => $item['city_id'],
                'name' => json_encode($item['name']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}