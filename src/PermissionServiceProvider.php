<?php

namespace RickSelby\Permission;

use Illuminate\Support\ServiceProvider;
use RickSelby\Permission\Commands\PermissionCommand;

class PermissionServiceProvider extends ServiceProvider
{
    protected $commands = [
        PermissionCommand::class,
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__.'/../resources/config/permissions.php' => $this->app->configPath().'/'.'permissions.php',
            ],
            'config'
        );
    }

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
