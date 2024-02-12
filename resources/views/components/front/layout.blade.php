<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'R.A.D') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/110870c8d6.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @if(isset($headScripts))
        {{ $headScripts }}
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased m-0">
    <div class="min-h-screen bg-gray-100">
        <x-front.navigation/>
        <!-- Page Heading -->
{{--        @if (isset($header))--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}
{{--        @endif--}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer id="newsletter" class="py-16 px-10 mt-16 text-center bg-white">
            <img src="/img/thomas-mahon-hex-queenfetoos.jpg"
                 alt="thomas-mahon-hex-queenfetoos.jpg" class="h-28 w-auto mx-auto mb-6 rounded-full">
            <h5 class="tex-3xl">Restons en contact avec les dernières publications</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form action="/newsletter"
                          method="POST" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/img/mail-svgrepo-com.svg"
                                     alt="mail-svgrepo-com.svg" class="h-5">
                            </label>
                            <div>
                                <input name="email" id="email" type="text" placeholder="Your email address" class="bg-transparent lg:border-transparent py-2 lg:py-0 pl-4 focus:border-transparent focus:ring-0">
                               @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </div>
    <x-front.flash/>
    @if(isset($scripts))
        {{ $scripts }}
    @endif
</body>
</html>
