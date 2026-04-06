<?php

namespace App\Console\Commands;

use App\Models\CvTrackingCode;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CvCodeCommand extends Command
{
    protected $signature = 'cv:code {action : create, list, or delete} {--entity= : Entity name for create} {--code= : Code to delete} {--days=30 : Days until expiry for create}';

    protected $description = 'Manage CV tracking codes';

    public function handle(): int
    {
        return match ($this->argument('action')) {
            'create' => $this->createCode(),
            'list' => $this->listCodes(),
            'delete' => $this->deleteCode(),
            default => $this->invalidAction(),
        };
    }

    private function createCode(): int
    {
        $entity = $this->option('entity');

        if (!$entity) {
            $this->error('The --entity option is required for create.');
            return 1;
        }

        $days = (int) $this->option('days');

        do {
            $code = Str::lower(Str::random(5));
        } while (CvTrackingCode::where('code', $code)->exists());

        $trackingCode = CvTrackingCode::create([
            'code' => $code,
            'entity' => $entity,
            'expires_at' => now()->addDays($days),
        ]);

        $this->info("Tracking code created:");
        $this->line("  Entity:  {$trackingCode->entity}");
        $this->line("  Code:    {$trackingCode->code}");
        $this->line("  Expires: {$trackingCode->expires_at->format('Y-m-d H:i')}");
        $this->newLine();

        return 0;
    }

    private function listCodes(): int
    {
        $codes = CvTrackingCode::orderBy('created_at', 'desc')->get();

        if ($codes->isEmpty()) {
            $this->info('No tracking codes found.');
            return 0;
        }

        $this->table(
            ['Code', 'Entity', 'Expires', 'Hits', 'Last Hit', 'Status'],
            $codes->map(fn (CvTrackingCode $code) => [
                $code->code,
                $code->entity,
                $code->expires_at->format('Y-m-d H:i'),
                $code->hit_count,
                $code->last_hit_at?->format('Y-m-d H:i') ?? 'Never',
                $code->isExpired() ? 'EXPIRED' : 'Active',
            ])
        );

        return 0;
    }

    private function deleteCode(): int
    {
        $code = $this->option('code');

        if (!$code) {
            $this->error('The --code option is required for delete.');
            return 1;
        }

        $trackingCode = CvTrackingCode::where('code', $code)->first();

        if (!$trackingCode) {
            $this->error("Code '{$code}' not found.");
            return 1;
        }

        $trackingCode->delete();
        $this->info("Code '{$code}' ({$trackingCode->entity}) deleted.");

        return 0;
    }

    private function invalidAction(): int
    {
        $this->error('Invalid action. Use: create, list, or delete.');
        return 1;
    }
}
