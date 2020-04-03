<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <title>Netflixfy</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Main CSS-->
    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- noty --}}
    <link rel="stylesheet" href="{{asset('dashboard_files/plugins/noty/noty.css')}}">
    <script src="{{asset('dashboard_files/plugins/noty/noty.min.js')}}"></script>

    {{-- select2 --}}
    <link rel="stylesheet" href="{{asset('dashboard_files/css/select2.min.css')}}">
    <script src="{{asset('dashboard_files/js/plugins/select2.min.js')}}"></script>

    @yield('style')

    <style>
        label {
            font-weight: bold
        }
    </style>
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.dashboard._header')

    <!-- Sidebar menu-->
    @include('layouts.dashboard._aside')

    <main class="app-content">
        {{-- <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div> --}}


        @include('dashboard.partials._sessions')

        @yield('content')

    </main>
    <!-- Essential javascripts for application to work-->
    {{-- <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>



    <script>
        $(document).ready(function () {
            $('.select2').select2({
                  minimumResultsForSearch: -1
              });
              jQuery('select2').removeClass('form-control');
            });

            window.axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  };
    </script>

    @yield('script')

</body>

</html>
