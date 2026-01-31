@extends('admin.layouts.app')

@section('title', 'Website Settings')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Website Settings</h1>
    <p class="mt-1 text-gray-600">Update contact info, social links, and other site settings</p>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white rounded-xl shadow p-6 space-y-6">
    @csrf

    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
            <textarea name="address" id="address" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">{{ old('address', $settings['address'] ?? '') }}</textarea>
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $settings['phone'] ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                placeholder="+91 40 2401 6101">
        </div>
        <div>
            <label for="toll_free" class="block text-sm font-medium text-gray-700 mb-2">Toll Free</label>
            <input type="text" name="toll_free" id="toll_free" value="{{ old('toll_free', $settings['toll_free'] ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                placeholder="1800 123 4567">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $settings['email'] ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                placeholder="info@samridhipipes.com">
        </div>
    </div>

    <div class="border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Media Links</h3>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                    placeholder="https://instagram.com/...">
            </div>
            <div>
                <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2">Twitter / X URL</label>
                <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $settings['twitter'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                    placeholder="https://twitter.com/...">
            </div>
            <div>
                <label for="youtube" class="block text-sm font-medium text-gray-700 mb-2">YouTube URL</label>
                <input type="url" name="youtube" id="youtube" value="{{ old('youtube', $settings['youtube'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                    placeholder="https://youtube.com/...">
            </div>
            <div>
                <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                    placeholder="https://linkedin.com/...">
            </div>
            <div>
                <label for="facebook" class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                    placeholder="https://facebook.com/...">
            </div>
        </div>
    </div>

    <div class="border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Legal Pages</h3>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="privacy_policy_url" class="block text-sm font-medium text-gray-700 mb-2">Privacy Policy URL</label>
                <input type="url" name="privacy_policy_url" id="privacy_policy_url" value="{{ old('privacy_policy_url', $settings['privacy_policy_url'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
            </div>
            <div>
                <label for="terms_url" class="block text-sm font-medium text-gray-700 mb-2">Terms & Conditions URL</label>
                <input type="url" name="terms_url" id="terms_url" value="{{ old('terms_url', $settings['terms_url'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
            </div>
        </div>
    </div>

    <div class="pt-4">
        <button type="submit"
            class="px-6 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
            Save Settings
        </button>
    </div>
</form>
@endsection
