<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" 
                        alt="Logo Musyawarah Digital" 
                        class="block h-10 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('chat')" :active="request()->routeIs('chat')">
                        {{ __('Room Chat') }}
                    </x-nav-link>
                    <x-nav-link :href="route('agenda')" :active="request()->routeIs('agenda')">
                        {{ __('Agenda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('voting')" :active="request()->routeIs('voting')">
                        {{ __('Voting') }}
                    </x-nav-link>
                    <!-- Presensi Digital -->
                    <x-nav-link :href="route('presence.index')" :active="request()->routeIs('presence.*')">
                        {{ __('Presensi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                        {{ __('FAQ') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- User Info and Logout -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex items-center space-x-4">
                    <!-- Presensi Status Indicator -->
                    @if(auth()->user()->presenceToday() && auth()->user()->presenceToday()->hadir)
                        <div class="relative group">
                            <div class="flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                <div class="h-2 w-2 bg-green-500 rounded-full mr-2"></div>
                                Hadir
                            </div>
                            <div class="absolute hidden group-hover:block bottom-full mb-2 px-3 py-2 text-xs bg-gray-800 text-white rounded-md">
                                Presensi: {{ auth()->user()->presenceToday()->created_at->format('H:i') }}
                            </div>
                        </div>
                    @else
                        <a href="{{ route('presence.index') }}" class="flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium hover:bg-red-200 transition duration-300">
                            <div class="h-2 w-2 bg-red-500 rounded-full mr-2"></div>
                            Belum Presensi
                        </a>
                    @endif
                    
                    <!-- User Name -->
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ Auth::user()->name }}
                    </div>
                    
                    <!-- Profile Link -->
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition duration-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('chat')" :active="request()->routeIs('chat')">
                {{ __('Room Chat') }}
            </x-responsive-nav-link>
            <x-nav-link :href="route('agenda')" :active="request()->routeIs('agenda.*')">
                {{ __('Agenda') }}
            </x-nav-link>
            <x-nav-link :href="route('minutes.index')" :active="request()->routeIs('minutes.*')">
                 {{ __('Notulen') }}
            </x-nav-link>
            <x-responsive-nav-link :href="route('voting')" :active="request()->routeIs('voting')">
                {{ __('Voting') }}
            </x-responsive-nav-link>
            <!-- Presensi Digital (Mobile) -->
            <x-responsive-nav-link :href="route('presence.index')" :active="request()->routeIs('presence.*')">
                {{ __('Presensi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                {{ __('FAQ') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                
                <!-- Presensi Status (Mobile) -->
                <div class="mt-2">
                    @if(auth()->user()->presenceToday() && auth()->user()->presenceToday()->hadir)
                        <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                            <div class="h-2 w-2 bg-green-500 rounded-full mr-2"></div>
                            Hadir: {{ auth()->user()->presenceToday()->created_at->format('H:i') }}
                        </div>
                    @else
                        <a href="{{ route('presence.index') }}" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm hover:bg-red-200">
                            <div class="h-2 w-2 bg-red-500 rounded-full mr-2"></div>
                            Belum Presensi
                        </a>
                    @endif
                </div>
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
        </div>
    </div>
</nav>