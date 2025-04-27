<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Services;

use League\CommonMark\Exception\CommonMarkException;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FetchDocumentationException;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\ParseMarkdownException;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IParseService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IGithubService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

class RemoteDocumentationService implements IRemoteDocumentationService
{
    /**
     * @param IGithubService $githubService
     * @param IParseService $parseService
     */
    public function __construct(
        protected IGithubService $githubService,
        protected IParseService $parseService
    ) {}

    /**
     * {@inheritDoc}
     */
    public function get(string $repo, string $file = 'README.md'): string
    {
        $markdown = $this->githubService->fetch($repo, $file);

        return $this->parseService->toHtml($markdown);
    }

    /**
     * {@inheritDoc}
     */
    public function parse(string $markdown): string
    {
        return $this->parseService->toHtml($markdown);
    }
}