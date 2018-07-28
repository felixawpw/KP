<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>  
    <div class="modal fade" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" 
            @if (\Session::has('message') && explode(';', \Session::get('message'))[0] == "0")
              style="background-color: #ff0033;"
            @else
              style="background-color: green;"

            @endif>
            <h3 class="modal-title" id="exampleModalLabel">PERHATIAN</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>a
          </div>
          <div class="modal-body" id="warning_desc">
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

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('scripts')
@if (\Session::has('message'))
<script type="text/javascript">
    $(document).ready(function(){
        $('#modalWarning').modal({
            show: true
        });
    });
</script>
@endif


@if ($errors->any())
    <script type="text/javascript">
    $(document).ready(function(){
        alert("Pastikan anda mengisi semua data dengan benar");
    });
    </script>
@endif
