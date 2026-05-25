<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EcoBank Admin') }} - Administrator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-[#F4F7F6]">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Backdrop for Mobile -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-gray-900/50 lg:hidden" @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-[#1E293B] text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-20 border-b border-gray-700/50">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="bg-[#5C8D3A] p-2 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-white">EcoAdmin</span>
                </a>
            </div>

            <!-- Sidebar Nav -->
            <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-semibold text-sm">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="font-semibold text-sm">Validasi Transaksi</span>
                </a>

                <a href="{{ route('admin.catalog.index') }}" class="{{ request()->routeIs('admin.catalog.*') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="font-semibold text-sm">Katalog Harga</span>
                </a>

                <a href="{{ route('admin.exchanges.index') }}" class="{{ request()->routeIs('admin.exchanges.*') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-semibold text-sm">Penukaran Poin</span>
                </a>

                <!-- Misi Section -->
                <div class="pt-4 mt-2 border-t border-gray-700/50">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Manajemen Misi</p>
                    <a href="{{ route('admin.missions.index') }}" class="{{ request()->routeIs('admin.missions.*') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span class="font-semibold text-sm">Kelola Misi</span>
                    </a>

                    <a href="{{ route('admin.user-missions.index') }}" class="{{ request()->routeIs('admin.user-missions.*') ? 'bg-[#5C8D3A] text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-semibold text-sm">Verifikasi Misi</span>
                    </a>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-700/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center w-full gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-colors duration-200 text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="font-semibold text-sm w-full">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex flex-col flex-1 w-full overflow-hidden">
            <!-- Header -->
            <header class="flex items-center justify-between h-20 px-6 bg-white border-b border-gray-200/60 shadow-sm z-10">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="p-2 text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800 tracking-tight">{{ $header ?? 'Admin Panel' }}</h1>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-100 rounded-full">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#5C8D3A] to-[#80bd53] flex items-center justify-center text-white font-bold shadow-inner">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-sm font-semibold text-gray-700 pr-2">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#F4F7F6]">
                <div class="container px-6 py-8 mx-auto xl:px-12">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <!-- Real-time Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForms = document.querySelectorAll('form[action]');
            
            searchForms.forEach(form => {
                const searchInput = form.querySelector('input[name="search"]');
                if (!searchInput) return;

                // Add spinner element inside the relative wrapper
                const inputWrapper = searchInput.parentElement;
                const spinnerHTML = `
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none hidden search-spinner">
                        <svg class="animate-spin h-5 w-5 text-[#5C8D3A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                `;
                inputWrapper.insertAdjacentHTML('beforeend', spinnerHTML);
                const spinner = inputWrapper.querySelector('.search-spinner');

                // Prevent default form submission if it's just searching
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                });

                let debounceTimer;
                searchInput.addEventListener('input', function() {
                    clearTimeout(debounceTimer);
                    
                    spinner.classList.remove('hidden');
                    
                    debounceTimer = setTimeout(() => {
                        const url = new URL(form.action);
                        url.searchParams.set('search', searchInput.value);
                        
                        // Update URL without reload
                        window.history.pushState({}, '', url);

                        fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'text/html'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            
                            // Find the table and pagination in both current and fetched document
                            const currentTableContainer = document.querySelector('.overflow-x-auto');
                            const newTableContainer = doc.querySelector('.overflow-x-auto');
                            
                            const currentPagination = document.querySelector('.border-t.border-gray-100.bg-gray-50\\/50');
                            const newPagination = doc.querySelector('.border-t.border-gray-100.bg-gray-50\\/50');
                            
                            if (currentTableContainer && newTableContainer) {
                                currentTableContainer.innerHTML = newTableContainer.innerHTML;
                            }
                            
                            if (currentPagination && newPagination) {
                                currentPagination.innerHTML = newPagination.innerHTML;
                            } else if (currentPagination && !newPagination) {
                                currentPagination.innerHTML = '';
                            }

                            spinner.classList.add('hidden');
                        })
                        .catch(error => {
                            console.error('Error fetching search results:', error);
                            spinner.classList.add('hidden');
                        });
                    }, 400); // 400ms debounce
                });
            });
        });
    </script>
</body>
</html>
