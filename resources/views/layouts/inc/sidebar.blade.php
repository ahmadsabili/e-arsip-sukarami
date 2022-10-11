<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon">
        <img src="{{ url('assets/img/logo/logo-palembang.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">E-Arsip</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Arsip
    </div>
    <li class="nav-item {{ (request()->is('triwulan*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('triwulan') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Triwulan</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('umkm*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('umkm') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>UMKM</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('bansos*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('bansos') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Bansos</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('masjid*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('masjid') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Masjid & Mushola</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('monography*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('monography') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Monography</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('kelurahan-cantik*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('kelurahan-cantik') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Kelurahan Cantik</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('pkk*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('pkk') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>PKK</span>
      </a>
    </li>
    <li class="nav-item {{ (request()->is('pbb*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('pbb') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>PBB</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    @if (Auth::user()->role == 'admin')
    <div class="sidebar-heading">
      Pengaturan
    </div>
    {{-- <li class="nav-item {{ (request()->is('kategori*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('kategori.index') }}">
        <i class="fas fa-fw fa-th-large"></i>
        <span>Kategori</span>
      </a>
    </li> --}}
    <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>User</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    @endif
    <div class="version" id="version-ruangadmin"></div>
</ul>