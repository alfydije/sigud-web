@extends('layout.header')

@section('menu')
<li class="nav-item {{ request()->is('storages/dashboard') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('storages/dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Master Barang">Master Barang</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('/admin/jenisbarang') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/jenisbarang') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Jenis">Jenis</span>
            </a>
        </li>
        {{-- <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Satuan">Satuan</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Merk">Merk</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang">Barang</span>
            </a>
        </li> --}}
    </ul>
</li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Customer">Customer</span></a>
</li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="refresh-cw"></i><span class="menu-title text-truncate" data-i18n="Transaksi">Transaksi</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang Masuk">Barang Masuk</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang Keluar">Barang Keluar</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="folder"></i><span class="menu-title text-truncate" data-i18n="Laporan">Laporan</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Barang Masuk">Lap Barang Masuk</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Barang Masuk">Lap Barang Masuk</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Stok Barang">Lap Stok Barang</span>
            </a>
        </li>
    </ul>
</li>
<li class="navigation-header"><span data-i18n="Lainnya">Lainnya</span><i data-feather="more-horizontal"></i></li>
{{-- <li class="nav-item {{ request()->routeIs('storages.user.edit*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.user.edit', Auth::id()) }}"><i data-feather="edit"></i><span class="menu-title text-truncate" data-i18n="Edit Profile">Edit Profile</span></a></li> --}}
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span class="menu-title text-truncate" data-i18n="Settings">Settings</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Menu">Menu</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="User">User</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('storages.report-stock.fs*') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang Masuk">Barang Masuk</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item"><a class="d-flex align-items-center" href="#" id="logout-app"><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Logout">Logout</span></a></li>
@endsection
