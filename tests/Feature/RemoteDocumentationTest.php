<?php

use Veiliglanceren\LaravelRemoteDocumentation\Facades\RemoteDocumentation;

it('can fetch remote documentation content', function () {
    $content = RemoteDocumentation::get('VeiligLanceren-nl/laravel-remote-documentation', 'README.md');

    expect($content)
        ->toBeString()
        ->not()
        ->toBeEmpty();
});
