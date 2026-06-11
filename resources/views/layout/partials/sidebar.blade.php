<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">


    <!-- Heading - Profile -->
    <div class="sidebar-heading">
        Profile
    </div>

    <li class="nav-item {{ $title === 'My Profile' ? 'active' : '' }}">
        <a class="nav-link" href="/my-profile">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>

    <hr class="sidebar-divider">


    @if ($profile->role === 'admin')
        <!-- Heading - Master -->
        <div class="sidebar-heading">
            Master
        </div>

        <li class="nav-item {{ $title === 'Penerbit' ? 'active' : '' }}">
            <a class="nav-link" href="/penerbit">
                <i class="fas fa-fw fas fa-book"></i>
                <span>Penerbit</span>
            </a>
        </li>

        <li class="nav-item {{ $title === 'Buku' ? 'active' : '' }}">
            <a class="nav-link" href="/buku">
                <i class="fas fa-fw fas fa-book"></i>
                <span>Buku</span>
            </a>
        </li>

        <li class="nav-item {{ $title === 'Pengguna' ? 'active' : '' }}">
            <a class="nav-link" href="/pengguna">
                <i class="fas fa-fw fas fa-users"></i>
                <span>Pengguna</span>
            </a>
        </li>

        <hr class="sidebar-divider">
    @endif

    <!-- Heading - Transaksi -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item {{ $title === 'Pengajuan' ? 'active' : '' }}">
        <a class="nav-link" href="/pengajuan">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pengajuan</span>
        </a>
    </li>

    <li class="nav-item {{ $title === 'Peminjaman' ? 'active' : '' }}">
        <a class="nav-link" href="/peminjaman">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Peminjaman</span>
        </a>
    </li>

    <li class="nav-item {{ $title === 'Pengembalian' ? 'active' : '' }}">
        <a class="nav-link" href="/pengembalian">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Pengembalian</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
