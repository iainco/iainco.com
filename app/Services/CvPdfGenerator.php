<?php

namespace App\Services;

use App\Models\CvSection;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class CvPdfGenerator
{
    /**
     * Path to a PDF that reflects the current CV content, generating it if needed.
     */
    public function path(string $code): string
    {
        $path = $this->cachePath();

        if (! File::exists($path)) {
            $this->generate($code);
        }

        return $path;
    }

    /**
     * Render the CV PDF page through headless Chrome and cache the result.
     */
    public function generate(string $code): string
    {
        $path = $this->cachePath();

        File::ensureDirectoryExists(dirname($path));

        $this->browsershot($code)->savePdf($path);

        foreach (File::glob($this->directory().'/cv-*.pdf') as $stale) {
            if ($stale !== $path) {
                File::delete($stale);
            }
        }

        return $path;
    }

    /**
     * Remove every cached PDF.
     */
    public function clear(): void
    {
        if (File::isDirectory($this->directory())) {
            File::cleanDirectory($this->directory());
        }
    }

    protected function browsershot(string $code): Browsershot
    {
        $config = config('cv.pdf');

        $browsershot = Browsershot::url(route('cv-pdf', $code))
            ->setNodeModulePath(base_path('node_modules'))
            ->preventUnsuccessfulResponse()
            ->waitUntilNetworkIdle()
            ->emulateMedia('print')
            ->windowSize(794, 1123) // A4 at 96dpi, so fixed backgrounds cover the whole page
            ->format('A4')
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->timeout($config['timeout']);

        if ($config['node_binary']) {
            $browsershot->setNodeBinary($config['node_binary']);
        }

        if ($config['npm_binary']) {
            $browsershot->setNpmBinary($config['npm_binary']);
        }

        if ($config['chrome_path']) {
            $browsershot->setChromePath($config['chrome_path']);
        }

        if ($config['no_sandbox']) {
            $browsershot->noSandbox();
        }

        return $browsershot;
    }

    protected function directory(): string
    {
        return storage_path('app/private/cv');
    }

    /**
     * The cached file name changes whenever the CV content or the front end build changes.
     */
    protected function cachePath(): string
    {
        $manifest = public_path('build/manifest.json');

        $stamp = md5(implode('|', [
            (string) CvSection::max('updated_at'),
            File::exists($manifest) ? File::lastModified($manifest) : 0,
        ]));

        return $this->directory()."/cv-{$stamp}.pdf";
    }
}
