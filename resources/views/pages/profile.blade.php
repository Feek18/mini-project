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
            width: 500px;
            display: flex;
            gap: 100px;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
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
                        <img style="border-radius: 100px"
                            src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?q=80&w=1985&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            width="150px" height="150px" alt="">
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
                                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Konfirmasi Password</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="gap: 40px">
                                <p>0 Followers</p>
                                <p>0 Posts</p>
                                <a class="text-decoration-none text-white" href="{{ route('following') }}">0
                                    following</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="gap: 30px">
                                <h5>Rudiansyah Pratama Wijaya</h5>
                                <i class="fa-brands fa-linkedin"></i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- konten postingan --}}
                <div class="post">
                    @foreach ($product as $data)
                    <div class="card" style="width: 330px;">
                        @if ($data->gambar)
                        <img src="{{ Storage::url($data->gambar) }}" alt="">    
                        @else
                        <span>tidak ada gambar</span>
                        @endif
                    </div>
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
</body>

</html>
