<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Production fallback that tries different versions of the assets -->
    @production
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    const testEl = document.createElement('div');
                    testEl.className = 'hidden';
                    document.body.appendChild(testEl);
                    const styles = window.getComputedStyle(testEl);
                    const tailwindLoaded = styles.display === 'none';
                    document.body.removeChild(testEl);

                    if (!tailwindLoaded) {
                        console.log('Tailwind CSS not loaded, adding fallback stylesheets');

                        // Try multiple possible filenames
                        const cssFiles = [
                            '{{ asset('build/assets/app-DXCnadYy.css') }}',
                            '{{ asset('build/assets/app.css') }}'
                        ];

                        const jsFiles = [
                            '{{ asset('build/assets/app-Bf4POITK.js') }}',
                            '{{ asset('build/assets/app.js') }}'
                        ];

                        // Try to load CSS files
                        let cssLoaded = false;
                        for (let i = 0; i < cssFiles.length && !cssLoaded; i++) {
                            const link = document.createElement('link');
                            link.rel = 'stylesheet';
                            link.href = cssFiles[i];
                            document.head.appendChild(link);
                            cssLoaded = true;
                        }

                        // Try to load JS files
                        let jsLoaded = false;
                        for (let i = 0; i < jsFiles.length && !jsLoaded; i++) {
                            const script = document.createElement('script');
                            script.type = 'module';
                            script.src = jsFiles[i];
                            document.body.appendChild(script);
                            jsLoaded = true;
                        }
                    }
                }, 500);
            });
        </script>
    @endproduction
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @include('layouts.navigation') --}}
        @include('layouts.sidebar')

        <!-- Page Heading -->
        {{-- @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset --}}

        <!-- Page Content -->
        {{-- <main>
            {{ $slot }}
        </main> --}}
    </div>

    @stack('scripts')
</body>

</html>
