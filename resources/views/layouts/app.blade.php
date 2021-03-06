<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-table.css')}}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MOB FT 2018
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{route('login')}}" class="simple-text logo-normal">
          MOB FT 2018
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  " id="dashboard">
            <a class="nav-link" href="{{route('login')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Auth::check() && Auth::user()->mahasiswa()->count() != 0)
          <li class="nav-item " id="pelanggaran">
            <a class="nav-link" href="{{route('validasi1')}}">
              <i class="material-icons">
                done_all
              </i>
              <p>Validasi Rektor Cup (Tahap 1)</p>
            </a>
          </li>
          <li class="nav-item " id="pelanggaran">
            <a class="nav-link" href="{{route('validasi2')}}">
              <i class="material-icons">
                done_all
              </i>
              <p>Validasi OHO (Tahap 2)</p>
            </a>
          </li>
          <li class="nav-item " id="pelanggaran">
            <a class="nav-link" href="{{route('validasi.pelanggaran')}}">
              <i class="material-icons">warning</i>
              <p>Pelanggaran</p>
            </a>
          </li>
          <li class="nav-item " id="pelanggaran">
            <a class="nav-link" href="{{route('validasi.presensi')}}">
              <i class="material-icons">event_available</i>
              <p>Presensi</p>
            </a>
          </li>
          <li class="nav-item " id="pelanggaran">
            <a class="nav-link" href="{{route('validasi.barang')}}">
              <i class="material-icons">card_travel</i>
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item " id="logout">
            <a class="nav-link" href="{{route('logout')}}">
              <i class="material-icons">settings_power</i>
              <p>Logout</p>
            </a>
          </li>
          @endif
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
      <!-- Modal -->
      <div class="modal fade" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div id="modHeader" class="modal-header" 
              @if (\Session::has('message') && explode(';', \Session::get('message'))[0] == "0")
                style="background-color: #ff0033;"
              @else
                style="background-color: green;"

              @endif>
              <h3 class="modal-title" id="exampleModalLabel">INFO</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modBody">
              @if (\Session::has('message'))
                 <p class="text-justify">{!! explode(';', \Session::get('message'))[1] !!}</p>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

        @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Chartist JS -->
  <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <script src="{{asset('js/bootstrap-table.js')}}"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-dashboard.min.js?v=2.1.0')}}" type="text/javascript"></script>
  <!-- BOOTSTRAP TABLE --> 

  @if (\Session::has('message'))
  <script type="text/javascript">
      $(document).ready(function(){
        $('#modalWarning').modal('show');
      });
  </script>
  @endif

  <script type="text/javascript">
    Date.prototype.toDateInputValue = (function() {
      var local = new Date(this);
      local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
      return local.toJSON().slice(0,10);
  });

    $(document).ready(function(){
      $('.button_delete').click(function(){
        confirm('Apakah anda yakin?');
      });
    });
  </script>

  @yield('scripts')
</body>

</html>