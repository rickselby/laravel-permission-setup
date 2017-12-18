<?php

namespace RickSelby\Permission\Commands;

use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;

class PermissionCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'permission:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add required permissions for the app.';

    /** @var Repository */
    private $config;

    public function __construct(Repository $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->config->get('permissions') as $permissionName) {
            try {
                Permission::findByName($permissionName);
            } catch (PermissionDoesNotExist $e) {
                Permission::create(['name' => $permissionName]);
            }
        }
    }
}
