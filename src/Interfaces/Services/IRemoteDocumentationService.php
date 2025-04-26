<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services;

interface IRemoteDocumentationService
{
    /**
     * @param string $repo
     * @param string $file
     * @return string
     */
    public function get(string $repo, string $file = 'README.md'): string;
}