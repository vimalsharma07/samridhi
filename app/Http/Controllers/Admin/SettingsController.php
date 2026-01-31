<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected array $keys = [
        'address', 'phone', 'toll_free', 'email',
        'instagram', 'twitter', 'youtube', 'linkedin', 'facebook',
        'privacy_policy_url', 'terms_url',
    ];

    public function index()
    {
        $settings = WebsiteSetting::getAll();
        $defaults = array_fill_keys($this->keys, '');
        $settings = array_merge($defaults, $settings);

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($this->keys as $key) {
            WebsiteSetting::set($key, $request->input($key));
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
