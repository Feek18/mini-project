<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Page</title>

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
            display: flex;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">
            {{-- sidebar --}}
            @include('layouts.sidebar')
            <div class="container mt-5">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="text-white">Notifikasi</h2>
                    <div>
                        <a class="text-decoration-none text-white me-3" href="{{ route('notify') }}">Semua</a>
                        <a class="text-decoration-none text-white me-3" href="">Komentar</a>
                        <a class="text-decoration-none text-white" href="">Disukai</a>
                    </div>
                    <div class="w-100 mt-4 text-white" style="max-width: 500px;">
                        <h4>Semua Notifikasi</h4>
                        <div class="d-flex align-items-center gap-4 mt-3">
                            @forelse ($like as $f)
                                <li class="d-flex align-items-center mb-3">
                                    {{-- <img src="https://via.placeholder.com/50" alt="user" class="rounded-circle me-2"> --}}
                                    @if ($f->post->user->foto)
                                        <img src="{{ $f->post->user->foto }}" alt="user" class="rounded-circle me-2"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        <img src="https://via.placeholder.com/50" alt="Profile Image"
                                            class="rounded-circle me-2" style="object-fit: cover; cursor: pointer;">
                                    @endif
                                    <div class="gap-5">
                                        <strong>{{ $f->post->user->username }}</strong>
                                        <small>menyukai postingan anda</small>
                                    </div>
                                </li>
                            @empty
                                <p>Anda Tidak Memiliki Notifikasi</p>
                            @endforelse
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
