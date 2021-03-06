<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    @yield('title')

  <!-- Custom fonts for this template-->
  <link href="{{asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-icon">
          <img class="mx-auto d-block" style="width:50%;" src="{{ asset('images/libeli.png') }}">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      @guest
      @else
        @if(\Auth::user()->hasAnyRole('admin'))
        <li class="nav-item">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        @endif
      @endguest
      <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('updates') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>News</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('events') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Events</span></a>
      </li>
      

      @guest
      @else
        @if(\Auth::user()->hasAnyRole('penjual'))
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Products :</h6>
              <a class="collapse-item" href="{{ url('products') }}">Produk Saya</a>
              <a class="collapse-item" href="{{ url('history') }}">Riwayat Pemesanan</a>
            </div>
          </div>
        </li>
        @endif
      @endguest      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- close Button -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
          @guest
          @else
            <!-- Keranjang Belanja -->
            <li class="nav-item">
              <?php
                $orders = \App\Order::where('user_id', Auth::user()->id)->where('status',0)->first();
                if($orders != null)
                {
                  $notif = \App\Order_Detail::where('order_id', $orders->id)->count();
                }
              ?>
              <a class="nav-link" href="{{ url('orders') }}">
                <i class="fa fa-shopping-cart"></i>
                @if($orders != null)
                  <span class="badge badge-danger badge-counter">{{ $notif }}</span>
                @endif
              </a>
            </li>

            <!-- Fitur Chat -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('chats') }}">
                <i class="fas fa-comments"></i>
              </a>
            </li>
          @endguest
           

            <div class="topbar-divider d-none d-sm-block"></div>

            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
            @else
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Auth::user()->name}}</span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  
                  <a class="dropdown-item" href="{{ url('profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>

                  <!-- @if(\Auth::user()->hasAnyRole('penjual'))
                  @elseif(\Auth::user()->hasAnyRole('admin'))
                  @else
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="">
                    <i class="far fa-address-card"></i> Daftar Menjadi Seller
                  </a>
                  @endif -->
                  
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{ url('history') }}">
                    <i class="fa fa-shopping-cart text-gray-400"></i> Riwayat Pemesanan
                  </a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>

                </div>
              </li>
            @endguest

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('asset/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('asset/js/sb-admin-2.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @include('sweet::alert')

</body>

</html>
