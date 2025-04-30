<?php

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use VeiligLanceren\GithubFile\GithubFileServiceProvider;
use Veiliglanceren\LaravelRemoteDocumentation\DocumentationServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * @param $app
     * @return class-string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            DocumentationServiceProvider::class,
            GithubFileServiceProvider::class,
        ];
    }
}