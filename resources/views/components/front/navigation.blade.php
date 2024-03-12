<div class="bg-white">
    <header class="py-2 sm:py-0 flex items-center justify-between px-4 lg:max-w-7xl lg:mx-auto">
        <a href="{{ route('home') }}" class="inline-block py-2">
            <img src="{{  asset('logo_matthias.svg') }}" alt="Logo" class="w-full h-6 md:h-8">
        </a>
        <nav class="hidden sm:ml-8 sm:flex sm:items-center">
            <a class="px-4 font-medium text-sm text-gray-700 hover:text-gray-900" href="{{route('about')}}">About</a>
            <div>
                @guest
                    <a class="px-4 text-sm font-medium text-gray-700 hover:text-gray-900" href="{{ route('login') }}">Sign in</a>
                    <a class="px-4 text-sm font-medium text-gray-700 hover:text-gray-900" href="{{ route('register') }}">Sign up</a>
                 @else
                    <div x-data="{ open: false}" class="relative">
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

                            <li>
                                <a class="block hover:bg-gray-200 whitespace-no-wrap px-4" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
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

        <div x-data="{ isOpen: false }" class="block relative sm:hidden">
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="isOpen = ! isOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': isOpen, 'inline-flex': ! isOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! isOpen, 'inline-flex': isOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div :class="{'block': isOpen, 'hidden': ! isOpen}" class="absolute right-0 bg-white index-10 mt-2 rounded-lg shadow sm:hidden">

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="space-y-1">

                        <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-800">About</a>
                        @guest
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-base text-nowrap text- font-medium text-gray-800">Sign In</a>
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-base text-nowrap font-medium text-gray-800">Sign Up</a>
                        @else
                            <div class="px-3 py-2 font-medium text-base text-nowrap text-gray-800">{{ Auth::user()->name }}</div>

                            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-base text-nowrap font-medium text-gray-800">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base text-nowrap font-medium text-gray-800">Profile</a>

                            @role(['superadministrator', 'administrator'])
                                <a href="{{ route('admin.posts.create') }}" class="block px-3 py-2 text-base text-nowrap font-medium text-gray-800">Create post</a>
                            @endrole

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                               this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
