<?php

use Illuminate\Support\Facades\Http;
use Veiliglanceren\LaravelRemoteDocumentation\Services\GithubService;

it('can fetch markdown file from GitHub',
    function () {
        Http::fake([
            '*' => Http::response('# Hello World', 200),
        ]);

        $service = new GithubService();

        $content = $service->fetch('vendor/repo');

        expect($content)->toBe('# Hello World');
    });
