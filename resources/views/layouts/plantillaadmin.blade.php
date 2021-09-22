<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TICKET-@yield('title')</title>

  <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      @guest
                        @if (Route::has('password.request'))
                        <a class="btn btn" href="{{ route('password.request') }}">
                            ¿Olvidaste tu Contraseña?
                        </a>
                    @endif

                            @if (Route::has('register'))

                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                              <i class="far fa-bell"></i>
                              <span class="badge badge-warning navbar-badge">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                              <span class="dropdown-header">15 Notifications</span>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <b>  {{ Auth::user()->name }} {{ Auth::user()->last_name }}  </b>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                   <a  class="dropdown-item text-dark" href="">Perfil</a>
                                    <a class="dropdown-item text-dark " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <b>{{ __('Logout') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/panel" class="brand-link">
      <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light"><b>TICKET- </b>CACIHSS </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-header">Admin</li>
               <li class="nav-item">
                 <a href="/admin/departamento" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p class="text">Departamentos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/categories" class="nav-link">
                  <i class="fa fa-list-alt"></i>
                  <p class="text">Categoria</p>
                </a>
              </li>



              <li class="nav-header">Admin-usuarios</li>
              <li class="nav-item">
                <a href="/admin/usuarios" class="nav-link">
                    <i class="fas fa-user-cog"></i>
                    <p>Usuarios</p>
                </a>
                </li>

              <li class="nav-item">
                <a href="/admin/register" class="nav-link">
                    <i class="fas fa-user-cog"></i>
                    <p>Solicitud de Registro</p>
                </a>
                </li>




               <li class="nav-header">Admin-Tickets</li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/admin/tickets" class="nav-link">
                  <i class="fas fa-ticket-alt"></i>
                  <p>Recibidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/ticket/solved" class="nav-link">
                  <i class="fas fa-clipboard-check"></i>
                  <p>Resueltos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/bitacora" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Bitacora</p>
            </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->


      <!-- Default box -->
     @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2.0.2 by.CGomez
    </div>
    <strong>Copyright &copy; 2021 <a href="https://cacihss.hn/">Informatica-CACIHSS</a>.</strong> Todos los Derechos Reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.js"></script>
<!-- AdminLTE App -->

<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
</body>
</html>
