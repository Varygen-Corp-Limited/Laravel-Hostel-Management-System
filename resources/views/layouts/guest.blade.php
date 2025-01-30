<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Luxury Hostel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant:400,500,600|montserrat:400,500,600&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Montserrat', 'sans-serif'],
                            serif: ['Cormorant', 'serif'],
                        },
                        colors: {
                            luxury: {
                                50: '#f9f7f5',
                                100: '#f2ede8',
                                200: '#e5d9cf',
                                300: '#d3bfae',
                                400: '#c0a28d',
                                500: '#a47e62',
                                600: '#8b6548',
                                700: '#735139',
                                800: '#5f4332',
                                900: '#4f392d',
                            },
                            accent: {
                                50: '#fdf8f6',
                                100: '#f2e8e5',
                                200: '#eaddd7',
                                300: '#e0cec7',
                                400: '#d2bab0',
                                500: '#bfa094',
                                600: '#a18072',
                                700: '#977669',
                                800: '#846358',
                                900: '#43302b',
                            },
                        },
                    },
                },
                plugins: [
                    function({
                        addBase,
                        theme
                    }) {
                        addBase({
                            'input[type="checkbox"]': {
                                borderRadius: theme('borderRadius.DEFAULT'),
                                borderColor: theme('colors.luxury.300'),
                                '&:focus': {
                                    '--tw-ring-color': theme('colors.luxury.500'),
                                },
                            },
                        })
                    },
                ],
            }
        </script>
    @endif
</head>

<body
    class="font-sans text-gray-900 antialiased bg-gradient-to-br from-luxury-50 to-luxury-100 dark:from-gray-900 dark:to-gray-800">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute -left-48 -top-48 w-96 h-96 rounded-full bg-luxury-200/30 dark:bg-luxury-900/30 blur-3xl">
            </div>
            <div
                class="absolute -right-48 -bottom-48 w-96 h-96 rounded-full bg-accent-200/30 dark:bg-accent-900/30 blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full bg-white/5 dark:bg-black/5 backdrop-blur-3xl">
            </div>
        </div>

        <div class="z-10">
            <a href="/" class="flex items-center justify-center space-x-3 group">
                <span
                    class="font-serif text-5xl font-bold bg-gradient-to-r from-luxury-600 to-accent-600 bg-clip-text text-transparent group-hover:from-luxury-700 group-hover:to-accent-700 transition-all duration-300">HMS</span>
            </a>
        </div>

        {{ $slot }}

        <div class="z-10 mt-8 text-center text-sm text-luxury-600/60 dark:text-luxury-400/60">
            <p>© {{ date('Y') }} Luxury Hostel. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
