<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Veiliglanceren\LaravelRemoteDocumentation\Exceptions\FileGenerationException;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IFileGenerateService;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IRemoteDocumentationService;

class FileGenerateService implements IFileGenerateService
{
    /**
     * @param IRemoteDocumentationService $remoteDocumentation
     */
    public function __construct(
        protected IRemoteDocumentationService $remoteDocumentation
    ) {}

    /**
     * {@inheritDoc}
     */
    public function generate(string $repo, string $file = 'README.md'): string
    {
        try {
            $html = $this->remoteDocumentation->get($repo, $file);

            $viewPath = resource_path('views/vendor/remote-documentation/' . str_replace('/', '_', $repo) . '.blade.php');

            if (!File::exists(dirname($viewPath))) {
                File::makeDirectory(dirname($viewPath), 0755, true);
            }

            $rendered = View::make('remote-documentation::generated-doc', [
                'content' => $html,
            ])->render();

            File::put($viewPath, $rendered);

            return $viewPath;
        } catch (\Throwable $e) {
            throw new FileGenerationException('Failed to generate documentation file: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}