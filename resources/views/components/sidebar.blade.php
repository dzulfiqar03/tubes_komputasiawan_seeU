    <!-- Main Sidebar Container -->
    <aside class="main-sidebar mainColor h-full">

        <div class="all-sidebar mainColor h-screen px-3">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link ">
                <img class="mx-auto mb-5" src="{{ Vite::asset('resources/images/Logo/logo_verti.png') }}" width="200px"
                    alt="image">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <div id="accordion-collapse" class="mt-5 pt-5" data-accordion="collapse">

                            <div class="w-100 mt-5 h-100">
                                <div class="d-grid">
                                    @if ($currentRouteName == 'home')
                                        <a class="btn btn-warning fw-bold mb-3"
                                            href="{{ route('home', ['id' => Auth::user()->id]) }}">Home</a>

                                        <a class="btn btn-dark mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('allUmkm') }}">UMKM</a>
                                        <a class="btn btn-dark mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('about') }}">About
                                            Us</a>
                                    @elseif($currentRouteName == 'allUmkm')
                                        <a class="btn btn-dark  mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('home', ['id' => Auth::user()->id]) }}">Home</a>

                                        <a class="btn btn-warning fw-bold   mb-3" href="{{ route('allUmkm') }}">UMKM</a>
                                        <a class="btn btn-dark mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('about') }}">About
                                            Us</a>
                                    @elseif($currentRouteName == 'about')
                                        <a class="btn btn-dark  mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('home', ['id' => Auth::user()->id]) }}">Home</a>

                                        <a class="btn btn-dark  mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('allUmkm') }}">UMKM</a>
                                        <a class="btn btn-warning fw-bold  mb-3" href="{{ route('about') }}">About
                                            Us</a>
                                    @elseif(Auth::user()->role == 'admin' && $currentRouteName == 'admins')
                                        <a class="btn btn-warning  fw-bold mb-3"
                                            href="{{ route('admin.index') }}">Home</a>

                                        <a class="btn btn-dark  mb-3" href="{{ route('dataUmkm') }}"
                                            style="color:rgb(70, 70, 70)">UMKM</a>
                                        <a class="btn btn-dark  mb-3" href="{{ route('dataUser') }}"
                                            style="color:rgb(70, 70, 70)">Users</a>
                                       
                                    @elseif(Auth::user()->role == 'admin' && $currentRouteName == 'dataUser')
                                        <a class="btn btn-dark mb-3" href="{{ route('admin.index') }}"
                                            style="color:rgb(70, 70, 70)">Home</a>

                                        <a class="btn btn-dark mb-3" href="{{ route('dataUmkm') }}"
                                            style="color:rgb(70, 70, 70)">UMKM</a>
                                        <a class="btn btn-warning fw-bold  mb-3"
                                            href="{{ route('dataUser') }}">Users</a>
                                      
                                    @elseif(Auth::user()->role == 'admin' && $currentRouteName == 'dataUmkm')
                                        <a class="btn btn-dark mb-3" href="{{ route('admin.index') }}"
                                            style="color:rgb(70, 70, 70)">Home</a>

                                        <a class="btn btn-warning fw-bold  mb-3"
                                            href="{{ route('dataUmkm') }}">UMKM</a>

                                        <a class="btn btn-dark fw-bold  mb-3" href="{{ route('dataUser') }}"
                                            style="color:rgb(70, 70, 70)">Users</a>

                                     
                                    @else
                                        <a class="btn btn-dark  mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('home', ['id' => Auth::user()->id]) }}">Home</a>

                                        <a class="btn btn-dark  mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('allUmkm') }}">UMKM</a>
                                        <a class="btn btn-dark btn-dark mb-3" style="color:rgb(70, 70, 70)"
                                            href="{{ route('about') }}">About
                                            Us</a>
                                    @endif


                                </div>


                            </div>

                            <div class="bottomContent">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-danger w-100 fw-bold btnReg border-0"
                                        type="submit">Logout</button>
                                </form>
                            </div>
                        </div>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->



            </div>
            <!-- /.sidebar -->


        </div>

    </aside>

    <style>
        .sideCont {
            background-color: #90eb9639
        }

        .bodyCont {
            background-image: linear-gradient(to bottom right, #48A84E, #4AD991);
        }


        .txt {
            color: #48A84E;
        }
    </style>
