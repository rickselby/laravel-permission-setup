<?php

namespace RickSelby\Permissions;

use Illuminate\Support\ServiceProvider;
use RickSelby\Permissions\Commands\PermissionsCommand;

class PermissionsServiceProvider extends ServiceProvider
{

    protected $commands = [
        PermissionsCommand::class,
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/permissions.php' => $this->app->configPath() . '/' . 'permissions.php',
        ], 'config');
    }

    /**
     * Register the commands
     */
    public function register(){
        $this->commands($this->commands);
    }
}