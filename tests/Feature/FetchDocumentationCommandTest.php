<?php

use Illuminate\Support\Facades\Artisan;

it('can run the fetch documentation command successfully', function () {
    $exitCode = Artisan::call('remote-docs:fetch', [
        'repo' => 'VeiligLanceren-nl/laravel-remote-documentation',
        'file' => 'README.md',
    ]);

    expect($exitCode)->toBe(0);
});
