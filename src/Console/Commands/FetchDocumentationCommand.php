<?php

namespace Veiliglanceren\LaravelRemoteDocumentation\Console\Commands;

use Illuminate\Console\Command;
use Veiliglanceren\LaravelRemoteDocumentation\Interfaces\Services\IFileGenerateService;

class FetchDocumentationCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'remote-docs:fetch {repo} {file?}';

    /**
     * @var string
     */
    protected $description = 'Fetch remote documentation from GitHub and save it as a Blade file.';

    /**
     * @param IFileGenerateService $fileGenerateService
     */
    public function __construct(
        protected IFileGenerateService $fileGenerateService
    )
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function handle(): int
    {
        $repo = $this->argument('repo');
        $file = $this->argument('file') ?? 'README.md';

        $this->info("Fetching documentation from {$repo}...");

        try {
            $path = $this->fileGenerateService->generate($repo, $file);

            $this->info("Documentation saved to {$path}");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error fetching documentation: ' . $e->getMessage());

            return self::FAILURE;
        }
    }
}
