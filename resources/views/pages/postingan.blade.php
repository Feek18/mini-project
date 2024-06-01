<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posting Page</title>

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
            width: auto;
            display: flex;
            gap: 380px;
        }

        .content {
            display: flex;
            justify-content: center;
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

        .input-custom {
            position: relative;
            width: auto;
            max-width: 450px;
            /* Adjust the max-width as needed */
            height: 200px;
            /* Adjust the height as needed */
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #999;
            text-align: center;
        }

        .input-custom input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .custom-input {
            background-color: transparent;
            border: none;
            outline: none;
            color: #FFF;
            width: 100%;
            padding: 0;
            text-align: left;
            opacity: 50%;
        }

        .custom-input::placeholder {
            color: #FFF;
        }

        .custom-input:focus {
            color: #FFF;
            background-color: transparent;
            border: none;
            outline: none;
            box-shadow: none;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">
            {{-- sidebar --}}
            @include('layouts.sidebar')
            <div class="content">
                <div class="container text-center mt-3">
                    <h1 class="text-white">Amanram</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="text-decoration-none text-white me-4" href="">For You</a>
                        <a class="text-decoration-none text-white" href="">Following</a>
                    </div>
                    <div class="card p-3 mt-4" style="background-color: transparent; border-color: #FFFF; width: 450px">
                        <div class="d-flex justify-content-between align-items-center text-white mb-2">
                            <h4>Amanram</h4>
                            <h5>{{ Auth::user()->username }}</h5>
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                        <div>
                            <form action="{{ route('formData') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="custom-input form-control @error('deskripsi') is-invalid @enderror"
                                    type="text" placeholder="Deskripsi postingan" id="deskripsi" name="deskripsi"
                                    value="{{ old('deskripsi') }}">
                                <div class="input-custom mt-2">
                                    <span>Pilih Gambar</span>
                                    <input class="@error('gambar') is-invalid @enderror" type="file" id="gambar"
                                        name="gambar" onchange="showFileName()">
                                    <span id="file-name" class="text-white"></span>
                                </div>
                                <hr class="text-white">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Posting</button>
                                </div>
                            </form>
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
        function showFileName() {
            var fileInput = document.getElementById('gambar');
            var fileName = fileInput.files[0].name;
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
</body>

</html>
