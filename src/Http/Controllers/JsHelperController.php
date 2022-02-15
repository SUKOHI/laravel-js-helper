<?php

namespace Sukohi\JsHelper\Http\Controllers;

use Illuminate\Support\Facades\Route;

class JsHelperController
{
    public function js()
    {
        $helper_data = [
            'route' => $this->getRouteData(),
            'constants' => $this->getConstantsData(),
        ];
        $last_modified = $this->getLastModifiedData();

        return response()
            ->view('js-helper::js', ['helper_data' => $helper_data])
            ->header('Content-Type', 'application/javascript')
            ->header('Last-Modified', $last_modified);
    }

    private function getRouteData()
    {
        $route_data = [];
        $route_names = config('js_helper.route_names');
        $routes = Route::getRoutes();

        foreach($route_names as $route_name) {

            $route = $routes->getByName($route_name);

            if(!is_null($route)) {

                $route_data[] = [
                    'name' => $route_name,
                    'uri' => $route->uri(),
                ];

            }

        }

        return $route_data;
    }

    private function getConstantsData()
    {
        return config('js_helper.constants');
    }

    private function getLastModifiedData()
    {
        $config_path = config_path('js_helper.php');
        $path = (file_exists($config_path)) ? $config_path : __DIR__ . '/../../config/js_helper.php';
        $timestamp = filemtime($path);

        return gmdate('D, d M Y H:i:s', $timestamp) .' GMT';
    }
}
