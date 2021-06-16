<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-10">
            <div class="">
                <!-- Logo -->
                <div class="flex mt-2 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-5 w-auto" />
                    </a>
                    <a href="{{ url('companies') }}" class="ml-3 text-gray-400 hover:text-gray-500">{{ session()->get('trading_name') }}</a>
                </div>

            </div>
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" title="Dashboard">
                        <x-icon-dashboard class="w-5 h-5 text-gray-500 hover:text-gray-600"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-graph-up class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Sales"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-cart class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Purchases"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('admin.inventory.index') }}" :active="request()->routeIs('admin.inventory.index')">
                        <x-icon-box class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Inventory"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-calendar class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Calendar"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-person class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Customers"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-truck class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Suppliers"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-book class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Accounting"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-suit-heart class="w-5 h-5 text-gray-500 hover:text-gray-600" title="HR"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-wallet2 class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Payroll"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        <x-icon-people class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Users"/>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('admin.setup.index') }}" :active="request()->routeIs('admin.setup.index')">
                        <x-icon-gear class="w-5 h-5 text-gray-500 hover:text-gray-600" title="Setup"/>
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Companies') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
