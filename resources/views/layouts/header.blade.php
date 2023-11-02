<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Menu Toggler --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                <li class="user-header bg-secondary">
                    <p>{{ auth()->user()->name }}</p>
                    @if (auth()->user()->roles === 'Admin')
                        <small class="badge bg-danger rounded-pill px-2">{{ auth()->user()->roles }}</small>
                    @elseif (auth()->user()->roles === 'Kasir')
                        <small class="badge bg-warning rounded-pill px-2">{{ auth()->user()->roles }}</small>
                    @endif
                </li>

                <li class="user-footer">
                    <a href="#" class="btn btn-outline-secondary btn-flat">Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-secondary btn-flat float-right">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
