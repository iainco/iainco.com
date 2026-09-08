<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CV PDF
    |--------------------------------------------------------------------------
    |
    | The CV PDF is rendered from the /cv-pdf page through headless Chrome
    | (Spatie Browsershot + Puppeteer) and cached on disk. The binaries are
    | discovered automatically; override them here if the server needs it.
    |
    */

    'pdf' => [
        'filename' => 'Iain Collins CV.pdf',
        'node_binary' => env('CV_PDF_NODE_BINARY'),
        'npm_binary' => env('CV_PDF_NPM_BINARY'),
        'chrome_path' => env('CV_PDF_CHROME_PATH'),
        'no_sandbox' => (bool) env('CV_PDF_NO_SANDBOX', false),
        'timeout' => (int) env('CV_PDF_TIMEOUT', 60),
    ],

];
