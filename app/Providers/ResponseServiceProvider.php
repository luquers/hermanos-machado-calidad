<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('okView', function($routeName, $routeParameters = [], $message = null) {
            if (is_null($message)) {
                $message = __('notifications.success');
            }

            return redirect()->route($routeName, $routeParameters)->with('type', 'success')->with('message', $message);
        });

        Response::macro('koView', function($routeName, $routeParameters = [], $message = null) {
            if (is_null($message)) {
                $message = __('notifications.error');
            }

            return redirect()->route($routeName, $routeParameters)->with('type', 'danger')->with('message', $message);
        });

        Response::macro('okJson', function($data = [], $message = null, $code = 200) {
            if (is_null($message)) {
                $message = __('notifications.success');
            }

            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $data
            ], $code);
        });

        Response::macro('koJson', function($data = [], $message = null, $code = 500) {
            if (is_null($message)) {
                $message = __('notifications.error');
            }

            return response()->json([
                'status' => false,
                'message' => $message,
                'data' => $data
            ], $code);
        });

    }
}
