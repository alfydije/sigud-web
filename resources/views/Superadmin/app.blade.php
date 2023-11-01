@extends('layout.header')

@section('menu')
<li class="nav-item {{ request()->is('/admin') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/admin') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
<li class="nav-item {{ request()->is('/admin/permintaan') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/admin/permintaan') }}"><i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="Permintaan">Permintaan</span></a></li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Master Data">Master Data</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('/admin/brand') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/brand') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Jenis">Brand</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('/admin/kategori') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/kategori') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Jenis">Kategori</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('/admin/pengguna') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/pengguna') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Jenis">Pengguna</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="refresh-cw"></i><span class="menu-title text-truncate" data-i18n="Transaksi">Transaksi</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('/admin/barangmasuk') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/barangmasuk') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang Masuk">Barang Masuk</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('/admin/barangkeluar') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/barangkeluar') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Barang Keluar">Barang Keluar</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="d-flex align-items-center" href="#"><i data-feather="folder"></i><span class="menu-title text-truncate" data-i18n="Laporan">Laporan</span></a>
    <ul class="menu-content">
<<<<<<<<< Temporary merge branch 1
        <li class="nav-item {{ request()->routeIs('/admin/laporanbarangmasuk') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/laporanbarangmasuk') }}">
=========
        <li class="nav-item {{ request()->routeIs('/admin/laporan/lap_barang_masuk') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/laporan/lap_barang_masuk') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Barang Masuk">Lap Barang Masuk</span>
            </a>
        </li>
<<<<<<<<< Temporary merge branch 1
        <li class="nav-item {{ request()->routeIs('admin/laporanbarangkeluar') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('admin/laporanbarangkeluar') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Barang Masuk">Lap Barang Keluar</span>
=========
        <li class="nav-item {{ request()->routeIs('/admin/laporan/lap_barang_keluar') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/laporan/lap_barang_keluar') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Barang Keluar">Lap Barang Keluar</span>
>>>>>>>>> Temporary merge branch 2
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('/admin/laporan') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ url('/admin/laporan') }}">
                <i class="far fa-circle"></i> <!-- Ini adalah ikon berbentuk lingkaran -->
                <span class="menu-title text-truncate" data-i18n="Laporan Stok Barang">Lap Stok Barang</span>
            </a>
        </li>
    </ul>
</li>
<li class="navigation-header"><span data-i18n="Lainnya">Lainnya</span><i data-feather="more-horizontal"></i></li>
{{-- <li class="nav-item {{ request()->routeIs('storages.user.edit*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.user.edit', Auth::id()) }}"><i data-feather="edit"></i><span class="menu-title text-truncate" data-i18n="Edit Profile">Edit Profile</span></a></li> --}}
    
<li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}" id="logout-app"><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Logout">Logout</span></a></li>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br><br />
<li class="nav-item">
    <a class="d-flex align-items-center" href="#">
        <img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40">
        <span class="menu-title text-truncate" data-i18n="Superadmin"> Superadmin</span>
    </a>
</li>
@endsection
