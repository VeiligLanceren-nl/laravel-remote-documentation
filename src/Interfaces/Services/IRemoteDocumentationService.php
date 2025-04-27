<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services;

use League\CommonMark\Exception\CommonMarkException;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\ParseMarkdownException;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FetchDocumentationException;

interface IRemoteDocumentationService
{
    /**
     * @param string $repo
     * @param string $file
     * @return string
     * @throws CommonMarkException
     * @throws ParseMarkdownException
     * @throws FetchDocumentationException
     */
    public function get(string $repo, string $file = 'README.md'): string;

    /**
     * @param string $markdown
     * @return string
     * @throws CommonMarkException
     * @throws ParseMarkdownException
     */
    public function parse(string $markdown): string;
}