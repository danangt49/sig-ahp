<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Geografis Sorong</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('public/admin/asset/dist/css/adminlte.min.css') }}">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"></span>
            @if (Auth::user()->role == 'admin')
                <a href="{{ url('admin/profil') }}" class="dropdown-item">
                
            @else
                <a href="{{ url('user/profil') }}" class="dropdown-item">
            @endif
              <i class="fas fa-user mr-2"></i>
              {{Auth::user()->name}}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i>
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::user()->role == 'admin')
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/home') }}" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url( 'admin/user') }}" class="nav-link {{ (request()->is('admin/user')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/peta') }}" class="nav-link {{ (request()->is('admin/peta')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>Peta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/perguruan-tinggi') }}" class="nav-link {{ (request()->is('admin/perguruan-tinggi')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-laptop"></i>
                    <p>Data Peguruan Tinggi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/kontak') }}" class="nav-link {{ (request()->is('admin/kontak')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Kontak</p>
                    </a>
                </li>
            </ul>
      </nav>

      @else
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('user/home') }}" class="nav-link {{ (request()->is('user/home')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url( 'user/user') }}" class="nav-link {{ (request()->is('user/user')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/peta') }}" class="nav-link {{ (request()->is('user/peta')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Peta</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/perguruan-tinggi') }}" class="nav-link {{ (request()->is('user/perguruan-tinggi')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-laptop"></i>
                <p>Data Peguruan Tinggi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/kontak') }}" class="nav-link {{ (request()->is('user/kontak')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-edit"></i>
                <p>Kontak</p>
                </a>
            </li>
        </ul>
    </nav>
    @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>

<script src="{{ asset('public/admin/asset/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/admin/asset/dist/js/pages/dashboard3.js') }}"></script>
@yield('js')

</body>
</html>
