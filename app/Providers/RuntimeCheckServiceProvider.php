<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Composer\Semver\Comparator;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\SetupController;

class RuntimeCheckServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Skip the installation check when in setup or under CLI
        if ($request->is('setup*') || $this->app->runningInConsole()) {
            return;
        }

        $this->checkInstallation();  // @codeCoverageIgnore
    }

    /**
     * @codeCoverageIgnore
     */
    protected function checkInstallation()
    {
        // Redirect to setup wizard
        if (config('database.default') == 'dummy' || ! SetupController::checkTablesExist()) {
            return redirect('/setup')->send();
        }

        if (Comparator::greaterThan(config('app.version'), option('version'))) {
            return redirect('/setup/update')->send();
        }

        return true;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
