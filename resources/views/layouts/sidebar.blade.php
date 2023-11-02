<aside class="main-sidebar sidebar-dark-light elevation-4">
    {{-- Brand Logo  --}}
    <a href="/dashboard" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Sportstation</span>
    </a>

    {{-- Sidebar  --}}
    <div class="sidebar">

        {{-- SidebarSearch Form  --}}
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Sidebar Menu  --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library  --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- @if (Gate::check('isAdmin') || Gate::check('isUmum') || Gate::check('isKeuangan')) --}}
                <li class="nav-header">MAIN</li>
                <li class="nav-item">
                    <a href="{{ route('items.index') }}"
                        class="nav-link {{ request()->is('dashboard/items*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}"
                        class="nav-link {{ request()->is('dashboard/orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rentals.index') }}"
                        class="nav-link {{ request()->is('dashboard/rentals*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Rental</p>
                    </a>
                </li>
                {{-- @endif --}}

                @can('isAdmin')
                    <li class="nav-header">ADMINISTRATOR</li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->is('dashboard/users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>User Management</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>
