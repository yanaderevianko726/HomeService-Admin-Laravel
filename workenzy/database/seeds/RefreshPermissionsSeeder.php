<?php
/*
 * File name: RefreshPermissionsSeeder.php
 * Last modified: 2021.01.07 at 13:46:50
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RefreshPermissionsSeeder extends Seeder
{
    //$ php artisan db:seed --class=RefreshPermissionsSeeder
    private $exceptNames = [
        'LaravelInstaller*',
        'LaravelUpdater*',
        'debugbar*',
        'cashier.*'
    ];

    private $exceptControllers = [
        'LoginController',
        'ForgotPasswordController',
        'ResetPasswordController',
        'RegisterController',
        'PayPalController'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $route) {
            if ($this->match($route)) {
                // PermissionDoesNotExist
                try {
                    Permission::findOrCreate($route->getName(), 'web');
                    Role::findOrFail(2)->givePermissionTo($route->getName());
                } catch (Exception $e) {

                }
            }
        }
    }

    private function match(Illuminate\Routing\Route $route)
    {
        if ($route->getName() === null) {
            return false;
        } else {
            if (preg_match('/API/', class_basename($route->getController()))) {
                return false;
            }
            if (in_array(class_basename($route->getController()), $this->exceptControllers)) {
                return false;
            }
            foreach ($this->exceptNames as $except) {
                if (Str::is($except, $route->getName())) {
                    return false;
                }
            }
        }
        return true;
    }
}
