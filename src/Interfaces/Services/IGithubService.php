<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services;

use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FetchDocumentationException;

interface IGithubService
{
    /**
     * @param string $repo
     * @param string $file
     * @return string
     * @throws FetchDocumentationException
     */
    public function fetch(string $repo, string $file = 'README.md'): string;
}