<?php

use Illuminate\Support\Facades\Artisan;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

beforeEach(function () {
    $this->mock = Mockery::mock(IRemoteDocumentationService::class);
    app()->instance(IRemoteDocumentationService::class, $this->mock);
});

it('can fetch and generate documentation', function () {
    $repository = 'vendor/repo';
    $path = 'README.md';

    $this->mock->shouldReceive('get')
        ->once()
        ->with($repository, $path)
        ->andReturn('<h1>Fetched Content</h1>');

    $status = Artisan::call('remote-docs:fetch', [
        'repo' => $repository,
        'file' => $path,
    ]);

    expect($status)->toBe(0);
    expect(Artisan::output())->toContain('Fetching documentation from');
});
