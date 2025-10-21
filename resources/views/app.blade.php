<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        //document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            /*html.dark {
                background-color: oklch(0.145 0 0);
            }*/
        </style>


        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <!--link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" /-->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swap');

            .funnel-display {
                font-family: "Funnel Display", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }

            html {
                scroll-behavior: smooth;
            }

            @keyframes gradient {
                0% { background-position: 0 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0 50%; }
            }

            .gradient-animation {
                background-size: 300% 300%;
                animation: gradient 5s ease infinite;
            }
        </style>

        @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
        <script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "9902393607bb45bdb88b781088c9033c"}'></script>
    </body>
</html>
