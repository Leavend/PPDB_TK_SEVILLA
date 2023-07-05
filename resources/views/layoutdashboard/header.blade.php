  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Logout -->
      <li class="nav-item">
        <a href="{{ url('keluar') }}" class="btn btn-light @if(Request::segment(2) == 'dashboard') @endif">
          <i class="nav-icon fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
      <!-- End Logout -->
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="../../../dist/img/TKSevillaLogo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Halo {{ Auth::user()->name }} 👏</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          @if(Auth::user()->user_type == 1)
        
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <!-- End Dashboard -->

          <!-- List Admin -->
          <li class="nav-item">
            <a href="{{ url('admin/admin/list-admin') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <!-- End List Admin -->

          <!-- List Student -->
          <li class="nav-item">
            <a href="{{ url('admin/siswa/list-siswa') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Siswa
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <!-- End List Siswa -->

          <!-- Info Assignment -->
          <li class="nav-item">
            <a href="{{ url('admin/pendaftaran/') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Info Pendaftaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <!-- End Info Assignment -->

          <!-- Student -->
          @elseif(Auth::user()->user_type == 2)

          <!-- Profile -->
          <li class="nav-item">
            <a href="{{ url('siswa/profile') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <!-- End Profile -->

          <!-- Form Pendaftaran -->
          <li class="nav-item">
            <a href="{{ url('siswa/formulir') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @endif">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Formulir
              </p>
            </a>
          </li>
          <!-- End Form Pendaftaran -->
          
          @endif
          <!-- End Student -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>