        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aplikasi Pengajuan</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            @php
                $cek = \App\Models\User::where('id', Auth::User()->id)->where('role', 'admin')->first(); 
            @endphp

            @php
                $user = \App\Models\User::where('id', Auth::User()->id)->where('role', null)->first(); 
            @endphp


        @if($cek)
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/barang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Barang</span></a>
            </li>
        @endif

        @if($user)
            <li class="nav-item">
                <a class="nav-link" href="/keranjang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pengajuan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/approval">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Approval</span></a>
            </li>
        @endif

        @if($cek)
            <li class="nav-item">
                <a class="nav-link" href="/approval/admin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Admin Aprroval</span></a>
            </li>
        @endif

            <!-- Divider -->
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>