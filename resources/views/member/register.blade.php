<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    {{-- My Stle --}}
    <link rel="stylesheet" href="{{asset('assets/css/style3.css')}}">
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center flex-column" style="height: 100vh">
        <div class="card pt-4 px-2 login-card" style=" width: 28rem">
            <div class="card-title text-center">
                <h1><a href="/" class="text-dark link-hover">Sign Up</a></h1>
            </div>
            <div class="card-body">
                <form action="{{route('member.register_proses')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="m-0">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="px-2">*{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="m-0">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="px-2">*{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label class="m-0">Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                            name="address" placeholder="Address">{{old('address')}}</textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong class="px-2">*{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="m-0">Phone Number</label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                    name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong class="px-2">*{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
            <div class="form-group">
                <label class="m-0">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="px-2">*{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="m-0">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <p>Have a User? <a href="{{route('member.login')}}" class="text-dark link-hover">
                <strong>Log In</strong></a>
        </p>
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
