<?php

use Illuminate\View\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Veiliglanceren\LaravelRemoteDocumentation\Services\FileGenerateService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

beforeEach(function () {
    File::shouldReceive('exists')->andReturn(false);
    File::shouldReceive('makeDirectory')->andReturn(true);
    File::shouldReceive('put')->andReturn(true);
    View::swap(Mockery::mock(Factory::class));
});

it('can generate blade file from documentation', function () {
    $remoteDocumentation = Mockery::mock(IRemoteDocumentationService::class);

    $remoteDocumentation->shouldReceive('get')
        ->once()
        ->andReturn('<h1>Test</h1>');

    $fakeView = Mockery::mock();
    $fakeView->shouldReceive('render')
        ->once()
        ->andReturn('<html>Rendered View</html>');

    View::shouldReceive('make')
        ->once()
        ->with('remote-documentation::generated-doc', Mockery::on(function ($data) {
            return isset($data['content']) && $data['content'] === '<h1>Test</h1>';
        }))
        ->andReturn($fakeView);

    $service = new FileGenerateService($remoteDocumentation);

    $path = $service->generate('vendor/repo', 'README.md');

    expect($path)->toContain('vendor_repo.blade.php');
});
