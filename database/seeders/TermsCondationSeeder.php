<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsCondationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terms = [
            // Start Summary
            [
                'description' => [
                    'en' => 'Thank you for using our services. In order to organize the relationship resulting from your use of the Medix.com website ("the Site"), or our application Medix, ("the Application") and the services provided by Medix, these Terms of Use ("the Terms") constitute a legally binding agreement between you, either as an individual or on behalf of an organization or entity represented by law ("You", "Your", "Yours"), and Medix Limited, owner and operator of the Medix website, ("Medix", "We", "Us"). These terms apply to all users of the Site, including but not limited to browsers, vendors, customers, service providers, and content contributors ("Users"). You acknowledge that Medix or any of its subsidiaries reserves the right to restrict or terminate your use of online services if you do not comply with these terms or at the discretion of Medix alone. By accessing the Site or the Application, or using any part of them, you agree that you have read, understood, and agreed to comply with these terms, in addition to the guidelines, policies, or additional rules available on the Site and the Application, including, but not limited to, Medix\'s privacy policy, which is incorporated by reference into these terms. If you do not agree to comply with these terms and follow all applicable laws, guidelines, and policies, do not enter or use the Site.', 
                    'ar' => 'شكرًا لاستخدامك خدماتنا. ومن أجل تنظيم العلاقة الناتجة عن استخدامك لموقع Medix.com ("الموقع")، أو تطبيقنا ميديكس، ("التطبيق") والخدمات التي تقدمها ميديكس، تشكل شروط الاستخدام هذه ("الشروط") اتفاقية ملزمة قانونًا بينك، إما بصفتك فردًا أو نيابة عن منظمة أو كيان تمثّله قانونًا ("أنت" ، "الخاص بك" ، "لك") ، وشركة ميديكس ذات المسؤولية المحدودة، مالك ومشغل موقع ميديكس، ("ميديكس"، "نحن" ، "لدينا"). تُطبق هذه الشروط على جميع مستخدمي الموقع، بما في ذلك على سبيل المثال لا الحصر المتصفحات و / أو البائعين و / أو العملاء و / أو مقدمي الخدمات و / أو المساهمين في المحتوى ("المستخدمون"). ولعلك تدرك أن ميديكس أو أي من الشركات التابعة لها تحتفظ بالحق في تقييد أو وقف استخدامك للخدمات عبر الإنترنت إذا كنت لا تلتزم بهذه الشروط أو وفقًا لتقدير ميديكس وحدها. من خلال الوصول إلى الموقع أو التطبيق أو استخدام أي جزء منهما، فإنك توافق على أنك قد قرأت وفهمت ووافقت على الالتزام بهذه الشروط، بالإضافة إلى الإرشادات أو السياسات أو القواعد الإضافية المتاحة كما هو معمول به على الموقع والتطبيق، بما في ذلك، على سبيل المثال لا الحصر، سياسة الخصوصية لميديكس، والتي تم دمجها بالإشارة إلى هذه الشروط. إذا كنت لا توافق على الالتزام بهذه الشروط وعلى اتباع جميع القوانين والمبادئ التوجيهية والسياسات المعمول بها، فلا تدخل إلى الموقع أو تستخدمه.'
                ], 
            ],
            // End Summary
            // Start Nature of the Content
            [ 
                'title' => [
                    'en' => '1. Nature of the Content Appearing on Our Services',
                    'ar' => '1. طبيعة المحتوى الذي يظهر على خدماتنا',
                ],
                'description' => [
                    'en' => '1.1 Overview Our services may include text, data, graphics, images, or any other content ("Content") that we have created ourselves or by third parties, including contractors marketing with Medix from healthcare providers and partners such as doctors, hospitals, comprehensive clinics, laboratories, radiology centers, and pharmacies.',
                    'ar' => '1.1 نظرة عامة قد تتضمن خدماتنا نصًا أو بيانات أو رسومات أو صورًا أو أي محتوى آخر (يُشار إليه إجمالاً باسم "المحتوى") أنشأناه بمعرفتنا أو من قبل الغير، بما في ذلك المتعاقدين للتسويق مع ميديكس من مقدمي الرعاية الصحية والشركاء مثل الأطباء والمستشفيات والعيادات الشاملة والمختبرات ومراكز الأشعة والصيدليات.',
                ], 
            ],
            [ 
                'terms_condation_id' => 2,
                'description' => [
                    'en' => '1.2 Our Services Our services include our website and application, allowing users to identify healthcare providers and book appointments with them, including clinics, hospitals, or diagnostic laboratories for consultations and physical services. Our services, both public and protected, are collectively referred to as "Services". In other words, our services are only intended to assist you in searching and booking appointments with service providers. You are aware that some services are available under different names. You also acknowledge that services may be provided by (1) some subsidiaries and affiliates of Medix or (2) independent service providers.',
                    'ar' => '1.2 خدماتنا تشمل خدماتنا هذا الموقع والتطبيق مما يتيح للمستخدمين التعرف على مقدمي الرعاية الصحية والحجز لديهم بما في ذلك العيادات والمستشفيات أو مختبرات التشخيص للاستشارات والخدمات الفيزيائية. يُشار إلى خدماتنا العامة والمحمية إجمالًا باسم "الخدمات". بمعنى آخر، تهدف خدماتنا فقط إلى مساعدتك في البحث وحجز موعد مع مقدم الخدمة. أنت تعلم بأن بعض الخدمات متاحة تحت أسماء مختلفة . أنت تعلم أيضًا بأنه قد يتم توفير الخدمات من قبل .'
                ], 
                'sub_description' => [
                    'en' => '(1) some subsidiaries and affiliates of Medix ',
                    'ar' => '(1) بعض الشركات الفرعية والتابعة لـ ميديكس',
                ],
                
            ],
            [ 
                'terms_condation_id' => 2,
                'sub_description' => [
                    'en' => '(2) independent service providers.',
                    'ar' => '(2) مقدمي الخدمات المستقلين.',
                ], 
            ],
            // End Nature of the Content
            // Start Privacy and Security Policy
            [
                'title' => [
                    'en' => '2. Privacy and Security Policy',
                    'ar' => '2. سياسة الخصوصية والأمان',
                ],
                'description' => [
                    'en' => '1.2 Medix and its subsidiaries consider the privacy of your health information to be one of the most important elements in our relationship with you. Our responsibility to maintain the confidentiality of your health information is a responsibility we take seriously. We are legally obligated to maintain the privacy and security of your protected health information. We will promptly notify you in the event of a breach that may compromise the privacy or security of your information. We will not use or disclose your information except as outlined here. You are the sole owner of the data and share it as you wish through our website.',
            
                    'ar' => '1.2 تعتبر ميدكس وشركاتها التابعة خصوصية معلوماتك الصحية من أهم العناصر في علاقتنا معك. مسؤوليتنا في الحفاظ على سرية معلوماتك الصحية هي مسؤولية نأخذها على محمل الجد. نحن مطالبون بموجب القانون بالحفاظ على خصوصية وأمان معلوماتك الصحية المحمية. سنخبرك على الفور في حالة حدوث خرق قد يكشف عن خصوصية أو أمان معلوماتك. و لن نستخدم أو نشارك معلوماتك بخلاف ما هو موضح هنا. حيث تُعتبر أنت مالك البيانات الوحيد و تشاركها عندما ترغب من خلال موقعنا.',
                ]
            ],
            [
                'terms_condation_id' => 3,
                'description' => [
                    'en' => 'For further protection of the confidentiality, integrity, and availability of information on Medix and its sharing, as well as the stability of our services, you agree to the following additional assurances. Accordingly, you agree that you will not do or attempt to:',
                    'ar' => '2.2 لمزيد من الحماية لسرية المعلومات وسلامتها وتوافرها على ميديكس ومشاركتها ، بالإضافة إلى استقرار خدماتنا ، فإنك توافق على الضمانات الإضافية التالية. وبناءً على ذلك ، فإنك توافق على أنك لن تفعل ولن تحاول:',
                ],
                'sub_description' => [
                    'en' => '• Medix and its subsidiaries consider the privacy of your health information to be one of the most important elements in our relationship with you.',
                    'ar' => '• تعتبر ميدكس والشركات التابعة لها أن خصوصية معلوماتك الصحية من أهم العناصر في علاقتنا معك.',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Accessing, using, publishing, or any information or files accessible through our services in a manner that violates applicable laws or regulations or the rights of any individual or entity.',
                    'ar' => '• الوصول إلى خدماتنا أو استخدامها أو نشرها أو أي معلومات أو ملفات يمكن الوصول إليها عبر خدماتنا ، بطريقة تنتهك القوانين واللوائح المعمول بها أو حقوق أي فرد أو كيان.',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Selling or transferring any information listed in our services or using that information to market any product or service – including by sending or facilitating the sending of unsolicited emails or spam messages;',
                    'ar' => '• بيع أو تحويل أي معلومات مُدرجة في خدماتنا أو استخدام تلك المعلومات لتسويق أي منتج أو خدمة - بما في ذلك عن طريق إرسال أو تسهيل إرسال رسائل البريد الإلكتروني غير المرغوب فيها أو الرسائل الاقتحامية (SPAM) ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Researching, probing, or testing weaknesses in our services, system, or network supporting our services, or bypassing security or authentication measures;',
                    'ar' => '• بحث أو فحص أو اختبار نقاط الضعف في خدماتنا ، أو النظام أو الشبكة التي تدعم خدماتنا ، أو التحايل على التدابير الأمنية أو المصادقة ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Disabling, evading, bypassing, avoiding, removing, deactivating, or otherwise circumventing any technical measures we undertake to protect the stability of our services, or the confidentiality, integrity, or availability of any information, content, or data present in our services;',
                    'ar' => '• تعطيل أو إغفال أو تجاوز أو تجنب أو إزالة أو إلغاء تنشيط أو التحايل بطريقة أخرى على أي تدابير فنية نُجريها لحماية استقرار خدماتنا ، أو سرية أو سلامة أو توافر أي معلومات أو محتوى أو بيانات موجودة في خدماتنا ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Providing our services to any software, code, or any other device (1) allowing any unauthorized access to our systems or any programs, devices, files, or data on them, (2) disrupting, damaging, interfering with the operation of our systems or any programs, devices, files, or data on them, or (3) overloading or interfering with the functional performance of our services;',
                    'ar' => '• تقديم خدماتنا لأي برنامج أو رمز أو أي جهاز آخر (1) يسمح بأي طريقة بالوصول غير المصرح به إلى أنظمتنا أو أي برامج أو أجهزة أو ملفات أو بيانات موجودة عليها ، (2) تعطيل أو إتلاف أو التدخل أو التأثير سلبًا على تشغيل أنظمتنا أو أي برامج أو أجهزة أو ملفات أو بيانات موجودة عليها ، أو (3) يثقل أو يتداخل مع الأداء الوظيفي لخدماتنا ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Disassembling or reverse engineering our services;',
                    'ar' => '• تفكيك أو عكس هندسة خدماتنا ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Obtaining, retrieving, indexing, or publishing any portion of our services unless you are a general search engine participating in general search services;',
                    'ar' => '• الحصول على أو استرداد أو فهرسة أو نشر أي جزء من خدماتنا ما لم تكن محرك بحث عام يشارك في خدمات البحث العامة ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Disabling or circumventing the warranties of use of our application programming interface (API), including warranties designed to regulate the nature or amount of data you are allowed to extract from our services, or the repetition of access to this data; or making calls to our API other than those permitted in our API documentation;',
                    'ar' => '• التحايل على ضمانات استخدام واجهة برمجة التطبيقات لدينا ، بما في ذلك الضمانات المصممة لتنظيم طبيعة أو مقدار البيانات التي يُسمح لك باستخراجها من خدماتنا ، أو تكرار الوصول إلى هذه البيانات ؛ أو إجراء مكالمات إلى واجهة برمجة التطبيقات الخاصة بنا بخلاف تلك المصرح بها في وثائق واجهة برمجة التطبيقات لدينا ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Removing any copyright, trademark, or other proprietary notices appearing in our services or;',
                    'ar' => '• إزالة أي حقوق نشر أو علامة تجارية أو إشعارات حقوق الملكية الأخرى الواردة في خدماتنا أو ؛',
                ],
            ],
            [
                'terms_condation_id' => 3,
                'sub_description' => [
                    'en' => '• Engaging in any other activity not explicitly allowed in these terms.',
                    'ar' => '• المشاركة في أي نشاط آخر غير المسموح به صراحةً في هذه الشروط.',
                ],
            ],
            // End Privacy and Security Policy
            // Start Payment
            [
                'title' => [
                    'en' => '3. Payment',
                    'ar' => '3. الدفع',
                ],
                'description' => [
                    'en' => '3.1 Payment Collection.',
                    'ar' => '3.1 تحصيل المدفوعات'
                ]
                
            ],
            [  
                'terms_condation_id' => 4,
                'description' => [
                    'en' => '3.1.1 You can choose either (1) cash payment at the service provider\'s location at the time of consultation or (2) online payment through our website or application. When collecting amounts on behalf of service providers, you expressly agree to comply with the payment terms of this service provider. If necessary, we will include any taxes. We currently accept payment by credit/debit cards, Fawry service, or digital wallets. You agree to make all these payments in a timely manner and acknowledge that you are responsible for any amounts associated with your account. Depending on the service, we will collect payments before or after providing the service.',
                    'ar' => '3.1.1 يمكنك اختيار إما (1) الدفع نقدًا في موقع مقدم الخدمة في وقت الاستشارة أو (2) الدفع عبر الإنترنت من خلال موقعنا أو تطبيقنا. عند تحصيل المبالغ نيابة عن مقدمي الخدمات، فإنك توافق صراحًا على الالتزام بشروط الدفع الخاصة بمقدم الخدمة هذا. و عند الاقتضاء ، سنقوم بتضمين أية ضرائب. نقبل حاليًا الدفع من خلال بطاقات الائتمان / الخصم أو خدمة فوري أو المحافظ الرقمية. أنت توافق على إجراء جميع هذه المدفوعات في الوقت المناسب ، وتقر بأنك مسؤول عن أي مبالغ مرتبطة بحسابك. و اعتمادًا على الخدمة ، سنقوم بتحصيل المدفوعات قبل أو بعد تقديم الخدمة.'
                ]
            ],
            [   'terms_condation_id' => 4,
                'description' => [
                    'en' => '3.1.2 We reserve the right to determine, modify, or remove any fees, at our sole discretion. We may also offer promotions or discounts, which will change the amount paid, but are subject only to the terms and conditions of this promotional offer or discount.',
                    'ar' => '3.1.2 نحتفظ بالحق في تحديد أو تعديل أو إزالة أي رسوم ، وفقًا لتقديرنا الخاص. قد نقدم أيضًا عروضًا ترويجية أو خصومات ، والتي ستغير المبلغ المدفوع ، ولكن تخضع فقط لشروط وأحكام هذا العرض الترويجي أو الخصم.',
                ],
            ],
            // End Payment

            // Start Refund
            [
                'terms_condation_id' => 4,
                'description' => [
                    'en' => '3.2 Refund Policy',
                    'ar' => '3.2 سياسة الاسترداد',
                ],

                'sub_description' => [
                    'en' => '3.2.1 The fees you pay are final and non-refundable unless otherwise specified by Medix.',
                    'ar' => '3.2.1 الرسوم التي تدفعها نهائية وغير قابلة للاسترداد ، ما لم تحدد ميديكس خلاف ذلك.',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.2 Refunds will be made using the same payment method, if available.',
                    'ar' => '3.2.2 تُسترد الأموال بنفس طريقة الدفع ، إن وُجدت.',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.3 Medix reserves the right to refund any amounts to users\' accounts for use in other services at its own discretion.',
                    'ar' => '3.2.3 تحتفظ ميديكس بحقها في استرداد أي مبالغ إلى حساب المستخدمين لاستخدامها في خدمات أخرى وفقًا لتقديرها الخاص.',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.4 Refunded amounts are not applicable if the user is not satisfied with the medical service provided.',
                    'ar' => '3.2.4 المبالغ المُستردة غير قابلة للتطبيق إذا كان المستخدم غير راضٍ عن الخدمة الطبية المُقدمة.',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.5 Users are entitled to a full refund if:',
                    'ar' => '3.2.5 يحق للمستخدم استرداد كامل المبلغ إذا:',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.5.1. The user cancels the appointment before the appointment date;',
                    'ar' => '3.2.5.1. ألغى المستخدم الحجز قبل تاريخ الموعد؛',
                ]
            ],
            [ 
                'terms_condation_id' => 4,
                'sub_description' => [
                    'en' => '3.2.5.2. The service provider cancels or does not attend the appointment for which the user paid.',
                    'ar' => '3.2.5.2. ألغى مقدم الخدمة ، أو لم يحضر ، الموعد الذي دفع المستخدم من أجله ؛',
                ]
            ],
            // End Refund
            // Start Compliance
            [
                'title' => [
                    'en' => '4. Compliance',
                    'ar' => '4. الامتثال',
                ],
                'description' => [
                    'en' => '4.1 You must comply with these terms and any policies referenced on the site and any laws, regulations, rules, licenses, or restrictions adopted by Medix.',
                    'ar' => '4.1 يتعين عليك الامتثال لهذه الشروط وأي سياسات مُشار إليها على الموقع وأي قوانين أو لوائح أو قواعد أو تراخيص أو قيود معتمدة من قبل ميدكس.',
                ]
            ],
            // End Compliance

            // Start User Registration
            [
                'title' => [
                    'en' => '5. User Registration',
                    'ar' => '5. تسجيل المستخدم',
                ],
                'description' => [
                    'en' => '5.1 You are not required to register to visit the website. To access certain features in the services, you will need to register with Medix and create a ("User Account") through the online registration process on the site. Your account gives you access to the services and features that we may create and maintain from time to time at our discretion. When creating an account, you must provide Medix with accurate and complete registration information as required on the registration form. You must promptly notify Medix if any of this information changes. If you fail to provide or update this information, you will not be able to receive the required information through the site. Medix also reserves the right to terminate or prevent your use of the services.',
                    'ar' => '5.1 ليس عليك الالتحاق بالتسجيل لزيارة الموقع. للوصول إلى بعض الميزات في الخدمات ، ستحتاج إلى التسجيل مع ميدكس وإنشاء ("حساب مستخدم") من خلال عملية التسجيل عبر الإنترنت على الموقع. يمنحك حسابك الوصول إلى الخدمات والميزات التي قد ننشئها ونحتفظ بها من وقت لآخر بتقديرنا. عند إنشاء حساب ، يجب عليك تقديم معلومات تسجيل دقيقة وكاملة لميدكس كما هو مطلوب في نموذج التسجيل. يجب عليك إخطار ميدكس على الفور إذا تغيرت أي من هذه المعلومات. إذا فشلت في تقديم أو تحديث هذه المعلومات ، فلن تتمكن من استلام المعلومات المطلوبة من خلال الموقع. تحتفظ ميدكس أيضًا بالحق في إنهاء أو منع استخدامك للخدمات.',
                ],
            ],
            [
                'terms_condation_id' => 6,
                'description' => [
                    'en' => '5.2 Once an account is created, you will be asked to explicitly agree to these terms. You also acknowledge that you are over 18 years old to use our services, and we are not responsible for the use of our services if you are under 18 years old.',
                    'ar' => '5.2 بمجرد إنشاء حساب ، سيُطلب منك الموافقة بوضوح على هذه الشروط. كما تقر بأنك تبلغ من العمر أكثر من 18 عامًا لاستخدام خدماتنا ، ونحن لسنا مسؤولين عن استخدام خدماتنا إذا كنت تقل عن 18 عامًا.',
                ],
            ],
            [
                'terms_condation_id' => 6,
                'description' => [
                    'en' => '5.3 You must choose a password to access your user account and keep it confidential at all times. You also understand that you will be responsible for any actions/activities carried out on your user account by unauthorized parties. You must notify us if you strongly believe that your account has been compromised. Under no circumstances should you respond to a request for your password, especially a request from someone claiming to be a Medix employee. You are not allowed to delegate, assign, or transfer your user account to others. You must also realize that access to your account will be denied if you fail to enter your password correctly twice in a row.',
                    'ar' => '5.3 يجب عليك اختيار كلمة مرور للوصول إلى حساب المستخدم الخاص بك والحفاظ عليها سرية في جميع الأوقات. كما تفهم أنك ستكون مسؤولًا عن أي إجراءات / أنشطة يقوم بها أطراف غير معتمدة على حسابك. يجب عليك إعلامنا إذا كنت تعتقد بقوة أن حسابك قد تعرض للاختراق. في أي حال من الأحوال يجب عليك الرد على طلب كلمة المرور الخاصة بك ، خاصة طلبًا من شخص يدعي أنه موظف في ميدكس. غير مسموح لك بتفويض أو تعيين أو نقل حساب المستخدم الخاص بك إلى الآخرين. يجب أن تدرك أيضًا أن الوصول إلى حسابك سيتم رفضه إذا فشلت في إدخال كلمة المرور بشكل صحيح مرتين متتاليتين.',
                ],
            ],
            [
                'terms_condation_id' => 6,
                'description' => [
                    'en' => '5.4 By accessing and using our services, you agree to our use of your email address to send service-related notifications, feature changes, or special offers, including any notifications required by law, instead of contacting you by regular mail.',
                    'ar' => '5.4 عن طريق الوصول واستخدام خدماتنا ، فإنك توافق على استخدام عنوان بريدك الإلكتروني لإرسال إشعارات تتعلق بالخدمة ، أو تغييرات في الميزات ، أو عروض خاصة ، بما في ذلك أي إشعارات مطلوبة بموجب القانون ، بدلاً من الاتصال بك عبر البريد العادي.',
                ],
            ],
            // End User Registration
            // Start Accuracy, Completeness, and Timeliness of Information
            [
                'title' => [
                    'en' => '6. Accuracy, Completeness, and Timeliness of Information',
                    'ar' => '6. دقة واكتمال وجديد المعلومات',
                ],
                'description' => [
                    'en' => '6.1 We are not responsible if the information available on this site is inaccurate, incomplete, or outdated. The materials provided on this site are for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary sources of information that are more accurate, complete, or timely. Any reliance on the materials on this site is at your own risk.',
                    'ar' => '6.1 نحن لسنا مسؤولين إذا كانت المعلومات المتاحة على هذا الموقع غير دقيقة أو غير كاملة أو غير محدثة. المواد المقدمة على هذا الموقع هي للمعلومات العامة فقط ويجب عدم الاعتماد عليها أو استخدامها كمصدر وحيد لاتخاذ القرارات دون الرجوع إلى المصادر الرئيسية للمعلومات التي تكون أكثر دقة أو اكتمالاً أو جديدة. أي اعتماد على المواد الموجودة على هذا الموقع يكون على مسؤوليتك الخاصة.',
                ],
            ],
            [
                'terms_condation_id' => 7,
                'description' => [
                    'en' => '6.2 This site may contain certain historical information. The historical information is not necessarily current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we are not obligated to update any information on our site. You agree that it is your responsibility to monitor changes to our site.',
                    'ar' => '6.2 يمكن أن يحتوي هذا الموقع على معلومات تاريخية معينة. لا يعني أن المعلومات التاريخية حالية وتُقدم فقط لمرجعك الشخصي. نحن نحتفظ بالحق في تعديل محتويات هذا الموقع في أي وقت ، ولكننا غير ملزمين بتحديث أي معلومات على موقعنا. أنت توافق على أنه من مسؤوليتك مراقبة التغييرات على موقعنا.',
                ],
            ],
            // End Accuracy, Completeness, and Timeliness of Information
            // Start User Comments, Feedback, and Other Suggestions 
            [
                'title' => [
                    'en' => '7. User Comments, Feedback, and Other Suggestions',
                    'ar' => '7. التعليقات والملاحظات والاقتراحات الأخرى للمستخدم',
                ],
                'description' => [
                    'en' => '7.1 If you, at our request, submit certain specific suggestions (e.g., contest entries) or without a request from us, you submit ideas, suggestions, proposals, creative plans, or other materials, whether online, by email, by postal mail, or otherwise (generally referred to as "Comments"), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate, and use in any other way any comments you send to us. We are not obligated (1) to keep any comments confidential; (2) to pay compensation for any comments; or (3) to respond to any comments.',
                    'ar' => '7.1 إذا قدمت ، بناءً على طلبنا ، بعض الاقتراحات المحددة (على سبيل المثال ، مشاركات المسابقات) أو بدون طلب منا ، قمت بتقديم أفكار أو اقتراحات أو مقترحات أو خطط إبداعية أو مواد أخرى ، سواء عبر الإنترنت أو عبر البريد الإلكتروني أو عبر البريد العادي أو بأي وسيلة أخرى (يشار إليها عمومًا باسم "التعليقات") ، فإنك توافق على أننا قد نقوم في أي وقت ، دون قيد أو شرط ، بتحرير ونسخ ونشر وتوزيع وترجمة واستخدام أي تعليقات ترسلها إلينا بأي طريقة أخرى. وليس علينا أي التزام (1) بالحفاظ على سرية أي تعليقات ؛ (2) لدفع تعويض عن أي تعليقات ؛ أو (3) للرد على أي تعليقات.',
                ],
            ],
            [ 
                'terms_condation_id' => 8,
                'description' => [
                    'en' => '7.2 We may, but have no obligation to, monitor, edit, or remove content that we determine, in our sole discretion, is unlawful, offensive, threatening, defamatory, libelous, obscene, or otherwise objectionable or violates these terms of use.',
                    'ar' => '7.2 قد نقوم بمراقبة وتحرير أو إزالة المحتوى الذي نحدد ، بناءً على تقديرنا الخاص ، أنه غير قانوني أو مسيء أو يشكل تهديدًا أو يشوه السمعة أو يكون مسيئًا أو فاحشًا أو غير مقبول بطريقة أخرى أو ينتهك هذه الشروط الاستخدامية.',
                ],
            ],
            [ 
                'terms_condation_id' => 8,
                'description' => [
                    'en' => '7.3 You agree not to violate your comments any third-party rights, including copyright, trademark, privacy, personality, or other personal or proprietary rights. You also agree not to contain defamatory, illegal, offensive, or obscene material, or contain any computer viruses or other malicious software that could affect the operation of the service or any related website. You may not use a false email address, pretend to be someone other than yourself, or mislead us or third parties as to the origin of any comments. You are solely responsible for any comments you post and also responsible for their accuracy. We are not responsible for any comments posted by you or posted by others.',
                    'ar' => '7.3 توافق على عدم انتهاك تعليقاتك لأي حقوق للأطراف الثالثة ، بما في ذلك حقوق الطبع والنشر والعلامات التجارية والخصوصية والشخصية أو الحقوق الأخرى الشخصية أو الملكية. كما توافق على عدم احتواء مواد مشهورة أو غير قانونية أو مسيئة أو فاحشة ، أو تحتوي على أي فيروسات كمبيوتر أو برامج خبيثة أخرى قد تؤثر على عمل الخدمة أو أي موقع ويب ذي صلة. قد لا تستخدم عنوان بريد إلكتروني زائفًا ، أو تتظاهر بأنك شخص آخر غيرك ، أو تضللنا أو الأطراف الثالثة بشأن مصدر أي تعليقات. أنت المسؤول الوحيد عن أي تعليقات تنشرها ومسؤول أيضًا عن دقتها. لسنا مسؤولين عن أي تعليقات تنشرها أنت أو ينشرها الآخرون.',
                ],
            ],
            // End User Comments, Feedback, and Other Suggestions 
            // Start Errors, Inaccuracies, and Omissions 
            [
                'title' => [
                    'en' => '8. Errors, Inaccuracies, and Omissions',
                    'ar' => '8. الأخطاء والتحريفات والإغفال',
                ],
                'description' => [
                    'en' => '8.1 Sometimes there may be information on our site that contains typographical errors, inaccuracies, or omissions that may relate to product descriptions, pricing, promotions, offers, shipping charges, product transit times, and availability. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update information or cancel orders if any information in the service or on any related website is inaccurate at any time without prior notice.',
                    'ar' => '8.1 في بعض الأحيان قد تحتوي موقعنا على معلومات تحتوي على أخطاء طباعية أو عدم دقة أو إغفالات قد تتعلق بوصف المنتجات أو التسعير أو الترقيات أو العروض أو رسوم الشحن أو أوقات ترانزيت المنتج أو التوفر. نحتفظ بالحق في تصحيح أي أخطاء أو عدم دقة أو إغفالات وتغيير أو تحديث المعلومات أو إلغاء الطلبات إذا كانت أي معلومات في الخدمة أو على أي موقع ويب ذي صلة غير دقيقة في أي وقت دون إشعار مسبق.',
                ],
            ],
            // End Errors, Inaccuracies, and Omissions 
        ];

        foreach ($terms as $item) {
            DB::table('terms_condations')->insert([
                'user_id' => 1,
                'terms_condation_id' => @$item['terms_condation_id'],
                'title' => json_encode(@$item['title']),
                'description' => json_encode(@$item['description']),
                'sub_description' => json_encode(@$item['sub_description']),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
