<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - {{ config('app.name') }}</title>
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
</head>
<body class="min-h-screen bg-[#1E3A8A] flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-2xl font-bold text-[#1E3A8A] text-center mb-6">Admin Login</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                        required autofocus>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
                        required>
                </div>
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-[#1E3A8A] focus:ring-[#1E3A8A]">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
                <button type="submit"
                    class="w-full py-3 px-4 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</body>
</html>
