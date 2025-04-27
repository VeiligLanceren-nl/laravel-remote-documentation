<?php

use Veiliglanceren\LaravelRemoteDocumentation\Facades\RemoteDocumentation;
use Veiliglanceren\LaravelRemoteDocumentation\DocumentationServiceProvider;
use Veiliglanceren\LaravelRemoteDocumentation\Services\RemoteDocumentationService;

it('registers the DocumentationServiceProvider correctly', function () {
    $this->assertTrue(app()->providerIsLoaded(DocumentationServiceProvider::class));
});

it('binds the RemoteDocumentationService in the container', function () {
    $service = app(RemoteDocumentationService::class);
    expect($service)->toBeInstanceOf(RemoteDocumentationService::class);
});

it('resolves the RemoteDocumentation facade', function () {
    $instance = RemoteDocumentation::getFacadeRoot();
    expect($instance)->toBeInstanceOf(RemoteDocumentationService::class);
});
