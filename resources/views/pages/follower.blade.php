<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>

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
            /* width: 500px; */
            display: flex;
            gap: 28px;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
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
            <div class="container">
                <div class="mt-5">
                    {{-- back --}}
                    <div class="d-flex align-items-center">
                        <a class="text-decoration-none text-white" href="{{ route('index') }}"><i
                                class="fa-solid fa-chevron-left me-3"></i>back</a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-white mt-3" style="width: 1100px">
                        <h2>reezyx</h2>
                        <div class="d-flex align-items-center gap-4 mt-2">
                            <a class="nav-link" href="{{ route('see_followers', Auth::user()->id) }}">Followers</a>
                            <a class="nav-link" href="{{ route('see_followings', Auth::user()->id) }}">Followings</a>
                        </div>
                    </div>
                </div>
                {{-- content.body --}}
                <div class="container">
                    <div class="d-flex justify-content-around align-items-start">
                        <div class="d-flex flex-column mt-5">
                            <h4 class="text-white">Cari Following</h4>
                            <div class="d-flex align-items-center mt-2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="Cari"
                                        style="width: 500px;">
                                    <span class="input-group-text" id="inputGroup-sizing-default">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="text-white">List All Followings</h4>
                            @forelse ($following as $r)
                                <li class="d-flex align-items-center mb-3 gap-3">
                                    <img src="{{ Storage::url($r->gambar) }}" alt="user" class="rounded-circle me-2"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <strong class="text-white">{{ $r->username }}</strong><br>
                                        <small class="text-white me-5">{{ $r->nama }}</small>
                                    </div>
                                    <button class="btn btn-danger btn-sm ms-auto unfollow-btn"
                                        data-user-id="{{ $r->id }}">Unfollow</button>
                                </li>
                            @empty
                                <span class="text-white">Anda belum mengikuti siapa pun</span>
                            @endforelse
                        </div>
                    </div>
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
    <script>
        $(document).on('click', '.unfollow-btn', function() {
            var userId = $(this).data('user-id');
            var button = $(this);

            $.ajax({
                url: '/unfollow/' + userId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        button.closest('li').remove();
                        alert('Berhasil berhenti mengikuti pengguna.');
                    } else {
                        alert('Gagal berhenti mengikuti pengguna.');
                    }
                },
                error: function(response) {
                    alert('Gagal berhenti mengikuti pengguna.');
                }
            });
        });
    </script>
</body>

</html>
