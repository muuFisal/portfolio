<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Event;
use App\Models\Experience;
use App\Models\PortfolioComment;
use App\Models\PortfolioNavLink;
use App\Models\PortfolioPage;
use App\Models\PortfolioProfile;
use App\Models\PortfolioSection;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        ProjectImage::query()->delete();
        Project::query()->delete();
        Experience::query()->delete();
        Event::query()->delete();
        Testimonial::query()->delete();
        Achievement::query()->delete();
        Skill::query()->delete();
        PortfolioNavLink::query()->delete();
        PortfolioPage::query()->delete();
        PortfolioSection::query()->delete();
        PortfolioProfile::query()->delete();
        PortfolioComment::query()->forceDelete();

        PortfolioProfile::query()->create([
            'full_name' => 'Mohamed Fisal',
            'headline' => $this->t(
                'Backend engineer shipping APIs, dashboards, and integrations.',
                'مهندس باك إند يسلّم واجهات برمجية ولوحات تحكم وتكاملات.'
            ),
            'short_bio' => $this->t(
                'Laravel-focused with strong API contracts and practical frontend collaboration.',
                'يركز على Laravel مع عقود API قوية وتعاون عملي مع الواجهة الأمامية.'
            ),
            'long_bio' => $this->t(
                'I build maintainable backend systems with clear response shapes and real delivery discipline.',
                'أبني أنظمة خلفية قابلة للصيانة مع أشكال استجابة واضحة وانضباط حقيقي في التسليم.'
            ),
            'location' => $this->t('Cairo, Egypt', 'القاهرة، مصر'),
            'email' => 'hello@fisal.dev',
            'phone' => '+20 100 000 0000',
            'availability_text' => $this->t(
                'Available for freelance and product work.',
                'متاح للمشاريع الحرة والعمل على المنتجات.'
            ),
            'years_experience' => 4,
            'projects_delivered' => 24,
            'clients_count' => 12,
            'focus_areas' => [
                $this->t('Laravel APIs', 'واجهات Laravel البرمجية'),
                $this->t('Payments', 'المدفوعات'),
                $this->t('Dashboards', 'لوحات التحكم'),
            ],
            'hero_badges' => [
                $this->t('Laravel', 'لارافيل'),
                $this->t('REST APIs', 'واجهات REST'),
                $this->t('React-ready', 'جاهز للتكامل مع React'),
            ],
            'primary_cta_label' => $this->t('View Projects', 'عرض المشاريع'),
            'primary_cta_url' => '/projects',
            'secondary_cta_label' => $this->t('Contact Me', 'تواصل معي'),
            'secondary_cta_url' => '/contact',
            'resume' => null,
            'profile_image' => 'uploads/users/1758033097_68c974c9d8ca5_about_2.jpg',
            'is_active' => true,
        ]);

        foreach ([
            ['Home', 'الرئيسية', '/', 'home', 'home', 10],
            ['About', 'من أنا', '/about', 'about', 'user', 20],
            ['Projects', 'المشاريع', '/projects', 'projects', 'briefcase', 30],
            ['Contact', 'تواصل', '/contact', 'contact', 'mail', 40],
        ] as [$en, $ar, $href, $pageKey, $icon, $order]) {
            PortfolioNavLink::query()->create([
                'label' => $this->t($en, $ar),
                'href' => $href,
                'page_key' => $pageKey,
                'target' => '_self',
                'icon' => $icon,
                'is_active' => true,
                'sort_order' => $order,
            ]);
        }

        foreach ([
            ['home', 'Home', 'الرئيسية', 'Mohamed Fisal | Portfolio', 'محمد فيصل | البورتفوليو', 'Home page for the portfolio.', 'الصفحة الرئيسية للبورتفوليو.', ['portfolio', 'laravel'], 'https://portfolio.brmja.tech', 'WebSite'],
            ['about', 'About', 'من أنا', 'About Mohamed Fisal', 'عن محمد فيصل', 'Profile and experience overview.', 'ملف شخصي ونظرة على الخبرات.', ['about', 'experience'], 'https://portfolio.brmja.tech/about', 'ProfilePage'],
            ['projects', 'Projects', 'المشاريع', 'Projects by Mohamed Fisal', 'مشاريع محمد فيصل', 'Selected portfolio projects.', 'مشاريع مختارة من البورتفوليو.', ['projects', 'case-study'], 'https://portfolio.brmja.tech/projects', 'CollectionPage'],
            ['contact', 'Contact', 'تواصل', 'Contact Mohamed Fisal', 'تواصل مع محمد فيصل', 'Contact page for backend work.', 'صفحة التواصل لخدمات الباك إند.', ['contact', 'backend'], 'https://portfolio.brmja.tech/contact', 'ContactPage'],
        ] as [$key, $titleEn, $titleAr, $seoEn, $seoAr, $descEn, $descAr, $keywords, $canonical, $schema]) {
            PortfolioPage::query()->create([
                'page_key' => $key,
                'title' => $this->t($titleEn, $titleAr),
                'seo_title' => $this->t($seoEn, $seoAr),
                'seo_description' => $this->t($descEn, $descAr),
                'seo_keywords' => $keywords,
                'og_image' => 'uploads/images/Frame 2087326965.png',
                'canonical_url' => $canonical,
                'robots' => 'index,follow',
                'extra_meta' => ['schema' => $schema],
            ]);
        }

        $sections = [
            [
                'key' => 'about',
                'title' => $this->t('About Me', 'نبذة عني'),
                'subtitle' => $this->t('Engineer, collaborator, and product-minded builder.', 'مهندس ومتعاون وصاحب عقلية منتج.'),
                'content' => ['story' => $this->t('I care about clarity, maintainability, and frontend-ready APIs.', 'أهتم بالوضوح وقابلية الصيانة وواجهات جاهزة للتكامل.')],
                'items' => [
                    ['title' => $this->t('Ownership', 'تحمل المسؤولية'), 'description' => $this->t('From requirements to post-release fixes.', 'من المتطلبات حتى ما بعد الإطلاق.')],
                    ['title' => $this->t('Communication', 'التواصل'), 'description' => $this->t('Backend constraints translated into frontend decisions.', 'تحويل قيود الباك إند إلى قرارات واضحة للواجهة.')],
                ],
                'image' => 'uploads/users/1758033180_68c9751c64936_about_2.jpg',
                'sort_order' => 10,
            ],
            [
                'key' => 'home.hero',
                'title' => $this->t('Backend systems with product discipline.', 'أنظمة باك إند بانضباط منتجي.'),
                'subtitle' => $this->t('Laravel, APIs, dashboards, and integrations built for reliable delivery.', 'Laravel وواجهات برمجية ولوحات تحكم وتكاملات بتسليم موثوق.'),
                'content' => ['description' => $this->t('I build backend infrastructure that frontend teams can integrate with quickly.', 'أبني بنية خلفية يمكن لفِرق الواجهة التكامل معها بسرعة.')],
                'items' => null,
                'image' => 'uploads/users/1758033097_68c974c9d8ca5_about_2.jpg',
                'sort_order' => 20,
            ],
            [
                'key' => 'home.highlights',
                'title' => $this->t('Highlights', 'أبرز الأرقام'),
                'subtitle' => $this->t('A quick summary of shipped work.', 'ملخص سريع للأعمال المنجزة.'),
                'content' => ['description' => $this->t('Numbers across products, dashboards, and integrations.', 'أرقام عبر المنتجات ولوحات التحكم والتكاملات.')],
                'items' => null,
                'image' => null,
                'sort_order' => 30,
            ],
            [
                'key' => 'home.featured_projects',
                'title' => $this->t('Featured Projects', 'مشاريع مميزة'),
                'subtitle' => $this->t('Selected builds with strong backend stories.', 'أعمال مختارة تحمل قصصًا قوية في الباك إند.'),
                'content' => ['description' => $this->t('Most relevant work for product teams.', 'أكثر الأعمال صلة بفرق المنتجات.')],
                'items' => null,
                'image' => null,
                'sort_order' => 40,
            ],
            [
                'key' => 'home.process',
                'title' => $this->t('How I Work', 'آلية العمل'),
                'subtitle' => $this->t('A delivery process tuned for clarity.', 'خطوات عمل مضبوطة على الوضوح.'),
                'content' => ['description' => $this->t('Each phase keeps technical decisions visible.', 'كل مرحلة تجعل القرارات الفنية واضحة.')],
                'items' => [
                    ['step' => '01', 'title' => $this->t('Clarify scope', 'تحديد النطاق'), 'description' => $this->t('Agree on use cases and response shapes first.', 'الاتفاق أولًا على حالات الاستخدام وأشكال الاستجابة.')],
                    ['step' => '02', 'title' => $this->t('Model data', 'نمذجة البيانات'), 'description' => $this->t('Shape schema and relations early.', 'تصميم المخطط والعلاقات مبكرًا.')],
                    ['step' => '03', 'title' => $this->t('Ship safely', 'تسليم آمن'), 'description' => $this->t('Verify behavior and document assumptions.', 'التحقق من السلوك وتوثيق الافتراضات.')],
                ],
                'image' => null,
                'sort_order' => 50,
            ],
            [
                'key' => 'home.skills_showcase',
                'title' => $this->t('Skills Showcase', 'عرض المهارات'),
                'subtitle' => $this->t('Core strengths used repeatedly in production.', 'مهارات أساسية أستخدمها باستمرار في الإنتاج.'),
                'content' => ['description' => $this->t('Backend, integrations, and delivery discipline.', 'باك إند وتكاملات وانضباط تنفيذي.')],
                'items' => null,
                'image' => null,
                'sort_order' => 60,
            ],
            [
                'key' => 'home.open_source',
                'title' => $this->t('Open Source', 'المصدر المفتوح'),
                'subtitle' => $this->t('Selected public work and reusable patterns.', 'أعمال عامة وأنماط قابلة لإعادة الاستخدام.'),
                'content' => ['description' => $this->t('A small selection of repos and packages.', 'اختيارات محدودة من المستودعات والحزم.')],
                'items' => [
                    ['name' => 'laravel-service-repository-starter', 'description' => $this->t('Starter structure for service/repository Laravel APIs.', 'هيكل بداية لبناء APIs في Laravel بالخدمات والمستودعات.'), 'url' => 'https://github.com/fisaldev/laravel-service-repository-starter', 'language' => 'PHP', 'stars' => 42],
                    ['name' => 'react-api-contract-kit', 'description' => $this->t('Typed frontend patterns around response envelopes.', 'أنماط واجهة معرّفة بالأنواع حول أغلفة الاستجابة.'), 'url' => 'https://github.com/fisaldev/react-api-contract-kit', 'language' => 'TypeScript', 'stars' => 27],
                ],
                'image' => null,
                'sort_order' => 70,
            ],
            [
                'key' => 'contact.info',
                'title' => $this->t('Let’s Build Something Useful', 'لنصنع شيئًا مفيدًا'),
                'subtitle' => $this->t('Share the problem, not only the feature list.', 'شارك المشكلة وليس فقط قائمة الخصائص.'),
                'content' => ['availability' => $this->t('Replies within 24 hours on business days.', 'الرد خلال 24 ساعة في أيام العمل.'), 'office_hours' => $this->t('Sun - Thu, 10:00 - 18:00 Cairo time', 'الأحد - الخميس، 10:00 - 18:00 بتوقيت القاهرة')],
                'items' => null,
                'image' => null,
                'sort_order' => 80,
            ],
        ];

        foreach ($sections as $section) {
            PortfolioSection::query()->create($section + ['is_active' => true]);
        }

        foreach ([
            ['Completed Projects', 'مشاريع مكتملة', 'Delivered work across dashboards and integrations.', 'أعمال منجزة عبر اللوحات والتكاملات.', 'briefcase', 24, '+', 10],
            ['Years of Experience', 'سنوات الخبرة', 'Focused on Laravel and integration-heavy products.', 'تركيز على Laravel والمنتجات كثيفة التكامل.', 'clock', 4, '+', 20],
            ['Production Integrations', 'تكاملات إنتاجية', 'Payment gateways and third-party connections.', 'بوابات دفع واتصالات مع خدمات طرف ثالث.', 'link', 14, '+', 30],
        ] as [$en, $ar, $descEn, $descAr, $icon, $value, $unit, $order]) {
            Achievement::query()->create([
                'title' => $this->t($en, $ar),
                'description' => $this->t($descEn, $descAr),
                'icon' => $icon,
                'value' => $value,
                'unit' => $unit,
                'sort_order' => $order,
            ]);
        }

        foreach ([
            ['Backend Engineering', 'الهندسة الخلفية', 'Laravel / PHP', 'Laravel / PHP', 'Core', 'أساسي', 'Advanced', 'متقدم', 'server', 95, true, 10],
            ['API Architecture', 'هندسة الـ API', 'Contracts / validation / resources', 'عقود / تحقق / موارد', 'Core', 'أساسي', 'Advanced', 'متقدم', 'code', 93, true, 20],
            ['Integrations', 'التكاملات', 'Payments / webhooks / third-party services', 'مدفوعات / ويب هوكس / خدمات خارجية', 'Platform', 'منصات', 'Advanced', 'متقدم', 'plug', 91, true, 30],
            ['Frontend Collaboration', 'التعاون مع الواجهة', 'React / TypeScript friendly payloads', 'بيانات مناسبة لـ React / TypeScript', 'Delivery', 'تنفيذ', 'Strong', 'قوي', 'layout', 84, true, 40],
            ['Monitoring & Stability', 'المراقبة والاستقرار', 'Logs / queues / jobs', 'سجلات / طوابير / وظائف', 'Operations', 'تشغيل', 'Strong', 'قوي', 'activity', 82, false, 50],
        ] as [$titleEn, $titleAr, $subEn, $subAr, $catEn, $catAr, $levelEn, $levelAr, $icon, $percent, $featured, $order]) {
            Skill::query()->create([
                'title' => $this->t($titleEn, $titleAr),
                'subtitle' => $this->t($subEn, $subAr),
                'category' => $this->t($catEn, $catAr),
                'level_label' => $this->t($levelEn, $levelAr),
                'icon' => $icon,
                'percent' => $percent,
                'featured' => $featured,
                'sort_order' => $order,
            ]);
        }

        Experience::query()->create([
            'role' => $this->t('Backend Developer', 'مطور باك إند'),
            'company' => 'Brmja Tech',
            'summary' => $this->t('Built Laravel APIs, dashboards, and integration-heavy modules.', 'بنيت APIs ولوحات وتكاملات كثيفة باستخدام Laravel.'),
            'location' => $this->t('Cairo, Egypt', 'القاهرة، مصر'),
            'employment_type' => $this->t('Full-time', 'دوام كامل'),
            'company_url' => 'https://brmja.tech',
            'logo' => 'uploads/images/logo.png',
            'start_date' => '2023-01-01',
            'end_date' => null,
            'highlights' => [
                $this->t('Designed frontend-ready API contracts.', 'صممت عقود APIs جاهزة للتكامل.'),
                $this->t('Delivered payments and wallet integrations.', 'نفذت تكاملات المدفوعات والمحافظ.'),
            ],
            'sort_order' => 10,
        ]);

        Experience::query()->create([
            'role' => $this->t('Freelance Laravel Engineer', 'مهندس Laravel مستقل'),
            'company' => 'Independent',
            'summary' => $this->t('Shipped portfolio platforms and internal dashboards for clients.', 'سلّمت منصات بورتفوليو ولوحات داخلية لعملاء مختلفين.'),
            'location' => $this->t('Remote', 'عن بُعد'),
            'employment_type' => $this->t('Contract', 'تعاقد'),
            'company_url' => null,
            'logo' => null,
            'start_date' => '2022-01-01',
            'end_date' => '2022-12-31',
            'highlights' => [
                $this->t('Built multilingual CMS and portfolio APIs.', 'نفذت نظم إدارة محتوى وواجهات بورتفوليو متعددة اللغات.'),
                $this->t('Documented assumptions for faster frontend integration.', 'وثقت الافتراضات لتسريع تكامل الواجهة.'),
            ],
            'sort_order' => 20,
        ]);

        Event::query()->create([
            'title' => $this->t('Portfolio API Release', 'إطلاق API البورتفوليو'),
            'date' => '2026-03-01',
            'type' => 'release',
            'location' => $this->t('Remote', 'عن بُعد'),
            'description' => $this->t('Released a frontend integration-ready portfolio backend.', 'إطلاق خلفية بورتفوليو جاهزة للتكامل مع الواجهة.'),
            'url' => 'https://portfolio.brmja.tech',
            'cover_image' => 'uploads/images/Frame 2087326965.png',
            'featured' => true,
            'sort_order' => 10,
        ]);

        Event::query()->create([
            'title' => $this->t('Payments Module Launch', 'إطلاق وحدة المدفوعات'),
            'date' => '2025-10-02',
            'type' => 'launch',
            'location' => $this->t('Cairo', 'القاهرة'),
            'description' => $this->t('Launched production payment workflows with failover.', 'إطلاق مسارات مدفوعات إنتاجية مع تبديل بين المزودين.'),
            'url' => null,
            'cover_image' => null,
            'featured' => false,
            'sort_order' => 20,
        ]);

        Testimonial::query()->create([
            'name' => 'Sarah Ahmed',
            'role' => $this->t('Product Manager', 'مديرة منتج'),
            'company' => 'Brmja Tech',
            'badge' => $this->t('Client', 'عميل'),
            'quote' => $this->t('Clear communication and reliable delivery under pressure.', 'تواصل واضح وتسليم موثوق تحت الضغط.'),
            'avatar' => 'uploads/users/1758033689_68c977199bb34_about_2.jpg',
            'featured' => true,
            'sort_order' => 10,
        ]);

        Testimonial::query()->create([
            'name' => 'Omar Khaled',
            'role' => $this->t('Frontend Engineer', 'مهندس واجهات'),
            'company' => 'Freelance Collaboration',
            'badge' => $this->t('Teammate', 'زميل'),
            'quote' => $this->t('The API contracts were consistent and integration stayed simple.', 'عقود الـ API كانت ثابتة وجعلت التكامل بسيطًا.'),
            'avatar' => null,
            'featured' => false,
            'sort_order' => 20,
        ]);

        $projects = [
            [
                'slug' => 'merchant-core-platform',
                'title' => $this->t('Merchant Core Platform', 'منصة التاجر الأساسية'),
                'summary' => $this->t('Laravel merchant platform for products, orders, and dashboards.', 'منصة Laravel للتجار تشمل المنتجات والطلبات ولوحات التحكم.'),
                'description' => $this->t('Service-oriented backend with multilingual content and reporting APIs.', 'خلفية تعتمد على الخدمات مع محتوى متعدد اللغات وواجهات تقارير.'),
                'category' => 'web',
                'featured' => true,
                'is_open_source' => false,
                'tags' => ['laravel', 'dashboard', 'mysql'],
                'stack' => ['Laravel', 'MySQL', 'Livewire', 'REST API'],
                'highlights' => [$this->t('Role-based admin modules', 'وحدات إدارة مبنية على الصلاحيات'), $this->t('Localization-ready data structures', 'هياكل بيانات جاهزة للتعريب')],
                'challenges' => [$this->t('Legacy settings data and inconsistent media paths.', 'بيانات إعدادات قديمة ومسارات وسائط غير متسقة.')],
                'solutions' => [$this->t('Unified response envelopes and media URL resolution.', 'توحيد أغلفة الاستجابة ومعالجة روابط الوسائط.')],
                'metrics' => [['label' => $this->t('APIs', 'واجهات'), 'value' => '32'], ['label' => $this->t('Modules', 'وحدات'), 'value' => '7']],
                'cover_image' => 'uploads/images/logo.png',
                'og_image' => 'uploads/images/Frame 2087326965.png',
                'web_url' => 'https://merchant.example.com',
                'google_play_url' => null,
                'app_store_url' => null,
                'repository_url' => null,
                'case_study_url' => 'https://portfolio.brmja.tech/projects/merchant-core-platform',
                'client_name' => 'Confidential Client',
                'project_date' => '2025-09-01',
                'seo_title' => $this->t('Merchant Core Platform Case Study', 'دراسة حالة منصة التاجر الأساسية'),
                'seo_description' => $this->t('Case study for a Laravel merchant operations platform.', 'دراسة حالة لمنصة تشغيل تجارية مبنية بـ Laravel.'),
                'seo_keywords' => ['laravel', 'merchant', 'dashboard'],
                'sort_order' => 10,
            ],
            [
                'slug' => 'wallet-checkout-suite',
                'title' => $this->t('Wallet Checkout Suite', 'منظومة الدفع بالمحفظة'),
                'summary' => $this->t('Payments and wallet orchestration APIs with provider failover.', 'واجهات دفع ومحافظ مع إدارة تعدد المزودين.'),
                'description' => $this->t('Provider abstraction, retries, reconciliation, and support tooling.', 'تجريد للمزودين ومحاولات إعادة ومطابقة مالية وأدوات دعم داخلية.'),
                'category' => 'fintech',
                'featured' => true,
                'is_open_source' => false,
                'tags' => ['laravel', 'payments', 'webhooks'],
                'stack' => ['Laravel', 'Redis', 'Queues', 'Webhooks'],
                'highlights' => [$this->t('Webhook reconciliation', 'مطابقة الويب هوكس'), $this->t('Operational reporting', 'تقارير تشغيلية')],
                'challenges' => [$this->t('Provider downtime and inconsistent callbacks.', 'توقف بعض المزودين وتفاوت البيانات الراجعة.')],
                'solutions' => [$this->t('Fallback routing and normalized event handling.', 'توجيه بديل ومعالجة موحدة للأحداث.')],
                'metrics' => [['label' => $this->t('Providers', 'مزودون'), 'value' => '5'], ['label' => $this->t('Webhook flows', 'تدفقات ويب هوك'), 'value' => '11']],
                'cover_image' => 'uploads/images/logo_white.png',
                'og_image' => 'uploads/images/Frame 2087326965.png',
                'web_url' => 'https://wallet.example.com',
                'google_play_url' => null,
                'app_store_url' => null,
                'repository_url' => null,
                'case_study_url' => 'https://portfolio.brmja.tech/projects/wallet-checkout-suite',
                'client_name' => 'Fintech Partner',
                'project_date' => '2025-12-15',
                'seo_title' => $this->t('Wallet Checkout Suite Case Study', 'دراسة حالة منظومة الدفع بالمحفظة'),
                'seo_description' => $this->t('Case study for a wallet and payment orchestration backend.', 'دراسة حالة لخلفية تنسيق المدفوعات والمحافظ.'),
                'seo_keywords' => ['payments', 'wallet', 'webhooks'],
                'sort_order' => 20,
            ],
            [
                'slug' => 'portfolio-api-starter',
                'title' => $this->t('Portfolio API Starter', 'بداية API للبورتفوليو'),
                'summary' => $this->t('Open-source starter for multilingual portfolio APIs.', 'قالب مفتوح المصدر لبناء APIs بورتفوليو متعددة اللغات.'),
                'description' => $this->t('Public reference project demonstrating response envelopes and modular architecture.', 'مشروع مرجعي عام يوضح أغلفة الاستجابة والمعمارية المعيارية.'),
                'category' => 'open-source',
                'featured' => false,
                'is_open_source' => true,
                'tags' => ['laravel', 'open-source', 'api'],
                'stack' => ['Laravel', 'PHPUnit', 'Markdown Docs'],
                'highlights' => [$this->t('Reusable controller-service-repository structure', 'هيكل قابل لإعادة الاستخدام يربط المتحكمات بالخدمات والمستودعات')],
                'challenges' => [$this->t('Keeping the example small while still production-oriented.', 'الحفاظ على بساطة المثال مع بقائه قريبًا من الإنتاج.')],
                'solutions' => [$this->t('Focused on API layers, documentation, and verification only.', 'التركيز على طبقات الـ API والتوثيق والتحقق فقط.')],
                'metrics' => [['label' => $this->t('Endpoints', 'نقاط نهاية'), 'value' => '20+']],
                'cover_image' => 'uploads/images/image.png',
                'og_image' => 'uploads/images/image.png',
                'web_url' => 'https://github.com/fisaldev/portfolio-api-starter',
                'google_play_url' => null,
                'app_store_url' => null,
                'repository_url' => 'https://github.com/fisaldev/portfolio-api-starter',
                'case_study_url' => null,
                'client_name' => null,
                'project_date' => '2026-02-10',
                'seo_title' => $this->t('Portfolio API Starter', 'بداية API للبورتفوليو'),
                'seo_description' => $this->t('Open-source Laravel portfolio API starter.', 'قالب Laravel مفتوح المصدر لبناء APIs للبورتفوليو.'),
                'seo_keywords' => ['open-source', 'portfolio-api', 'laravel'],
                'sort_order' => 30,
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::query()->create($projectData);
            ProjectImage::query()->create([
                'project_id' => $project->id,
                'image' => $projectData['cover_image'],
                'alt_text' => $this->t($projectData['title']['en'] . ' cover', 'غلاف ' . $projectData['title']['ar']),
                'sort_order' => 10,
            ]);
        }

        ProjectImage::query()->create([
            'project_id' => Project::query()->where('slug', 'merchant-core-platform')->value('id'),
            'image' => 'uploads/images/Frame 2087326965.png',
            'alt_text' => $this->t('Merchant dashboard preview', 'معاينة لوحة التاجر'),
            'sort_order' => 20,
        ]);

        foreach ([
            ['Noor', 'noor@example.com', 'Founder', 'The project case studies are structured clearly and easy to follow.', 5, 'uploads/users/1758033097_68c974c9d8ca5_about_2.jpg', 'website', true],
            ['Youssef', 'youssef@example.com', 'Developer', 'Good API structure and documentation. Integration was straightforward.', 4, null, 'github', false],
        ] as [$name, $email, $role, $comment, $rating, $avatar, $source, $featured]) {
            PortfolioComment::query()->create([
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'comment' => $comment,
                'rating' => $rating,
                'avatar' => $avatar,
                'source' => $source,
                'featured' => $featured,
                'status' => 'approved',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Seeder',
                'approved_at' => now(),
            ]);
        }
    }

    private function t(string $en, string $ar): array
    {
        return ['en' => $en, 'ar' => $ar];
    }
}
