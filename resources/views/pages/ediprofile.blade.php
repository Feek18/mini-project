p
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>

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

        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group label {
            min-width: 80px;
            /* You can adjust this width as needed */
        }

        .form-control {
            flex: 1;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">
            {{-- sidebar --}}
            @include('layouts.sidebar')
            <div class="container mt-5">
                <div class="">
                    <div class="d-flex flex-column align-items-center">
                        <form action="{{ route('updateData', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img style="border-radius: 50%; cursor: pointer;"
                                src=""
                                width="130px" height="130px" id="profileImg" alt="Profile Picture">
                            <input type="file" name="gambar" id="profileImageUpload" style="display: none;">
                            <p class="text-white mt-3">Edit Profile</p>
                            <div class="w-100 mt-3" style="max-width: 500px;">
                                <div class="form-group mb-3">
                                    <label for="username" class="text-white">Username</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Enter username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama" class="text-white">Name</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Enter name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bio" class="text-white">Bio</label>
                                    <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Enter bio"></textarea>
                            </div>
                                <button type="submit" class="btn btn-primary float-end">Edit</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#profileImg').click(function() {
                $('#profileImageUpload').click();
            });

            $('#profileImageUpload').change(function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profileImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            });
        });
    </script>
</body>

</html>
