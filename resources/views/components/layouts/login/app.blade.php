<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="{{asset('login/css-1?family=Roboto:300,400&display=swap')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('login/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('login/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">

    <!-- Notification css (Toastr) -->
    <link href="{{asset('backend/assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">
    <title>DMS</title>
        <style>
            @font-face {
                    font-family: 'Phetsarath OT';
                    font-weight: normal;
                    font-style: normal;
                    font-variant: normal;
                    src: url("fonts/PhetsarathOT.ttf") format('truetype');
            }
            * {
                font-family: 'Phetsarath OT';
            }
        </style>
    @livewireStyles
</head>

<body>
    <div class="content">
        <div class="container">
            {{$slot}}
        </div>
    </div>

    @livewireScripts
    <script src="{{asset('login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('login/js/popper.min.js')}}"></script>
    <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login/js/main.js')}}"></script>
    <!-- Toastr js -->
    <script src="{{asset('backend/assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/toastr.init.js')}}"></script>
    
    <script>
        window.Livewire.on('alert', param => {
            toastr.options.positionClass = 'toast-bottom-right';
            toastr[param['type']](param['message'],param['type']);
        });

        @if(Session::has('success'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success("{{Session::get('success') }}")
        @elseif(Session::has('warning'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.warning("{{Session::get('warning')}}")
        @elseif(Session::has('error'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error("{{Session::get('error')}}")
        @endif

    </script>

    @stack('scripts')
</body>

</html>