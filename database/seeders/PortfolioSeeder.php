<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Event;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Clean for idempotency
        Project::query()->delete();
        Experience::query()->delete();
        Event::query()->delete();
        Testimonial::query()->delete();
        Achievement::query()->delete();
        Skill::query()->delete();

        // ✅ Skills (الداتا الحقيقية من الصورة)
        $skills = [
            // row 1
            [
                'title' => ['ar' => 'باك اند', 'en' => 'Backend'],
                'subtitle' => ['ar' => 'PHP / Laravel', 'en' => 'PHP / Laravel'],
                'percent' => 95,
                'sort_order' => 10
            ],
            [
                'title' => ['ar' => 'فرونت اند', 'en' => 'Frontend'],
                'subtitle' => ['ar' => 'React + TypeScript', 'en' => 'React + TypeScript'],
                'percent' => 85,
                'sort_order' => 20
            ],
            [
                'title' => ['ar' => 'أنظمة', 'en' => 'Systems'],
                'subtitle' => ['ar' => 'Wallet Systems', 'en' => 'Wallet Systems'],
                'percent' => 90,
                'sort_order' => 30
            ],

            // row 2
            [
                'title' => ['ar' => 'تكاملات', 'en' => 'Integrations'],
                'subtitle' => ['ar' => 'REST APIs / Webhooks', 'en' => 'REST APIs / Webhooks'],
                'percent' => 92,
                'sort_order' => 40
            ],
            [
                'title' => ['ar' => 'تجربة', 'en' => 'Experience'],
                'subtitle' => ['ar' => 'Inertia', 'en' => 'Inertia'],
                'percent' => 80,
                'sort_order' => 50
            ],
            [
                'title' => ['ar' => 'مدفوعات', 'en' => 'Payments'],
                'subtitle' => ['ar' => 'Payment Gateways', 'en' => 'Payment Gateways'],
                'percent' => 88,
                'sort_order' => 60
            ],

            // row 3
            [
                'title' => ['ar' => 'لوحات', 'en' => 'Dashboards'],
                'subtitle' => ['ar' => 'CRUD & Livewire', 'en' => 'CRUD & Livewire'],
                'percent' => 90,
                'sort_order' => 70
            ],
            [
                'title' => ['ar' => 'واجهة', 'en' => 'UI'],
                'subtitle' => ['ar' => 'Tailwind / Bootstrap', 'en' => 'Tailwind / Bootstrap'],
                'percent' => 88,
                'sort_order' => 80
            ],
            [
                'title' => ['ar' => 'هندسة', 'en' => 'Architecture'],
                'subtitle' => ['ar' => 'ERP / CRM Architecture', 'en' => 'ERP / CRM Architecture'],
                'percent' => 87,
                'sort_order' => 90
            ],

            // row 4
            [
                'title' => ['ar' => 'أمان', 'en' => 'Security'],
                'subtitle' => ['ar' => 'Permissions, Tokens', 'en' => 'Permissions, Tokens'],
                'percent' => 88,
                'sort_order' => 100
            ],
            [
                'title' => ['ar' => 'لغات', 'en' => 'Localization'],
                'subtitle' => ['ar' => 'i18n + RTL', 'en' => 'i18n + RTL'],
                'percent' => 90,
                'sort_order' => 110
            ],
            [
                'title' => ['ar' => 'مراقبة', 'en' => 'Monitoring'],
                'subtitle' => ['ar' => 'Audit Logs', 'en' => 'Audit Logs'],
                'percent' => 86,
                'sort_order' => 120
            ],
        ];

        foreach ($skills as $s) {
            Skill::create($s);
        }


        // Achievements (سيبها زي ما هي أو عدّلها لو عندك أرقام حقيقية)
        Achievement::create([
            'title' => ['ar' => 'مشاريع مكتملة', 'en' => 'Completed Projects'],
            'value' => 25,
            'unit' => '+',
            'sort_order' => 10,
        ]);

        Achievement::create([
            'title' => ['ar' => 'سنوات خبرة', 'en' => 'Years of Experience'],
            'value' => 3,
            'unit' => '+',
            'sort_order' => 20,
        ]);

        // Experience
        Experience::create([
            'role' => ['ar' => 'Backend Developer', 'en' => 'Backend Developer'],
            'company' => 'Brmja Tech',
            'start_date' => '2023-01-01',
            'end_date' => null,
            'highlights' => [
                ['ar' => 'Laravel & Livewire systems', 'en' => 'Laravel & Livewire systems'],
                ['ar' => 'Wallet & Payment integrations', 'en' => 'Wallet & Payment integrations'],
            ],
            'sort_order' => 10,
        ]);

        // Events
        Event::create([
            'title' => ['ar' => 'إطلاق CRM', 'en' => 'CRM Launch'],
            'date' => '2025-10-02',
            'location' => ['ar' => 'القاهرة', 'en' => 'Cairo'],
            'description' => ['ar' => 'إطلاق أول نسخة تشغيلية.', 'en' => 'First production release.'],
            'sort_order' => 10,
        ]);

        // ✅ Testimonials (لغة واحدة فقط)
        Testimonial::create([
            'name' => 'Project Manager',
            'badge' => 'Client',
            'quote' => 'Professional work and on-time delivery.',
            'sort_order' => 10,
        ]);

        // Projects (sample)
        Project::create([
            'slug' => 'mecarde',
            'title' => ['ar' => 'Mecarde', 'en' => 'Mecarde'],
            'summary' => ['ar' => 'منصة فواتشر/شحن مع مزودين متعددين.', 'en' => 'Vouchers/top-ups platform with multiple providers.'],
            'tags' => ['Laravel', 'Wallet', 'Webhooks'],
            'featured' => true,
            'cover_image' => null,
            'web_url' => null,
            'google_play_url' => null,
            'app_store_url' => null,
        ]);
    }
}
