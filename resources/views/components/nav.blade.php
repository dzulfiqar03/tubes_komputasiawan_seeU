@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar main-header mainColor mb-0">
    <div class="container-fluid">

        <div class="d-flex">

            <div class="btnTgl1" id="btnTgl1">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars m-auto"></i></a>
                </li>
            </div>

            <div class="btnTgl2" id="btnTgl2">
                <button class="navbar-toggler backToogle" type="button" id="backToogle" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand px-3 text-white fw-bold" href="#">{{ $pageTitle }}</a>
            </div>
        </div>



        <div
            class="absolute pt-3 bottom-10 inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
              </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
                <!-- Include Alpine.js -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.0/dist/cdn.min.js" defer></script>

                <div x-data="{ open: false }" class="relative">
                    <!-- User Button -->
                    <button type="button"
                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        @click="open = !open" @keydown.escape.window="open = false" id="user-menu-button"
                        aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img width="50" height="100" class="rounded-full"
                        src="{{ Storage::url('images/' . Auth::user()->original_filename) }}" 
                            alt="User Avatar">
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem" data-widget="pushmenu">Your Profile</a>
            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-danger w-100 fw-bold btnReg border-0"
                                    type="submit">Logout</button>
                            </form>

                    </div>
                </div>

            </div>
</nav>

<style>
    .offcanvas-backdrop.show {
        opacity: 0;
    }

    .rightContent {
        padding: 0;
    }
</style>
