<nav x-data="{ open: false }" class="bg-white border-b-4 border-[#0075B2] shadow-lg"> <!-- Borde más grueso -->
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logoTea.png') }}" class="block h-14 w-auto" alt="Logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:ms-10 sm:flex items-center"> <!-- Aumentado el espacio entre botones -->
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="nav-link text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 transition duration-300 ease-in-out px-6 py-4 rounded-md text-lg font-semibold {{ request()->routeIs('dashboard') ? 'border-b-4 border-[#0075B2]' : '' }}">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')"
                        class="nav-link text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 transition duration-300 ease-in-out px-6 py-4 rounded-md text-lg font-semibold {{ request()->routeIs('roles.index') ? 'border-b-4 border-[#0075B2]' : '' }}">
                        {{ __('Roles') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')"
                        class="nav-link text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 transition duration-300 ease-in-out px-6 py-4 rounded-md text-lg font-semibold {{ request()->routeIs('users.index') ? 'border-b-4 border-[#0075B2]' : '' }}">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('patients.index') }}" :active="request()->routeIs('patients.index')"
                        class="nav-link text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 transition duration-300 ease-in-out px-6 py-4 rounded-md text-lg font-semibold {{ request()->routeIs('patients.index') ? 'border-b-4 border-[#0075B2]' : '' }}">
                        {{ __('Pacientes') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-6 py-4 text-lg font-semibold rounded-md text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 focus:outline-none transition duration-300 ease-in-out">
                                        {{ Auth::user()->currentTeam->name }}
                                        <svg class="ms-2 -me-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60 bg-white text-gray-800">
                                    <!-- ... contenido del dropdown sin cambios ... -->
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-[#0075B2] transition">
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-6 py-4 text-lg font-semibold rounded-md text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 focus:outline-none transition duration-300 ease-in-out">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white text-gray-800">
                                <!-- ... contenido del dropdown sin cambios ... -->
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 focus:outline-none focus:text-[#D6D58E] transition duration-300 ease-in-out">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-white">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                class="text-gray-800 hover:text-[#D6D58E] hover:bg-gray-100 px-6 py-4 rounded-md block text-lg font-semibold">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <!-- ... otros enlaces responsivos con los mismos ajustes ... -->
        </div>

        <div class="border-t border-gray-200 bg-white">
            <!-- ... contenido del menú móvil con los mismos ajustes ... -->
        </div>
    </div>
</nav>
