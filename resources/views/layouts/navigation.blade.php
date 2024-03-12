<nav x-data="{ open: false }" class="dark-bg-gray border-bottom border-dark-subtle">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 px-3" style="max-width: 80rem">
        <div class="d-flex justify-content-between" style="height: 4rem">
            <div class="d-flex">
                <!-- Logo -->
                <div class="d-flex flex-shrink-0 align-items-center">
                    <a href="{{ route('dashboard') }}" title="SiteAnalyst" class="link-light">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="d-flex ml-4">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Главная') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="settings-dropdown d-flex align-items-center ml-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="bg-dark d-inline-flex justify-items-center align-items-center rounded-3 px-3 py-2 text-light link-opacity-75-hover">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
