<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Services;

use Exception;
use Illuminate\Support\Facades\Http;
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
            $response = Http::get("https://raw.githubusercontent.com/{$repo}/main/{$file}");

            if ($response->failed()) {
                throw new FetchDocumentationException("Failed to fetch file {$file} from {$repo}.");
            }

            return $response->body();
        } catch (\Throwable $e) {
            throw new FetchDocumentationException($e->getMessage(), $e->getCode(), $e);
        }
    }
}