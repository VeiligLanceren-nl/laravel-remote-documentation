<?php

use Veiliglanceren\LaravelRemoteDocumentation\Services\ParseService;

it( 'can convert markdown to html',
    function () {
        $service = new ParseService();

        $html = $service->toHtml('# Hello');

        expect($html)->toContain('<h1>Hello</h1>');
    });
