<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MenuPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $user = Auth::user();

            $verticalMenuData = config('verticalMenu')['menu'];
            $horizontalMenuData = config('horizontalMenu')['menu'];

            $roles = $user->getRoleNames()->toArray();
            $permissions = $user->getAllPermissions()->pluck('name')->toArray();

            $finalVerticalMenu['menu'] = [];
            $finalHorizontalMenu = [];

            foreach($verticalMenuData as $index => $menu) {

                $finalMenuItem = $this->generateMenu($roles, $permissions, $menu);

                if ($finalMenuItem) {
                    $finalVerticalMenu['menu'][$index] = $finalMenuItem;
                }

            }

            foreach($horizontalMenuData as $index => $menu) {

                $finalMenuItem = $this->generateMenu($roles, $permissions, $menu);

                if ($finalMenuItem) {
                    $finalHorizontalMenu['menu'][$index] = $finalMenuItem;
                }
            }

            // Share all menuData to all the views
            \View::share('menuData', [$finalVerticalMenu, $finalHorizontalMenu]);

        }

        return $next($request);
    }

    public function generateMenu($roles, $permissions, $menu) {
        $finalMenuItem = null;
        $finalSubmenuItems = [];

        if (array_key_exists('submenu', $menu)) {
            foreach ($menu['submenu'] as $submenu) {
                $finalSubmenuItem = $this->generateMenu($roles, $permissions, $submenu);
                if ($finalSubmenuItem) {
                    $finalSubmenuItems[] = $finalSubmenuItem;
                }
            }
            if (count($finalSubmenuItems) > 0) {
                $menu['submenu'] = $finalSubmenuItems;
            }
            else {
                unset($menu['submenu']);
            }
        }

        if (array_key_exists('roles', $menu)) {
            if (array_intersect($roles, $menu['roles'])) {
                if (array_key_exists('permissions', $menu)) {
                    if (array_intersect($permissions, $menu['permissions'])) {
                        $finalMenuItem = $menu;
                    }
                }
                else {
                    $finalMenuItem = $menu;
                }
            }
        }
        elseif (array_key_exists('permissions', $menu)) {
            if (array_intersect($permissions, $menu['permissions'])) {
                $finalMenuItem = $menu;
            }
        }
        else {
            $finalMenuItem = $menu;
        }

        return $finalMenuItem;
    }
}
