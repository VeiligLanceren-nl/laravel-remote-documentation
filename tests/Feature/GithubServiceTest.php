<?php

use Veiliglanceren\LaravelRemoteDocumentation\Services\GithubService;

it('can fetch default README.md', function () {
    /** @var GithubService $githubService */
    $githubService = app(GithubService::class);
    $remoteContent = $githubService->fetch('VeiligLanceren-nl/laravel-remote-documentation');

    expect(normalizeLineEndings($remoteContent))
        ->not()
        ->toBeEmpty();;
});

it('fetches the correct README content from GitHub', function () {
    /** @var GithubService $githubService */
    $githubService = app(GithubService::class);
    $remoteContent = $githubService->fetch('VeiligLanceren-nl/laravel-remote-documentation', '/tests/README.md');
    $packageRoot = dirname(__DIR__, 2);
    $localReadmePath = $packageRoot . '/tests/README.md';

    if (!file_exists($localReadmePath)) {
        throw new Exception('Local README.md not found at ' . $localReadmePath);
    }

    $localContent = file_get_contents($localReadmePath);

    expect(normalizeLineEndings($remoteContent))
        ->toBe(normalizeLineEndings($localContent));
});

/**
 * @param string $text
 * @return string
 */
function normalizeLineEndings(string $text): string
{
    return str_replace(["\r\n", "\r"], "\n", $text);
}
