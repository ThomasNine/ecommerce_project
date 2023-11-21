<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        {{-- toastify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-6 offset-1 ">
                <img src="/assets/images/loginShopping.jpg" class=" w-100" alt="">
            </div>
            <div class="col-3 shadow-lg px-5 py-4 border border-1 ">
                <form action="{{url('admin/login')}}" method="POST" class="mx-4">
                    @csrf
                    <div class=" py-3 ">
                        <h1 class=" fw-bold">Log in</h1>
                        <p class=" text-secondary ">Please fill your information below.</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class=" form-label ">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mb-2 ">
                        <label for="password" class=" form-label ">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class=" d-flex justify-content-between mb-4 ">
                        <div class="form-group d-flex">
                            <input type="checkbox" name="" id="checkbox" class="form-check me-2">
                            <label for="checkbox" class="small text-secondary ">Remember me</label>
                        </div>
                        <a href="#" class=" link-secondary small text-secondary ">Forget Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold mb-4 py-2">LOGIN</button>
                    @if ($errors->any())
                        <div class=" mb-3 ">
                            @foreach ($errors->all() as $e)
                            <div class="small text-danger ">{{$e}}</div>
                            @endforeach
                        </div>
                    @endif
                </form>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .toastify{
            background-image: unset;
        }
    </style>
    @if (session()->has('error'))
    <script>
        Toastify({
            text: '{{session('error')}}',
            className: "bg-danger-subtle text-black",
            position:'center',
        }).showToast();
    </script>
        @endif
</body>
</html>
