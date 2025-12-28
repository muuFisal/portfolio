<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ✅ Translatable (AR/EN)
            'site_name' => [
                'en' => 'Fisal Portfolio',
                'ar' => 'بورتفوليو فيصل',
            ],
            'site_title' => [
                'en' => 'Mohamed Fisal — Backend / Full-Stack Developer',
                'ar' => 'محمد فيصل — مطوّر باك إند / فول ستاك',
            ],
            'site_desc' => [
                'en' => 'Personal portfolio of Mohamed Fisal showcasing projects, experience, achievements, and contact details.',
                'ar' => 'بورتفوليو شخصي لمحمد فيصل لعرض المشاريع والخبرات والإنجازات وطرق التواصل.',
            ],
            'site_address' => [
                'en' => 'Cairo, Egypt',
                'ar' => 'القاهرة، مصر',
            ],
            'meta_key' => [
                'en' => 'Mohamed Fisal, Fisal, portfolio, backend developer, full stack developer, Laravel, PHP, Livewire, React, API, MySQL',
                'ar' => 'محمد فيصل, فيصل, بورتفوليو, مطور باك اند, فول ستاك, لارافيل, PHP, لايف واير, رياكت, API, MySQL',
            ],
            'meta_desc' => [
                'en' => 'Mohamed Fisal portfolio — Backend / Full-Stack Developer (Laravel, PHP, Livewire, React). Explore projects, experience, and achievements.',
                'ar' => 'بورتفوليو محمد فيصل — مطوّر باك إند / فول ستاك (Laravel, PHP, Livewire, React). استعرض المشاريع والخبرات والإنجازات.',
            ],

            // ✅ Non-translatable (put real values later)
            'site_phone'    => '+20XXXXXXXXXX',
            'site_email'    => 'mohamed.fisal@example.com',
            'email_support' => 'support@example.com',

            // ✅ Social links (update to your real accounts)
            'facebook'  => '',
            'x_url'     => '',
            'youtube'   => '',
            'instagram' => '',
            'tiktok'    => '',
            'linkedin'  => '',
            'whatsapp'  => '+20XXXXXXXXXX',
            'github'    => '',

            // ✅ Media (these should match your uploads/public assets strategy)
            'logo'    => 'uploads/images/logo.png',
            'favicon' => 'uploads/images/logo.png',

            // ✅ Others
            'site_copyright' => '© ' . now()->year . ' Mohamed Fisal. All rights reserved.',
            'promotion_url'  => '', // not needed for portfolio, leave empty
        ];

        // ✅ Update first row if exists, otherwise create
        $existing = Setting::query()->first();

        if ($existing) {
            $existing->update($data);
        } else {
            Setting::query()->create($data);
        }
    }
}
