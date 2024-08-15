<?php

namespace Dcat\LogViewer;

use Illuminate\Support\ServiceProvider;

class YuanRunLogViewerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/view', 'yuanrun-log-viewer');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'yuanrun-log-viewer');
        }

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        app('router')->group([
            'prefix' => config('yuanrun-log-viewer.route.prefix', 'yuanrun-logs'),
            'namespace' => config('yuanrun-log-viewer.route.namespace', 'YuanRun\LogViewer'),
            'middleware' => config('yuanrun-log-viewer.route.middleware'),
        ], function ($router) {
            $router->get('/', ['as' => 'yuanrun-log-viewer', 'uses' => 'LogController@index',]);
            $router->get('download', ['as' => 'yuanrun-log-viewer.download', 'uses' => 'LogController@download',]);
            $router->get('{file}', ['as' => 'yuanrun-log-viewer.file', 'uses' => 'LogController@index',]);
        });
    }
}
