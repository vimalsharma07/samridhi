<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'address' => "Hyderabad, Telangana 500048",
            'phone' => "+91 40 2401 6101",
            'toll_free' => "1800 123 4567",
            'email' => "info@samridhipipes.com",
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'linkedin' => '',
            'facebook' => '',
            'privacy_policy_url' => '#',
            'terms_url' => '#',
        ];

        foreach ($defaults as $key => $value) {
            WebsiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
