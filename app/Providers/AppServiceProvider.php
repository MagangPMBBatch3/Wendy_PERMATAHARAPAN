<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //test kneksi database
        if (App::runningInConsole()) {
            try {
                DB::connection()->getPdo();
                $dbName = DB::connection()->getDatabaseName();
                echo "connected to database:  $dbName\n";
            } catch (Exception $e) {
                Log::error("Database connection error: " . $e->getMessage());
                echo "Database connection error: " . $e->getMessage() . "\n";
                exit(1);//keluar status
            }
        }
    }
}
