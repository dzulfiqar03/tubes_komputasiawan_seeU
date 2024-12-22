@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar main-header mainColor mb-0">
    <div class="container-fluid">
        
        <div class="d-flex">
            
            <div class="btnTgl1" id="btnTgl1">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars m-auto"></i></a>
                </li>
            </div>

            <div class="btnTgl2" id="btnTgl2">
                <button class="navbar-toggler backToogle" type="button" id="backToogle" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand px-3 text-white fw-bold" href="#">{{ $pageTitle }}</a>
            </div>
        </div>

        <button class="navbar-toggler bg-warning text-dark p-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <i class="bi-person-circle"></i>
            Welcome,

            @if (Auth::check())
                {{ Auth::user()->userName }}!
            @else
                Guest!
            @endif
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark justify-center items-center" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">My Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body text-center">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item mb-5">
                        
                        @if (Auth::check())
                            <img class="rounded-circle"
                                src="{{ Storage::url('images/' . Auth::user()->original_filename) }}"
                                width="200px" height="200px" alt="image">
                        @else
                            <img class="mx-auto mb-5" src="{{ Vite::asset('/resources/images/profile.png') }}"
                                width="200px" height="200px" alt="image">
                        @endif

                    </li>
                    <li class="nav-item">

                        @if (Auth::check())
                            <h5 class="fw-bold">{{ Auth::user()->fullName }}</h5>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Auth::check())
                            <h5 class="fw-bold">{{ Auth::user()->email }}</h5>
                        @endif
                    </li>

                    <li class="nav-item mt-5">
                        @if (Auth::check())
                            <h5 class="fw-bold">{{ Auth::user()->role }}</h5>
                        @endif
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>

<style>
    .offcanvas-backdrop.show{
        opacity: 0;
    }

    .rightContent{
        padding: 0;
    }
</style>