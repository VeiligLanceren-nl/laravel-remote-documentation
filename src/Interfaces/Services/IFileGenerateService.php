<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services;

use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FileGenerationException;

interface IFileGenerateService
{
    /**
     * @param string $repo
     * @param string $file
     * @return string
     * @throws FileGenerationException
     */
    public function generate(string $repo, string $file = 'README.md'): string;
}