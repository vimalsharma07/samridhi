<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SetupController extends Controller
{
    public function run()
    {
        $results = [];
        $success = true;

        // 1. Generate app key if missing
        if (empty(config('app.key'))) {
            try {
                Artisan::call('key:generate', ['--force' => true]);
                $results['key_generate'] = ['success' => true, 'message' => 'Application key generated.'];
            } catch (\Throwable $e) {
                $results['key_generate'] = ['success' => false, 'message' => $e->getMessage()];
                $success = false;
            }
        } else {
            $results['key_generate'] = ['success' => true, 'message' => 'Application key already exists.'];
        }

        // 2. Run migrations
        try {
            Artisan::call('migrate', ['--force' => true]);
            $results['migrate'] = ['success' => true, 'message' => trim(Artisan::output()) ?: 'Migrations completed.'];
        } catch (\Throwable $e) {
            $results['migrate'] = ['success' => false, 'message' => $e->getMessage()];
            $success = false;
        }

        // 3. Run seeders
        try {
            Artisan::call('db:seed', ['--force' => true]);
            $results['seed'] = ['success' => true, 'message' => trim(Artisan::output()) ?: 'Database seeded.'];
        } catch (\Throwable $e) {
            $results['seed'] = ['success' => false, 'message' => $e->getMessage()];
            $success = false;
        }

        return response()->json([
            'success' => $success,
            'message' => $success ? 'Setup completed successfully.' : 'Setup completed with errors.',
            'results' => $results,
        ], $success ? 200 : 500);
    }
}
