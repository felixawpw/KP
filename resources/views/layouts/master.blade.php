<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-table.css')}}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
          <a href="#" class="simple-text logo-mini">
            FT
          </a>
          <a href="@if(!Auth::check()) {{route('login')}} @elseif(Auth::user()->panitia != null || Auth::user()->panitia != '') {{route('home')}} @endif " class="simple-text logo-normal">
            MOB FT 2018
          </a>
      </div>
      <div class="sidebar-wrapper">
        @if(Auth::check() && Auth::user()->panitia()->count() > 0)
        <div class="user">
            <div class="photo">
                <img src="{{asset('/img/faces/avatar.jpg')}}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseProfile" class="username">
                    <span>
                        {!! Auth::user()->Nama !!}
                    </span>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseProfile">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('profile.index') !!}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <ul class="nav">
          @if(Auth::check())
            @if(Auth::user()->panitia()->count() != 0)
              <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{route('home')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>

              <!-- 2 = BPH, 5 = AD, 9 = ITD -->
              @if(Auth::user()->panitia->Id_Divisi == 2 ||
                  Auth::user()->panitia->Id_Divisi == 5 ||
                  Auth::user()->panitia->Id_Divisi == 9)
              <li class="nav-item" id="maharu">
                  <a class="nav-link" data-toggle="collapse" href="#sideBarMaharu" id="dropdownMenuLink">
                    <i class="material-icons">person</i>
                    <p>
                      Mahasiswa Baru
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse" id="sideBarMaharu">
                      <ul class="nav">
                          <li class="nav-item " id="list_maharu">
                              <a class="nav-link" href="{!! route('mahasiswa.index') !!}">
                                  <i class="material-icons">list</i>
                                  <span class="sidebar-normal"> Tampilkan Semua </span>
                              </a>
                          </li>
                          <li class="nav-item " id="presensi">
                              <a class="nav-link" href="{!! route('presensi.index') !!}">
                                  <i class="material-icons">library_books</i>
                                  <span class="sidebar-normal"> Presensi Mahasiswa </span>
                              </a>
                          </li>
                          <li class="nav-item " id="barangbawaan">
                              <a class="nav-link" href="{!! route('barangbawaan.index') !!}">
                                  <i class="material-icons">person</i>
                                  <span class="sidebar-normal"> List Barang Tidak Dibawa </span>
                              </a>
                          </li>
                          <li class="nav-item " id="pelanggar">
                              <a class="nav-link" href="{!! route('pelanggar.index') !!}">
                                  <i class="material-icons">warning</i>
                                  <span class="sidebar-normal"> Pelanggaran </span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

              <li class="nav-item " id="barang">
                <a class="nav-link" href="{{route('barang.index')}}">
                  <i class="material-icons">content_paste</i>
                  <p>Barang Bawaan</p>
                </a>
              </li>

              <li class="nav-item " id="maping">
                <a class="nav-link" href="{{route('maping.index')}}">
                  <i class="material-icons">group</i>
                  <p>Maping</p>
                </a>
              </li>

              <li class="nav-item " id="panitia">
                <a class="nav-link" href="{{route('panitia.index')}}">
                  <i class="material-icons">person_outline</i>
                  <p>Panitia</p>
                </a>
              </li>

              <li class="nav-item " id="pelanggaran">
                <a class="nav-link" href="{{route('pelanggaran.index')}}">
                  <i class="material-icons">warning</i>
                  <p>Pelanggaran</p>
                </a>
              </li>

              <li class="nav-item " id="recup">
                <a class="nav-link" href="{{route('recup.index')}}">
                  <i class="material-icons">calendar_today</i>
                  <p>Rektor Cup</p>
                </a>
              </li>

              <li class="nav-item " id="jadwal">
                <a class="nav-link" href="{{route('jadwal.index')}}">
                  <i class="material-icons">access_time</i>
                  <p>Sesi</p>
                </a>
              </li>

              <li class="nav-item " id="logout">
                <a class="nav-link" href="{{route('logout')}}">
                  <i class="material-icons">exit_to_app</i>
                  <p>Logout</p>
                </a>
              </li>

              <!-- Authorization Maping -->
              @elseif(Auth::user()->panitia->Id_Divisi == 10)
              <li class="nav-item " id="presensi">
                <a class="nav-link" href="{{route('presensi.index')}}">
                  <i class="material-icons">library_books</i>
                  <p>Presensi</p>
                </a>
              </li>
              <li class="nav-item " id="barangbawaan">
                <a class="nav-link" href="{!! route('maping.show_bawaan') !!}">
                  <i class="material-icons">person</i>
                  <span class="sidebar-normal"> List Barang Tidak Dibawa </span>
                </a>
              </li>
              <li class="nav-item " id="logout">
                <a class="nav-link" href="{{route('logout')}}">
                  <i class="material-icons">exit_to_app</i>
                  <p>Logout</p>
                </a>
              </li>
              @endif


            @elseif(Auth::user()->mahasiswa()->count() != 0)
            <li class="nav-item" id="dashboard">
              <a class="nav-link" href="{{route('login')}}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item " id="validasi_rc">
              <a class="nav-link" href="{{route('validasi1')}}">
                <i class="material-icons">
                  done_all
                </i>
                <p>Validasi Rektor Cup (Tahap 1)</p>
              </a>
            </li>
            <li class="nav-item " id="validasi_oho">
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
            <li class="nav-item " id="presensi">
              <a class="nav-link" href="{{route('validasi.presensi')}}">
                <i class="material-icons">event_available</i>
                <p>Presensi</p>
              </a>
            </li>
            <li class="nav-item " id="barang">
              <a class="nav-link" href="{{route('validasi.barang')}}">
                <i class="material-icons">card_travel</i>
                <p>Barang Bawaan Tidak Dibawa</p>
              </a>
            </li>
            <li class="nav-item " id="logout">
              <a class="nav-link" href="{{route('logout')}}">
                <i class="material-icons">exit_to_app</i>
                <p>Logout</p>
              </a>
            </li>
            @endif
          @endif
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-minimize">
                  <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                      <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                      <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                  </button>
              </div>
              <a class="navbar-brand" href="#">
                  @if(Auth::check())
                      Dashboard
                  @else
                      Login
                  @endif
              </a>
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
        @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
    <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{asset('assets/js/plugins/arrive.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-dashboard.min.js?v=2.0.2')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  </script>

  <script src="{{asset('js/bootstrap-table.js')}}"></script>
  <!-- BOOTSTRAP TABLE --> 

  <script type="text/javascript">
    function delete_confirmation(e, link)
    {
      console.log(link);
      e.preventDefault();
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result) {
          delete_ajax(link);
        }
      });
  }

  function delete_ajax(link)
  {
    $.ajax({
      type:'DELETE',
      url: link,
      success:function(data){
        if (data == 1)
        {
            swal(
            'Deleted!',
            'Data berhasil didelete.',
            'success'
          );
          location.reload();
        }
        else
          swal(
            'Oops...',
            'Data tersebut tidak dapat didelete!',
            'error'
          );
      }
    });
  }
  
  </script>
  @if (\Session::has('status'))
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
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            swal(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        });
      });
      
      @if(\Session::has('status'))
      swal({
        @if (\Session::has('status') && explode(';', \Session::get('status'))[0] == "0")
          type: 'error',
        @else
          type: 'success',
        @endif
        title: '{!! explode(";", \Session::get("status"))[1] !!}',
        text: '{!! explode(";", \Session::get("status"))[2] !!}',
      });
      @endif
    });
  </script>

  @yield('scripts')
</body>

</html>