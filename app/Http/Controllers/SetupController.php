<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    protected function htmlResponse(bool $success, string $title, string $message, ?string $output = null)
    {
        $color = $success ? '#22c55e' : '#ef4444';
        $outputHtml = $output ? '<pre class="mt-4 p-4 bg-gray-100 rounded text-sm overflow-auto">' . e($output) . '</pre>' : '';

        return response("
            <!DOCTYPE html>
            <html>
            <head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'>
            <title>{$title}</title>
            <style>body{font-family:system-ui,sans-serif;max-width:600px;margin:50px auto;padding:20px;background:#f8fafc}
            h1{color:{$color};margin:0 0 10px}
            p{color:#64748b;margin:0}
            a{color:#2563eb;text-decoration:none}
            a:hover{text-decoration:underline}
            .links{margin-top:20px;display:flex;gap:15px}</style>
            </head>
            <body>
            <h1>{$title}</h1>
            <p>{$message}</p>
            {$outputHtml}
            <div class='links'>
            <a href='/migrate'>Run Migrate</a>
            <a href='/seed'>Run Seed</a>
            <a href='/setup'>Full Setup</a>
            </div>
            </body>
            </html>
        ", $success ? 200 : 500, ['Content-Type' => 'text/html']);
    }

    public function migrate()
    {
        try {
            Artisan::call('migrate', ['--force' => true]);
            return $this->htmlResponse(true, 'Migrations Completed', 'Database migrations ran successfully.', trim(Artisan::output()));
        } catch (\Throwable $e) {
            return $this->htmlResponse(false, 'Migration Failed', $e->getMessage());
        }
    }

    public function seed()
    {
        try {
            Artisan::call('db:seed', ['--force' => true]);
            return $this->htmlResponse(true, 'Seeding Completed', 'Database seeded successfully.', trim(Artisan::output()));
        } catch (\Throwable $e) {
            return $this->htmlResponse(false, 'Seeding Failed', $e->getMessage());
        }
    }

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

        $title = $success ? 'Setup Completed' : 'Setup Failed';
        $message = $success ? 'Migrations, seeding, and key generation completed.' : 'Setup completed with errors.';
        $output = json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $this->htmlResponse($success, $title, $message, $output);
    }
}
