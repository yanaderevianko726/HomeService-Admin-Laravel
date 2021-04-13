<?php
/*
 * File name: Permissions.php
 * Last modified: 2021.01.17 at 17:01:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Permissions
{
    private $exceptNames = [
        'LaravelInstaller*',
        'LaravelUpdater*',
        'debugbar*'
    ];

    private $exceptControllers = [
        'LoginController',
        'ForgotPasswordController',
        'ResetPasswordController',
        'RegisterController',
        'PayPalController'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permission = $request->route()->getName();
        if ($this->match($request->route()) && auth()->user()->canNot($permission)) {
            if ($permission == 'dashboard') {
                return redirect(route('users.profile'));
            }
            throw new UnauthorizedException(403, trans('error.permission') . ' <b>' . $permission . '</b>');
        }

        return $next($request);
    }

    private function match(Route $route)
    {
        if ($route->getName() == '' || $route->getName() === null) {
            return false;
        } else {
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
