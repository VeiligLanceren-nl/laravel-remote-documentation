<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Facades;

use Illuminate\Support\Facades\Facade;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

/**
 * @method static string get(string $repository, string $file = 'README.md')
 * @method static string parse(string $markdown)
 *
 * @see \Veiliglanceren\LaravelRemoteDocumentation\Services\IRemoteDocumentationService
 */
class RemoteDocumentation extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return IRemoteDocumentationService::class;
    }
}
