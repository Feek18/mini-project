<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            <div class="d-flex justify-content-center align-items-center">
                <div style="width: 550px">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <h1 class="text-white fw-bold">Signup Form</h1>
                    <p class="text-white">Please create your account!!</p>
                    <div>
                        <form action="{{ route('register_user') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="d-flex gap-3">
                                    <div style="flex: 1;">
                                        <label class="text-white mb-1" for="username">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Masukan Username Kamu" required>
                                        @error('username')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div style="flex: 1;">
                                        <label class="text-white mb-1" for="nama">Name</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukan Nama Kamu" required>
                                        @error('nama')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-white mb-1" for="email">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukan Email Kamu" required>
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text d-flex justify-content-between">
                                    <label for="password" class="text-white">Password</label>
                                    <i class="fa-solid fa-eye-slash text-white" id="toggle-password"
                                        style="cursor: pointer;"></i>
                                </div>
                                <input type="password" class="form-control " id="password" name="password"
                                    placeholder="Masukan Password Kamu">
                                @error('password')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <div class="form-text d-flex justify-content-between">
                                    <label for="password_confirmation" class="text-white">Konfirmasi Password</label>
                                    <i class="fa fa-eye-slash text-white" id="toggle-confirm-password"
                                        style="cursor: pointer;"></i>
                                </div>
                                <input type="password" class="form-control " id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password">
                                @error('password_confirmation')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="text-white mb-3">Have an account?
                                <a href="{{ route('login') }}">
                                    <strong>Login here</strong>
                                </a>
                            </p>
                            <button class="btn login btn-primary" type="submit">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function(e) {
            const password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
            } else {
                password.type = 'password';
                e.target.classList.remove('fa-eye');
                e.target.classList.add('fa-eye-slash');
            }
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', function(e) {
            const confirmPassword = document.getElementById('password_confirmation');
            if (confirmPassword.type === 'password') {
                confirmPassword.type = 'text';
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
            } else {
                confirmPassword.type = 'password';
                e.target.classList.remove('fa-eye');
                e.target.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>

</html>
