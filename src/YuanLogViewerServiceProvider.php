<?php

namespace Dcat\LogViewer;

use Illuminate\Support\ServiceProvider;

class YuanLogViewerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/view', 'yuan-log-viewer');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'yuan-log-viewer');
        }

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        app('router')->group([
            'prefix' => config('yuan-log-viewer.route.prefix', 'yuan-logs'),
            'namespace' => config('yuan-log-viewer.route.namespace', 'Yuan\LogViewer'),
            'middleware' => config('yuan-log-viewer.route.middleware'),
        ], function ($router) {
            $router->get('/', ['as' => 'yuan-log-viewer', 'uses' => 'LogController@index',]);
            $router->get('download', ['as' => 'yuan-log-viewer.download', 'uses' => 'LogController@download',]);
            $router->get('{file}', ['as' => 'yuan-log-viewer.file', 'uses' => 'LogController@index',]);
        });
    }
}
