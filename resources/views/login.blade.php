<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #151515;
        }

        section {
            margin-top: 106px;
            overflow-x: hidden;
        }

        .login {
            padding: 7px 38px;
        }
    </style>

</head>

<body>

    {{-- login page --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center align-items-center">
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div style="width: 50%">
                                <h1 class="text-white fw-bold">Login Form</h1>
                                <p class="text-white">Please fill to get your account!!</p>
                                <div class="mt-4">
                                    <form action="{{ route('login_user') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="text-white mb-1" for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Masukan Email Kamu" required>
                                            @error('username')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-white mb-1" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Masukan Password Kamu" required>
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <p class="text-white mb-3">Don't have an account?
                                            <a href="{{ route('regis') }}">
                                                <strong>Sign Up here</strong>
                                            </a>
                                        </p>
                                        <button class="btn login btn-primary" type="submit">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
