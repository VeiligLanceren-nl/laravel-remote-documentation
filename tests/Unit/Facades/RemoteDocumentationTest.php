<?php

use Veiliglanceren\LaravelRemoteDocumentation\Facades\RemoteDocumentation;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IParseService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;
use Veiliglanceren\LaravelRemoteDocumentation\Services\RemoteDocumentationService;

it('forwards calls to the RemoteDocumentationService', function () {
    $mock = Mockery::mock(IRemoteDocumentationService::class);
    $mock->shouldReceive('get')
        ->once()
        ->with('vendor/repo', 'README.md')
        ->andReturn('<h1>Test</h1>');

    app()->instance(IRemoteDocumentationService::class, $mock);

    $result = RemoteDocumentation::get('vendor/repo', 'README.md');

    expect($result)->toBe('<h1>Test</h1>');
});

it( 'can convert markdown to html',
    function () {
        $service = app(IRemoteDocumentationService::class);

        $html = $service->parse('# Hello');

        expect($html)->toContain('<h1>Hello</h1>');
    });
