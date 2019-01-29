<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KP JSMU</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin.css')}}" rel="stylesheet">

    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>

    @yield('head')

  </head>

  <body id="page-top">

  @if (\Session::has('err'))
    <div class="alert alert-danger alert-dismissible" id="permalert">
        {{ \Session::get('err') }}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    <script type="text/javascript">
      $("#permalert").delay(3200).fadeOut(300);
    </script>    
  @endif
  <!-- @if(Auth::user()->level == 'admin')
    <div class="alert alert-danger">
        <ul>
            <li>hi admin</li>
        </ul>
    </div>
  @endif -->

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      @yield('title')

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search 
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>-->

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!--<ul class="navbar-nav ml-auto ml-md-0 ">-->
        <!--<li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>-->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/changepassword">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->level == 'admin' || Auth::user()->masterperm == '1')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Data Master</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Available Data:</h6>
              <a class="dropdown-item" href="/masterbarangs">Data Barang</a>
              <a class="dropdown-item" href="/mastersuppliers">Data Supplier</a>
              <a class="dropdown-item" href="/mastercustomers">Data Customer</a>
            </div>
          </li>
        @endif
        @if(Auth::user()->level == 'admin' || Auth::user()->stockperm == '1')
          <li class="nav-item">
            <a class="nav-link" href="/stockbarangs">
              <i class="fas fa-fw fa-table"></i>
              <span>Stock Barang</span></a>
          </li>
        @endif
        @if(Auth::user()->level == 'admin' || Auth::user()->pembelianperm == '1')
          <li class="nav-item">
            <a class="nav-link" href="/pembelians">
              <i class="fas fa-fw fa-table"></i>
              <span>Pembelian</span></a>
          </li>
        @endif
        @if(Auth::user()->level == 'admin' || Auth::user()->penjualanperm == '1')
          <li class="nav-item">
            <a class="nav-link" href="/penjualans">
              <i class="fas fa-fw fa-table"></i>
              <span>Penjualan</span></a>
          </li>
        @endif
        @if(Auth::user()->level == 'admin' || Auth::user()->reportbeliperm == '1')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Report Pembelian</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Report Berdasarkan:</h6>
              <a class="dropdown-item" href="/pembelianNo">Nomor Transaksi</a>
              <a class="dropdown-item" href="/pembelianPer">Periode Transaksi</a>
              <a class="dropdown-item" href="/pembelianBar">Barang</a>
              <a class="dropdown-item" href="/pembelianSup">Supplier</a>
            </div>
          </li>
        @endif
        @if(Auth::user()->level == 'admin' || Auth::user()->reportjualperm == '1')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Report Penjualan</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Report Berdasarkan:</h6>
              <a class="dropdown-item" href="/penjualanNo">Nomor Transaksi</a>
              <a class="dropdown-item" href="/penjualanPer">Periode Transaksi</a>
              <a class="dropdown-item" href="/penjualanBar">Barang</a>
              <a class="dropdown-item" href="/penjualanCus">Customer</a>
            </div>
          </li>
        @endif
        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/users">
              <i class="fas fa-fw fa-table"></i>
              <span>User</span></a>
          </li>
        @endif
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{asset('/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin.min.js')}}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>

  </body>

</html>
