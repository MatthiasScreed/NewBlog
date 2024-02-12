<div class="bg-white">
    <header class="flex items-center justify-between px-4 lg:max-w-7xl lg:mx-auto">
        <a href="{{ route('home') }}" class="inline-block py-2">
            <img src="" alt="Logo" class="w-full h-8">
        </a>
        <nav class="lg:ml-8 flex items-center">
            <a class="px-4" href="{{route('about')}}">About</a>
            <div>
                @guest
                    <a class="px-4" href="{{ route('login') }}">Se connecter</a>
                    <a class="px-4" href="{{ route('register') }}">S'inscrire</a>
                 @else
                    <div
                        x-data="{ open: false}"
                        class="relative">
                        <button
                            x-on:click="open = true"
                            class="flex items-center bg-white focus:bg-gray-400 text-gray-700 focus:text-gray-900 font-semibold rounded focus:outline-none focus:shadow-inner py-2 px-4"
                            type="button">

                            <span>{{ auth()->user()->name }}</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  style="margin-top:3px">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </button>
                        <ul
                         x-show="open"
                         x-on:click.away="open = false"
                         class="bg-white text-gray-700 rounded shadow-lg absolute py-2 mt-1">
                            <li>
                                <a class="block hover:bg-gray-200 whitespace-no-wrap px-4" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            </li>

                            @role(['admin', 'superadministrator'])
                                <x-dropdown-link :href="route('admin.posts.create')">
                                    Create post
                                </x-dropdown-link>
                            @endrole

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </ul>
                    </div>
{{--                    <a class="px-4" href="{{ route('dashboard') }}"></a>--}}
                @endguest
            </div>
        </nav>
    </header>
</div>
