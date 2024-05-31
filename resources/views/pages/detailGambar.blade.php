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
            width: 100%;
            min-height: calc(100vh - 60px);
            display: flex;
            gap: 24px;
        }

        .sidebar {
            position: sticky;
            top: 25px;
            z-index: 5;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 150px;
        }

        .input-group-custom {
            max-width: 380px;
        }

        .border-bottom {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            width: 100%;
        }

        .border-bottom:focus {
            box-shadow: none;
            border-bottom: 1px solid #007bff;
        }

        .input-grup {
            display: flex;
            align-items: center;
        }

        #inputContainer {
            display: none;
            margin-top: 10px;
            margin-left: 38px;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">

            {{-- sidebar --}}
            @include('layouts.sidebar')

            <div class="mt-5">
                {{-- back --}}
                <div class="d-flex align-items-center">
                    <a class="text-decoration-none text-white" href="{{ route('index') }}"><i
                            class="fa-solid fa-chevron-left me-3"></i>back</a>
                </div>
                {{-- detail body --}}
                <div class="card mt-4 p-4" style="width: 98%; background-color: transparent; border: 1px solid #FFFF">
                    <div class="d-flex justify-content-start align-items-center gap-2 text-white">
                        <img style="border-radius: 100px; object-fit: cover"
                            src="{{ Storage::url($posts->user->gambar) }}" width="50px" height="50px" alt="">
                        <h3>{{ $posts->user->username }}</h3>
                    </div>
                    <div class="d-flex align-items-start mt-3 text-white">
                        <div class="">
                            <h6 class="title flex-start">{{ $posts->user->deskripsi }}</h6>
                            <img src="{{ Storage::url($posts->gambar) }}" width="95%" alt="">
                        </div>
                        <div class="col-md-4">
                            <h4>komentar</h4>
                            @foreach ($comment as $c)
                                <div class="d-flex align-items-center mb-2">
                                    <img class="me-3" style="border-radius: 100px; object-fit: cover"
                                        src="{{ Storage::url($c->user->gambar) }}" width="50px" height="50px"
                                        alt="">
                                    <h6>{{ $c->user->username }}</h6>
                                </div>
                                <span class="me-5">{{ $c->komen }}</span>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center mb-2" style="width: 100%;">
                                        <p class="me-5 mb-0">likes</p>
                                        <p class="me-5 mb-0">hapus</p>
                                        <button type="button" class="btn text-white" onclick="showReplyForm({{ $c->id }})">reply</button>
                                    </div>
                                </div>
                                <div id="replyForm-{{ $c->id }}" class="mb-4" style="display: none;">
                                    <form action="{{ route('replies.store', $c->id) }}" method="POST" class="input-group">
                                        @csrf
                                        <div class="d-flex">
                                            <input type="text" id="textInput-{{ $c->id }}" name="komen" id="komen" class="form-control border-0" placeholder="Masukkan teks..." style="width: 250px;">
                                            <button type="submit" class="btn text-white ml-2" style="width: 100px;">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                            <hr style="width: 65%">
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    <i class="fa-regular fa-heart me-3"></i>
                                    <i class="fa-regular fa-comment me-3"></i>
                                    <i class="fa-regular fa-paper-plane me-5"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                            <div class="mt-4">
                                <form class="input-group-custom" action="{{ route('komen-data') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-grup">
                                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                                        <input type="text" class="form-control me-2"
                                            placeholder="Tulis komentar anda" name="komen" id="komen">
                                        <button class="btn text-white" type="submit">Kirim</button>
                                    </div>
                                </form>
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
    <script>
        function showReplyForm(id) {
            document.getElementById('replyForm-' + id).style.display = 'block';
        }
        document.getElementById("showButton").onclick = function() {
            document.getElementById("inputContainer").style.display = "block";
        };
    </script>
</body>

</html>
