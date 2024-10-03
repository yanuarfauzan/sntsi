<!-- Sidebar -->
<div class="d-flex flex-column flex-sm-row">
    <nav class="navbar navbar-dark bg-primary d-lg-none p-4">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('landing-home') ? 'active' : '' }}" href="{{ route('landing-home') }}">
                    <i class="fas fa-tachometer-alt"></i> BERANDA
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('sanitasi') ? 'active' : '' }}" href="{{ route('sanitasi') }}">
                    <i class="fas fa-shower"></i> SANITASI
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('air-bersih') ? 'active' : '' }}" href="{{ route('air-bersih') }}">
                    <i class="fas fa-water"></i> AIR BERSIH
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('import') ? 'active' : '' }}" href="{{ route('import') }}">
                    <i class="fas fa-file-import"></i> IMPORT DATA
                </a>
            </li>
        </ul>
    </nav>
    <aside class="sidebar p-0 w-sm-100" style="width: 300px;">
        <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start h-100 w-100">
            <div class="bg-primary container-fluid h-100 d-flex flex-column w-25">
                <!-- Sidebar content -->
                <div class="d-none d-lg-block h-100">
                    <ul class="nav flex-column h-100 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('landing-home') ? 'opacity-50' : '' }}"
                                href="{{ route('landing-home') }}">
                                <i class="fas fa-tachometer-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('sanitasi') ? 'opacity-50' : '' }}"
                                href="{{ route('sanitasi') }}">
                                <i class="fas fa-shower"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('air-bersih') ? 'opacity-50' : '' }}"
                                href="{{ route('air-bersih') }}">
                                <i class="fas fa-water"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('import') ? 'opacity-50' : '' }}"
                                href="{{ route('import') }}">
                                <i class="fas fa-file-import"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-light container-fluid h-100 d-flex flex-column w-75 justify-content-between w-sm-100">
                <div class="text-dark ms-2 mt-4 text-center">
                    <h5 class="text-primary">
                        <strong>
                            @switch(true)
                                @case(request()->routeIs('landing-home'))
                                    BERANDA
                                @break

                                @case(request()->routeIs('sanitasi'))
                                    SANITASI
                                @break

                                @case(request()->routeIs('air-bersih'))
                                    AIR BERSIH
                                @break

                                @case(request()->routeIs('import'))
                                    IMPORT DATA
                                @break
                            @endswitch
                        </strong>
                    </h5>
                </div>
                @livewire('location')
            </div>
        </div>
    </aside>
</div>
