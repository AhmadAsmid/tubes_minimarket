<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-300 dark:border-gray-700 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-purple-600 dark:text-white">
                    <span class="text-2xl">LOGO</span>  <!-- Ganti dengan logo atau nama brand -->
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6 items-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('Dashboard') }}
                </x-nav-link>
                @hasrole('owner')
                <x-nav-link :href="route('store')" :active="request()->routeIs('store')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('Cabang') }}
                </x-nav-link>
                @endhasrole
                @hasrole('manager')
                <x-nav-link :href="route('user')" :active="request()->routeIs('user')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('User') }}
                </x-nav-link>
                @endhasrole
                @hasrole('inventory')
                <x-nav-link :href="route('category')" :active="request()->routeIs('category')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('Category') }}
                </x-nav-link>
                <x-nav-link :href="route('product')" :active="request()->routeIs('product')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('Product') }}
                </x-nav-link>
                @endhasrole
                @hasrole('cashier')
                <x-nav-link :href="route('transaction')" :active="request()->routeIs('transaction')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('Transaction') }}
                </x-nav-link>
                <x-nav-link :href="route('history')" :active="request()->routeIs('history')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                    {{ __('History') }}
                </x-nav-link>
                @endhasrole
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex items-center space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 px-4 py-2 text-white bg-purple-600 hover:bg-purple-700 rounded-md shadow-md transition duration-200">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-600 hover:text-purple-600">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-600 hover:text-purple-600">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none transition duration-200">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg text-gray-600 hover:text-purple-600 transition duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-400 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-200">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-600 hover:text-purple-600">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-600 hover:text-purple-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
