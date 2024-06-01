<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #151515;
            overflow-x: hidden;
        }

        .wrapper {
            width: 400px;
            display: flex;
            gap: 55px;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            text-align: start;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 400px;
        }

        .post {
            margin-top: 32px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        footer {
            width: 100%;
            padding: 20px 0;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">
            {{-- sidebar --}}
            @include('layouts.sidebar')
            <div class="d-flex text-center flex-column">
                <div class="container mt-5">
                    <div class="d-flex align-items-center" style="gap: 18px;">
                        <img style="border-radius: 100px; width: 155px; height: 155px; object-fit: cover"
                            src="{{ Storage::url($user->gambar) }}" alt="">
                        <div class="profile-container text-white">
                            <div class="header">
                                @if (Auth::user())
                                    <h3>{{ Auth::user()->username }}</h3>
                                @else
                                    <p>gagal memuat</p>
                                @endif
                                <button type="button" class="btn text-white" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Konfirmasi
                                                    Password</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="" id="confirmPasswordForm">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            aria-label="Sizing example input"
                                                            aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="gap: 40px">
                                <p>0 posts</p>
                                <p class="me-3"><a href="{{ route('see_followers', Auth::user()->id) }}"
                                        class="text-decoration-none text-white">{{ Auth::user()->followers->count() }}
                                        Followers</a></p>
                                <p class="me-3"><a href="{{ route('see_followings', Auth::user()->id) }}"
                                        class="text-decoration-none text-white">{{ Auth::user()->following->count() }}
                                        Following</a></p>
                            </div>
                            <div class="d-flex flex-column" style="gap: 4px">
                                <h5>{{ $user->nama }}</h5>
                                <span>{{ $user->bio }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- konten postingan --}}
                <div class="post">
                    @foreach ($product as $data)
                        @if ($data->user_id == auth()->id())
                            <!-- Memeriksa apakah pengguna saat ini adalah pemilik produk -->
                            <div class="card" style="width: 350px;">
                                @if ($data->gambar)
                                    <img style="object-fit: cover" src="{{ Storage::url($data->gambar) }}"
                                        width="350px" height="180px" alt="">
                                @else
                                    <span>tidak ada gambar</span>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <footer style="margin-top: 1000px; width: 100%; text-align: center;">
                    {{-- footer --}}
                    <div class="container">
                        <div class="d-flex flex-column align-items-center text-center text-white">
                            <div class="d-flex align-items-center justify-content-center text-center"
                                style="gap: 50px; opacity: 0.5;">
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                                <p class="opacity-50%">lorem</p>
                            </div>
                            <h5 style="opacity: 0.5;">Copyright 2024</h5>
                        </div>
                    </div>
                </footer>

            </div>


        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirmPasswordForm').on('submit', function(event) {

                event.preventDefault();
                var password = $('#password').val();

                const password_auth = document.querySelector('#password-auth');

                if (password === password) {
                    window.location.href = '/edit-profil'; // Redirect ke halaman edit profil
                } else {
                    alert('Password incorrect');
                }
            });
        });
    </script>
</body>

</html>
