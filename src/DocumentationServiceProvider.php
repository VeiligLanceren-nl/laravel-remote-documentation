<?php

namespace Veiliglanceren\LaravelRemoteDocumentation;

use Illuminate\Support\ServiceProvider;
use Veiliglanceren\LaravelRemoteDocumentation\Services\ParseService;
use Veiliglanceren\LaravelRemoteDocumentation\Services\GithubService;
use Veiliglanceren\LaravelRemoteDocumentation\Services\FileGenerateService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IParseService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IGithubService;
use Veiliglanceren\LaravelRemoteDocumentation\Services\RemoteDocumentationService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IFileGenerateService;
use Veiliglanceren\LaravelRemoteDocumentation\Console\Commands\FetchDocumentationCommand;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(IParseService::class, ParseService::class);
        $this->app->bind(IGithubService::class, GithubService::class);
        $this->app->bind(IFileGenerateService::class, FileGenerateService::class);
        $this->app->bind(IRemoteDocumentationService::class, RemoteDocumentationService::class);

        $this->app->singleton('remote-documentation', function ($app) {
            return $app->make(IRemoteDocumentationService::class);
        });
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'remote-documentation');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/remote-documentation'),
        ], 'remote-documentation-views');

        $this->commands([
            FetchDocumentationCommand::class,
        ]);
    }
}