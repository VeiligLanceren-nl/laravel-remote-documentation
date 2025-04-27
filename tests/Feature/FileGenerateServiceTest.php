<?php


use Veiliglanceren\LaravelRemoteDocumentation\Services\FileGenerateService;

it('can generate a blade file from documentation', function () {
    $fileGenerateService = app(FileGenerateService::class);
    $path = $fileGenerateService->generate('VeiligLanceren-nl/laravel-remote-documentation', 'README.md', '<h1>Hello World</h1>');

    expect($path)->toBeFile();
});
