<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services;

use League\CommonMark\Exception\CommonMarkException;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\ParseMarkdownException;

interface IParseService
{
    /**
     * @param string $markdown
     * @return string
     * @throws CommonMarkException
     * @throws ParseMarkdownException
     */
    public function toHtml(string $markdown): string;
}