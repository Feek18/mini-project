<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
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
            min-height: 100vh;
            display: flex;
            gap: 350px;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 17px;
            margin-top: 2px;
        }

        .follow-head {
            flex: 1;
        }

        .follow {
            overflow: hidden;
            position: fixed;
            top: 100px;
        }

        .follow-body {
            display: flex;
            flex-direction: column;
            width: 400px;
            border-radius: 8px;
            margin-top: 20px;
            flex-grow: 1;
        }

        .content {
            display: flex;
            flex: 1;
            padding: 32px;
            gap: 50px
        }

        .main-content {
            flex: 2;
        }

        header {
            background-color: #151515;
            position: fixed;
            top: 0;
            z-index: 5;
            width: 75%;
            padding: 0;
        }

        .sidebar {
            position: fixed;
            top: 30px;
            z-index: 5;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 150px;
        }

        .bookmark-btn.bookmarked {
            color: blue;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">

            {{-- sidebar --}}
            @include('layouts.sidebar')

            <div>
                {{-- navbar --}}
                @include('layouts.navbar')
                {{-- content body --}}
                @include('layouts.content')
            </div>

        </div>
        @guest
            <div>
                {{-- footer --}}
                @include('layouts.footer')
            </div>
        @endguest
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.bookmark-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    let postId = this.getAttribute('data-post-id');
                    let button = this;

                    $.ajax({
                        type: 'POST',
                        url: '/bookmark-detail',
                        data: {
                            _token: '{{ csrf_token() }}', // Menambahkan token CSRF untuk keamanan
                            id_post: postId
                        },
                        success: function(response) {
                            if (response.bookmarked) {
                                button.classList.add('bookmarked');
                            } else {
                                button.classList.remove('bookmarked');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Gagal mengirim data.', xhr, status, error);
                        }
                    });
                });
            });
        });
    </script>


</body>

</html>
