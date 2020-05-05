<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Netflixify</title>

    <!--font awesome-->
    {{--    <link rel="stylesheet" href="{{ asset('front_files/css/font-awesome5.11.2.min.css') }}">  --}}   {{-- not working --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('front_files/css/bootstrap.min.css')}}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('front_files/css/vendor.min.css')}}">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

    {{--Easy auto complete--}}
    <link rel="stylesheet" href="{{asset('front_files/plugins/easyautocomplete/easy-autocomplete.min.css')}}">

    <!--main styles -->
    <link rel="stylesheet" href="{{asset('front_files/css/main.min.css')}}">

    <style>
        .fw-900{
            font-weight: 900;
        }
        .easy-autocomplete{
            width: 90%;
        }
        .easy-autocomplete input {
            color: #FFF !important;
        }
        .eac-icon-left .eac-item img {
            max-height: 70px !important;

        }
    </style>

    @stack('style')
</head>
<body>

@yield('content')



{{--axios--}}
<script src="{{asset('front_files/js/axios.min.js')}}"></script>

{{--jQuery--}}
<script src="{{asset('front_files/js/jquery-3.4.0.min.js')}}"></script>

{{--bootstrap js--}}
<script src="{{asset('front_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_files/js/popper.min.js')}}"></script>

{{--vendor js--}}
<script src="{{asset('front_files/js/vendor.min.js')}}"></script>

{{--main script--}}
<script src="{{asset('front_files/js/main.min.js')}}"></script>

{{--playerjs--}}
<script src="{{asset('front_files/js/playerjs2.js')}}"></script>

{{--Easy auto complete--}}
<script src="{{asset('front_files/plugins/easyautocomplete/jquery.easy-autocomplete.min.js')}}"></script>

<script>

    let options = {
        url: function(search) {
		    return "/movies?search=" + search  ;
        },
        getValue: "name",
        template:{
            type:'iconLeft',
            fields:{
                iconSrc:"poster_path"
            }
        },
        list: {
		onChooseEvent: function() {
            
            let movie = $('.form-control[type="search"]').getSelectedItemData();
            let url = window.location.origin + '/movies/ ' + movie.id;
            window.location.replace(url);

		        }	
	        }
        }

    $('.form-control[type="search"]').easyAutocomplete(options);
</script>

<script>

   window.axios.defaults.headers.common = {
       'X-Requested-With': 'XMLHttpRequest',
       'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
   };
</script>



{{-- custom movie--}}
<script src="{{asset('front_files/js/custom/movie.js')}}"></script>

<script>

    $(document).ready(function () {

        $("#banner .movies").owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: false,
        });

        $(".listing .movies").owlCarousel({
            loop: true,
            nav: false,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },
            dots: false,
            margin: 15,
            loop: true,
        });

    });


</script>
@stack('script')
</body>
</html>
