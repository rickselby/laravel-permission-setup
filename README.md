# Initialise Permissions

When using [spatie/laravel-permission](https://github.com/spatie/laravel-permission) I have a pattern I always follow;
I only use permissions in the code, not roles. Since the permissions will be hard-coded, I want a way of creating the
permissions in the database from a list.

This really, really simple class loads a list of permissions from `config/permissions.php` and creates them (if they
don't already exist).

Install the package using composer:

``` bash
$ composer require rickselby/laravel-permission-setup
```

Then, if using Laravel 5.4, add the service provider to the providers array:

```php
// config/app.php
'providers' => [
    ...
    RickSelby\Permission\PermissionServiceProvider::class,
];
```
You can publish the default permissions config file with

```bash
php artisan vendor:publish --provider="RickSelby\Permission\PermissionServiceProvider" --tag="config"
```


Now, you can load and reload the list of permissions with the artisan command:

```bash
php artisan permission:update
```
