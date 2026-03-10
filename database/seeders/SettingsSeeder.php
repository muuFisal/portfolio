<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'site_name' => [
                'en' => 'Fisal Portfolio',
                'ar' => 'بورتفوليو فيصل',
            ],
            'site_title' => [
                'en' => 'Mohamed Fisal | Backend & Full-Stack Engineer',
                'ar' => 'محمد فيصل | مهندس باك إند وفول ستاك',
            ],
            'site_desc' => [
                'en' => 'Portfolio backend for Mohamed Fisal with projects, experience, testimonials, and contact channels.',
                'ar' => 'واجهة برمجية لبورتفوليو محمد فيصل تعرض المشاريع والخبرات وآراء العملاء وقنوات التواصل.',
            ],
            'site_address' => [
                'en' => 'Cairo, Egypt',
                'ar' => 'القاهرة، مصر',
            ],
            'meta_key' => [
                'en' => 'Mohamed Fisal, Laravel, PHP, Portfolio, Backend Developer',
                'ar' => 'محمد فيصل، لارافيل، PHP، بورتفوليو، مطور باك إند',
            ],
            'meta_desc' => [
                'en' => 'Mohamed Fisal portfolio API serving profile, case studies, testimonials, and contact details.',
                'ar' => 'واجهة برمجية لبورتفوليو محمد فيصل تعرض الملف الشخصي ودراسات الحالة وآراء العملاء وبيانات التواصل.',
            ],
            'site_phone' => '+20 100 000 0000',
            'site_email' => 'hello@fisal.dev',
            'email_support' => 'support@fisal.dev',
            'facebook' => 'https://facebook.com/fisal.dev',
            'x_url' => 'https://x.com/fisaldev',
            'youtube' => 'https://youtube.com/@fisaldev',
            'instagram' => 'https://instagram.com/fisal.dev',
            'tiktok' => 'https://tiktok.com/@fisaldev',
            'linkedin' => 'https://linkedin.com/in/fisaldev',
            'whatsapp' => 'https://wa.me/201000000000',
            'github' => 'https://github.com/fisaldev',
            'logo' => 'uploads/images/logo.png',
            'logo_dark' => 'uploads/images/logo_white.png',
            'favicon' => 'uploads/images/logo.png',
            'resume' => null,
            'profile_image' => 'uploads/users/1758033097_68c974c9d8ca5_about_2.jpg',
            'default_og_image' => 'uploads/images/Frame 2087326965.png',
            'site_copyright' => '© ' . now()->year . ' Mohamed Fisal. All rights reserved.',
            'promotion_url' => 'https://brmja.tech',
        ];

        $existing = Setting::query()->first();

        if ($existing) {
            $existing->update($data);
            return;
        }

        Setting::query()->create($data);
    }
}
