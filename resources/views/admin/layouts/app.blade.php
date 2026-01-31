<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-orange': '#E85D04',
                        'brand-blue': '#1E3A8A',
                    }
                }
            }
        }
    </script>
    <style>* { font-family: 'DM Sans', system-ui, sans-serif; }</style>
    @stack('styles')
</head>
<body class="min-h-screen bg-gray-100">
    <nav class="bg-[#1E3A8A] text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">Admin Panel</a>
                    <div class="hidden md:flex ml-10 space-x-4">
                        <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-md hover:bg-white/10">Dashboard</a>
                        <a href="{{ route('admin.settings.index') }}" class="px-3 py-2 rounded-md hover:bg-white/10">Settings</a>
                        <a href="{{ route('admin.blogs.index') }}" class="px-3 py-2 rounded-md hover:bg-white/10">Blogs</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" target="_blank" class="px-3 py-2 text-sm hover:bg-white/10 rounded-md">View Site</a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="ml-4">
                        @csrf
                        <button type="submit" class="px-3 py-2 text-sm hover:bg-white/10 rounded-md">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
