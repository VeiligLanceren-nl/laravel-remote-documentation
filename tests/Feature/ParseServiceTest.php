<?php


use Veiliglanceren\LaravelRemoteDocumentation\Services\ParseService;

it('can parse markdown to HTML', function () {
    $parseService = app(ParseService::class);
    $html = $parseService->toHtml('# Hello World');

    expect($html)->toContain('<h1>Hello World</h1>');
});
