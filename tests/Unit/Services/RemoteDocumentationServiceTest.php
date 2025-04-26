<?php

use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IParseService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IGithubService;
use Veiliglanceren\LaravelRemoteDocumentation\Services\RemoteDocumentationService;

it('can fetch and parse documentation',
    function () {
        $github = Mockery::mock(IGithubService::class);
        $parser = Mockery::mock(IParseService::class);

        $github->shouldReceive('fetch')
            ->once()
            ->with('vendor/repo', 'README.md')
            ->andReturn('# Hello World');

        $parser->shouldReceive('toHtml')
            ->once()
            ->with('# Hello World')
            ->andReturn('<h1>Hello World</h1>');

        $service = new RemoteDocumentationService($github, $parser);

        $html = $service->get('vendor/repo');

        expect($html)->toBe('<h1>Hello World</h1>');
    });
