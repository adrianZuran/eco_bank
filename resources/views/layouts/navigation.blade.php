<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="shrink-0 flex items-center pr-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <div class="flex items-center justify-center p-1 rounded-lg w-20 h-20 overflow-hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                </a>
            </div>

            <!-- Centered Navigation Links -->
            <div class="hidden sm:flex sm:items-center sm:space-x-2 lg:space-x-6 flex-1 justify-center">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-md {{ request()->routeIs('home') ? 'bg-[#EBF2E5] text-[#3F6A28] font-bold' : 'text-gray-500 hover:text-gray-900 font-medium' }} text-sm transition-colors">Beranda</a>
                <a href="{{ route('catalog') }}" class="px-4 py-2 rounded-md {{ request()->routeIs('catalog') ? 'bg-[#EBF2E5] text-[#3F6A28] font-bold' : 'text-gray-500 hover:text-gray-900 font-medium' }} text-sm transition-colors">Katalog Harga</a>
                <a href="{{ route('deposit.index') }}" class="px-4 py-2 rounded-md {{ request()->routeIs('deposit.index') ? 'bg-[#EBF2E5] text-[#3F6A28] font-bold' : 'text-gray-500 hover:text-gray-900 font-medium' }} text-sm transition-colors">Jual Sampah</a>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-md {{ request()->routeIs(['dashboard', 'user.dashboard', 'admin.dashboard']) ? 'bg-[#EBF2E5] text-[#3F6A28] font-bold' : 'text-gray-500 hover:text-gray-900 font-medium' }} text-sm transition-colors">
                    Dashboard
                </a>
                <a href="{{ route('contact') }}" class="px-4 py-2 rounded-md {{ request()->routeIs('contact') ? 'bg-[#EBF2E5] text-[#3F6A28] font-bold' : 'text-gray-500 hover:text-gray-900 font-medium' }} text-sm transition-colors">Kontak</a>
            </div>

            <!-- Right Side (Profile & App Button) -->
            <div class="hidden sm:flex sm:items-center sm:gap-4 pl-8">
                @auth
                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="flex items-center gap-3">
                    <a href="{{ route('login', ['role' => 'admin']) }}" class="text-sm font-bold text-gray-500 hover:text-[#2C481A] px-2 transition-colors">
                        Admin Portal
                    </a>
                    <a href="{{ route('login') }}" class="px-6 py-2.5 bg-[#4A7F2F] hover:bg-[#345920] text-white rounded-full text-sm font-bold shadow-md transition-colors border border-[#4A7F2F]">
                        Masuk
                    </a>
                </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs(['dashboard', 'user.dashboard', 'admin.dashboard'])">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('deposit.index')" :active="request()->routeIs('deposit.index')">
                Jual Sampah
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('catalog')" :active="request()->routeIs('catalog')">
                Katalog Harga
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                Kontak
            </x-responsive-nav-link>
            <!-- Add other responsive links here if needed -->
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="px-4 mt-2">
                <div class="space-y-2">
                    <a href="{{ route('login', ['role' => 'admin']) }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-md text-sm font-bold text-center transition">
                        Portal Admin
                    </a>
                    <a href="{{ route('login') }}" class="block px-4 py-2 bg-[#4A7F2F] hover:bg-[#345920] text-white rounded-md text-sm font-bold text-center shadow-md transition">
                        Nasabah Masuk
                    </a>
                </div>
            </div>
            @endauth
        </div>
    </div>
</nav>
