<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advices = [
            [
                'title' => ['en' => 'Reduced Risk of Stroke', 'ar' =>'تقليل خطر السكتة الدماغية'],
                'description' => ['en' => 'Drinking coffee in moderation has been associated with a decreased risk of stroke.', 'ar' => 'تناول القهوة بشكل معتدل قد ارتبط بتقليل خطر الإصابة بالسكتة الدماغية.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Balanced Nutrition', 'ar' =>'تغذية متوازنة'],
                'description' => ['en' => 'Eating a balanced diet rich in fruits, vegetables, and whole grains promotes overall health.', 'ar' =>'تناول نظام غذائي متوازن يحتوي على الفواكه والخضروات والحبوب الكاملة يعزز الصحة العامة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Portion Control', 'ar' =>'السيطرة على الحصص'],
                'description' => ['en' => 'Controlling portion sizes helps manage weight and prevent overeating.', 'ar' => 'التحكم في حجم الحصص يساعد في إدارة الوزن ومنع الأكل الزائد.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Moderate Coffee Consumption', 'ar' =>'استهلاك القهوة بشكل معتدل'],
                'description' => ['en' => 'Moderate consumption of coffee can boost alertness and improve mental focus.', 'ar' => 'استهلاك القهوة بشكل معتدل يمكن أن يعزز اليقظة ويحسن التركيز العقلي.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Antioxidant Properties', 'ar' =>'الخصائص المضادة للأكسدة'],
                'description' => ['en' => 'Coffee contains antioxidants that may help reduce the risk of certain diseases.', 'ar' =>'تحتوي القهوة على مضادات الأكسدة التي قد تساعد في تقليل خطر الإصابة ببعض الأمراض.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Hydration is Key', 'ar' =>'الترطيب مهم جداً'],
                'description' => ['en' => 'Staying hydrated is essential for overall health and helps maintain proper bodily functions.', 'ar' =>'البقاء مترطبًا أمر أساسي للصحة العامة ويساعد في الحفاظ على وظائف الجسم السليمة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Include Healthy Fats', 'ar' =>'تضمين الدهون الصحية'],
                'description' => ['en' => 'Incorporating sources of healthy fats like avocados and nuts promotes heart health.', 'ar' =>'إدماج مصادر للدهون الصحية مثل الأفوكادو والمكسرات يعزز صحة القلب.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Rest and Recovery', 'ar' =>'الراحة والتعافي'],
                'description' => ['en' => 'Allowing time for rest and recovery between workouts is crucial for muscle repair and growth.', 'ar' =>'السماح بالوقت للراحة والتعافي بين التمارين أمر أساسي لإصلاح العضلات ونموها.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Set Realistic Goals', 'ar' =>'تحديد أهداف واقعية'],
                'description' => ['en' => 'Setting achievable fitness goals helps maintain motivation and progress.', 'ar' =>'تحديد أهداف لياقة بدنية يمكن تحقيقها يساعد في الحفاظ على الدافع والتقدم.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Improved Physical Performance', 'ar' =>'تحسين الأداء البدني'],
                'description' => ['en' =>'Caffeine in coffee can enhance physical performance by increasing adrenaline levels in the blood.', 'ar' =>'يمكن للكافيين في القهوة تعزيز الأداء البدني عن طريق زيادة مستويات الأدرينالين في الدم.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Stay Active', 'ar' =>'ابق نشيطًا'],
                'description' => ['en' => 'Regular physical activity is important for maintaining overall health and reducing the risk of chronic diseases.', 'ar' =>'النشاط البدني الدوري مهم للحفاظ على الصحة العامة وتقليل خطر الأمراض المزمنة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Get Enough Sleep', 'ar' =>'احصل على قسط كافٍ من النوم'],
                'description' => ['en' => 'Adequate sleep is crucial for mental health, immune function, and overall well-being.', 'ar' =>'النوم الكافي أمر أساسي للصحة العقلية ووظيفة الجهاز المناعي والعافية العامة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Reduce Stress', 'ar' =>'خفض مستويات التوتر'],
                'description' => ['en' => 'Chronic stress can negatively impact both physical and mental health. Finding ways to manage stress is important for overall well-being.', 'ar' =>'يمكن أن يؤثر التوتر المزمن سلبًا على الصحة البدنية والعقلية. إيجاد طرق لإدارة التوتر مهم للعافية العامة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Practice Good Hygiene', 'ar' =>'ممارسة النظافة الجيدة'],
                'description' => ['en' => 'Maintaining good hygiene habits, such as washing hands regularly and covering the mouth when coughing or sneezing, helps prevent the spread of illness.', 'ar' =>'الحفاظ على عادات النظافة الجيدة، مثل غسل اليدين بانتظام وتغطية الفم عند السعال أو العطس، يساعد في منع انتشار الأمراض.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Regular Health Check-ups', 'ar' =>'فحوصات صحية دورية'],
                'description' => ['en' => 'Routine health check-ups with healthcare providers help detect potential health issues early and promote preventive care.', 'ar' =>'الفحوص الصحية الدورية مع مقدمي الرعاية الصحية تساعد في اكتشاف المشاكل الصحية المحتملة في وقت مبكر وتعزيز الرعاية الوقائية.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Maintain a Healthy Weight', 'ar' =>'الحفاظ على وزن صحي'],
                'description' => ['en' => 'Maintaining a healthy weight through balanced nutrition and regular exercise reduces the risk of chronic diseases and promotes overall well-being.', 'ar' =>'الحفاظ على وزن صحي من خلال التغذية المتوازنة وممارسة الرياضة بانتظام يقلل من خطر الإصابة بالأمراض المزمنة ويعزز العافية العامة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Quit Smoking', 'ar' =>'الإقلاع عن التدخين'],
                'description' => ['en' => 'Quitting smoking reduces the risk of developing cancer, heart disease, and respiratory problems, among other health benefits.', 'ar' =>'الإقلاع عن التدخين يقلل من خطر الإصابة بالسرطان وأمراض القلب ومشاكل الجهاز التنفسي، بالإضافة إلى فوائد صحية أخرى.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Limit Alcohol Consumption', 'ar' =>'تقليل استهلاك الكحول'],
                'description' => ['en' => 'Excessive alcohol consumption can lead to various health problems, including liver disease and increased risk of accidents.', 'ar' =>'يمكن أن يؤدي استهلاك الكحول الزائد إلى مشاكل صحية مختلفة، بما في ذلك أمراض الكبد وزيادة خطر الحوادث.'],
                'image' => 'assets/images/advices/default.png',
            ],
            // [
            //     'title' => ['en' => 'Practice Safe Sex', 'ar' =>'ممارسة الجنس الآمن'],
            //     'description' => ['en' => 'Using protection such as condoms reduces the risk of sexually transmitted infections (STIs) and unwanted pregnancies.', 'ar' =>'استخدام وسائل الوقاية مثل الكوندومات يقلل من خطر الإصابة بالعدوى المنقولة جنسيًا (STIs) والحمل غير المرغوب فيه.'],
            //     'image' => 'assets/images/advices/default.png',
            // ],
            [
                'title' => ['en' => 'Stay Hydrated', 'ar' =>'البقاء مترطبًا'],
                'description' => ['en' => 'Drinking an adequate amount of water throughout the day is important for overall health and helps maintain proper bodily functions.', 'ar' =>'شرب كمية كافية من الماء طوال اليوم أمر مهم للصحة العامة ويساعد في الحفاظ على وظائف الجسم السليمة.'],
                'image' => 'assets/images/advices/default.png',
            ],
            [
                'title' => ['en' => 'Manage Screen Time', 'ar' =>'إدارة وقت الشاشة'],
                'description' => ['en' => 'Limiting the amount of time spent in front of screens, such as computers and smartphones, can help reduce eye strain and improve sleep quality.', 'ar' =>'تقليل مدة الوقت المقضى أمام الشاشات، مثل الكمبيوترات والهواتف الذكية، يمكن أن يساعد في تقليل إجهاد العين وتحسين جودة النوم.'],
                'image' => 'assets/images/advices/default.png',
            ],
        ];

        foreach ($advices as $item) {
            DB::table('advice')->insert([
                'user_id' => 1,
                'title' => json_encode($item['title']),
                'description' => json_encode($item['description']),
                'img' => $item['image'],
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}