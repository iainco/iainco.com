<?php

namespace App\Console\Commands;

use App\Models\CvTrackingCode;
use App\Services\CvPdfGenerator;
use Illuminate\Console\Command;
use Throwable;

class CvPdfCommand extends Command
{
    protected $signature = 'cv:pdf {action=generate : generate or clear} {--code= : Tracking code used to render the CV page, defaults to the newest active code}';

    protected $description = 'Generate or clear the cached CV PDF';

    public function handle(CvPdfGenerator $generator): int
    {
        return match ($this->argument('action')) {
            'generate' => $this->generate($generator),
            'clear' => $this->clear($generator),
            default => $this->invalidAction(),
        };
    }

    private function generate(CvPdfGenerator $generator): int
    {
        $code = $this->option('code')
            ?? CvTrackingCode::where('expires_at', '>', now())->latest()->value('code');

        if (! $code) {
            $this->error('No active tracking code found. Create one with cv:code create, or pass --code.');

            return 1;
        }

        try {
            $path = $generator->generate($code);
        } catch (Throwable $e) {
            $this->error('PDF generation failed: '.$e->getMessage());

            return 1;
        }

        $this->info("CV PDF generated: {$path}");

        return 0;
    }

    private function clear(CvPdfGenerator $generator): int
    {
        $generator->clear();
        $this->info('Cached CV PDFs cleared.');

        return 0;
    }

    private function invalidAction(): int
    {
        $this->error('Invalid action. Use: generate or clear.');

        return 1;
    }
}
