<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    {{-- Css Custom --}}
    <link rel="stylesheet" href="{{asset('assets/css/style3.css')}}">
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center flex-column" style="height: 100vh">
        <div class="card pt-4 px-2 login-card" style="width: 25rem">
            <div class="card-title text-center">
                <h1><a href="/" class="text-dark link-hover">Sign In</a></h1>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{session('error')}}
                </div>
                @endif
                <form action="{{route('member.login_proses')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="m-0">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                        <div class="invalid-feedback" role="alert">
                            <strong>*{{$message}}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>*{{$message}}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
            </div>
            </form>
        </div>

        <div class="mt-4">
            <p>Not a User? <a href="{{route('member.register')}}" class="text-dark link-hover"><strong>Sign
                        Up</strong></a>
            </p>
        </div>
    </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
