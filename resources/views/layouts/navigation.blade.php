<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex items-center">
                <!-- Logo / Title -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('empleados.index') }}" class="flex items-center gap-2 group">

                        <span class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                            Sistema
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:ms-10 space-x-1">
                    <a href="{{ route('empleados.index') }}"
                       class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('empleados.*') ? 'bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        Empleados
                    </a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('departamentos.index') }}"
                    class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('departamentos.*') ? 'bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        Departamentos
                    </a>
                @endif
                </div>
            </div>

            <!-- Right -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </div>
                                    @if(auth()->user()->isAdmin())
                                        <div class="text-xs text-indigo-600 dark:text-indigo-400">
                                            Administrador
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.293 7.293L10 12l4.707-4.707-1.414-1.414L10 9.172 6.707 5.879z"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 py-3 space-y-1">
            <!-- User info mobile -->
            <div class="flex items-center gap-3 px-3 py-2 mb-3 bg-gray-50 dark:bg-gray-700 rounded-md">
                <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ Auth::user()->name }}
                    </div>
                    @if(auth()->user()->isAdmin())
                        <div class="text-xs text-indigo-600 dark:text-indigo-400">
                            Administrador
                        </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('empleados.index') }}" 
               class="block px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('empleados.*') ? 'bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Empleados
            </a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('departamentos.index') }}" 
                   class="block px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('departamentos.*') ? 'bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    Departamentos
                </a>
            @endif
            <a href="{{ route('profile.edit') }}" 
               class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                Perfil
            </a>

            <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-200 dark:border-gray-700">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</nav>