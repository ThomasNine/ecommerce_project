<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Commerce Admin</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- toastify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @yield('css')
  </head>
  <body>
    <div class="container-fluid ">
        @include('admin.nav')
        <div class="row">
            @include('admin.sideNav')
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    {{-- toastify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .toastify{
            background-image: unset;
        }
    </style>
    @if (session()->has('success'))
    <script>
        Toastify({
            text: '{{session('success')}}',
            className: "bg-success-subtle text-black",
            position:'center',
        }).showToast();
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        Toastify({
            text: '{{session('error')}}',
            className: "bg-danger-subtle text-black",
            position:'center',
        }).showToast();
    </script>
    @endif

    @yield('script')
  </body>
</html>
