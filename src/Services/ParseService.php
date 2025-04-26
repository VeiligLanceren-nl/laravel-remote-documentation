<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Services;

use League\CommonMark\CommonMarkConverter;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\ParseMarkdownException;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IParseService;

class ParseService implements IParseService
{
    /**
     * @var CommonMarkConverter
     */
    protected CommonMarkConverter $converter;

    public function __construct()
    {
        $this->converter = new CommonMarkConverter([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function toHtml(string $markdown): string
    {
        try {
            return (string) $this->converter->convert($markdown);
        } catch (\Throwable $e) {
            throw new ParseMarkdownException('Failed to parse markdown: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}