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
            /* width: 900px; */
            display: flex;
            gap: 55px;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
        }
    </style>
</head>

<body>

    <section class="d-flex">
        <div class="wrapper">
            {{-- sidebar --}}
            @include('layouts.sidebar')
            <div class="mt-5">
                {{-- bookmark --}}
                <h2 class="text-white">Semua Bookmarks</h2>
                <div class="card-head">
                    <div class="card p-3 mt-3" style="width: 300px">
                        <!-- bookmarks.blade.php -->
                        @foreach ($bookmarks as $bookmark)
                            <div class="d-flex align-items-center gap-4 mt-3">
                                <img src="{{ $bookmark->post->user->gambar }}"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 150px;"
                                    alt="">
                                <div>
                                    <h4>{{ $bookmark->post->user->username }}</h4>
                                    <span>{{ \Carbon\Carbon::parse($bookmark->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <img class="mt-3" src="{{ Storage::url($bookmark->post->gambar) }}" style="width: 265px"
                                alt="">
                        @endforeach
                    </div>
                </div>
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
