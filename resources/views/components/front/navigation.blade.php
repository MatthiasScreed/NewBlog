<div class="bg-white">
    <header class="flex items-center justify-between px-4 lg:max-w-7xl lg:mx-auto">
        <a href="{{ route('home') }}" class="inline-block py-2">
            <img src="" alt="Logo" class="w-full h-8">
        </a>
        <nav class="lg:ml-8 flex">
            <a class="px-4" href="{{route('about')}}">About</a>
            <div>
                @guest
                    <a class="px-4" href="{{ route('login') }}">Se connecter</a>
                    <a class="px-4" href="{{ route('register') }}">S'inscrire</a>
                 @else
                    <a class="px-4" href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                @endguest
            </div>
        </nav>
    </header>
</div>
