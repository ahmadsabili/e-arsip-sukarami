<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{-- <img class="img-profile rounded-circle" src="{{ url('assets/img/boy.png') }}" style="max-width: 60px"> --}}
          <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('profil.index') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="{{ route('change-password') }}">
            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </button>
        </form>
        </div>
      </li>
    </ul>
  </nav>