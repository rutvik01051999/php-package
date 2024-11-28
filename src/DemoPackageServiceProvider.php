<?php

namespace Demovendor\DemoPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class DemoPackageServiceProvider extends ServiceProvider
{
    /**
     * Register the package's services.
     *
     * @return void
     */
    public function register()
    {
        // Any bindings for your package's services (optional)
    }

    /**
     * Boot the package's services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config file
        $this->publishes([
            __DIR__ . '/../config/DemoPackage.php' => config_path('DemoPackage.php'),
        ], 'config');

        // Print a hello message dynamically
    }

    /**
     * Print a Hello message with the configured name.
     */
}
