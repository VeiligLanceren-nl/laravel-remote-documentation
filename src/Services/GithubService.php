<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use VeiligLanceren\GithubFile\Facades\GithubFile;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FetchDocumentationException;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IGithubService;

class GithubService implements IGithubService
{
    /**
     * {@inheritDoc}
     */
    public function fetch(string $repo, string $file = 'README.md'): string
    {
        try {
            return GithubFile::get($repo, $file);
        } catch (Exception $exception) {
            throw new FetchDocumentationException($exception->getMessage());
        }
    }
}