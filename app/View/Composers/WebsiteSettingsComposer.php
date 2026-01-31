<?php

namespace App\View\Composers;

use App\Models\WebsiteSetting;
use Illuminate\View\View;

class WebsiteSettingsComposer
{
    public function compose(View $view): void
    {
        $view->with('websiteSettings', WebsiteSetting::getSettings());
    }
}
