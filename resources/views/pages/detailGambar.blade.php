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
            /* overflow-x: hidden; */
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
                            src="{{ Storage::url($post->user->gambar) }}" width="50px" height="50px" alt="">
                        <h3>{{ $post->user->username }}</h3>
                    </div>
                    <div class="d-flex align-items-start mt-3 text-white">
                        <div class="">
                            <h6 class="title flex-start text-white">{{ $post->user->deskripsi }}</h6>
                            <img src="{{ Storage::url($post->gambar) }}" width="95%" alt="">
                        </div>
                        <div class="col-md-4">
                            <h4>komentar</h4>
                            @foreach ($comments as $c)
                                <div class="d-flex align-items-center mb-2">
                                    <img class="me-3" style="border-radius: 100px; object-fit: cover"
                                        src="{{ Storage::url($c->user->gambar) }}" width="50px" height="50px"
                                        alt="">
                                    <h6>{{ $c->user->username }}</h6>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center mb-2" style="width: 100%;">
                                        @if ($post->count() > 0)
                                            <div class="post">
                                                <form action="/like_komen" method="POST" id="formLike">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                                    <input id="commentid" name="id_comment" type="hidden"
                                                        value="{{ $c->id }}">
                                                    <span class="me-5">{{ $c->komen }}</span>
                                                    <div class="d-flex align-items-center">
                                                        <input id="userid" name="Userid" type="hidden"
                                                            value="{{ Auth::user()->id }}">
                                                        <i id="clickLike" class="fa-solid fa-heart me-2"></i>
                                                        <p class="me-5 mb-0">{{ $likes_komen->count() }} likes</p>
                                                        @auth
                                                            @if (auth()->id() == $c->user->id)
                                                                <span
                                                                    class="ms-3 comment-actions text-danger delete-comment"
                                                                    data-comment-id="{{ $c->id }}"
                                                                    style="cursor: pointer">Hapus</span>
                                                            @endif
                                                            <button type="button" class="btn text-white"
                                                                onclick="showReplyForm({{ $c->id }})">reply</button>
                                                        @endauth
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <p>No posts found.</p>
                                        @endif
                                    </div>
                                </div>
                                @foreach ($c->replies as $i)
                                    <div class="ms-4">
                                        <img src="{{ Storage::url($i->user->gambar) }}" alt="" width="30px"
                                            height="30px" style="border-radius: 100px; object-fit: cover">
                                        <h6>{{ $i->user->username }}</h6>
                                        <span>{{ $i->komen }}</span>
                                        <div class="d-flex align-items-center">
                                            @auth
                                                @if (auth()->id() == $i->user->id)
                                                    <span class="ms-3 comment-actions text-danger delete-reply"
                                                        data-reply-id="{{ $i->id }}"
                                                        style="cursor: pointer">Hapus</span>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                                <div id="replyForm-{{ $c->id }}" class="mb-4" style="display: none;">
                                    <form action="{{ route('replies.store', $c->id) }}" method="POST"
                                        class="input-group">
                                        @csrf
                                        <input type="hidden" name="idpost" value="{{ $post->id }}">
                                        <div class="d-flex">
                                            <input type="text" name="komen" class="form-control border-0"
                                                placeholder="Masukkan teks..." style="width: 250px;">
                                            <button type="submit" class="btn text-white ml-2"
                                                style="width: 100px;">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach

                            <hr style="width: 65%">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-heart like-btn me-2 {{ $post->isLikedByUser() ? 'liked' : '' }}"
                                        data-post-id="{{ $post->id }}" style="cursor: pointer;"></i>
                                    <span class="me-3">{{ $post->likes->count() }} Likes</span>
                                    <i class="fa-regular fa-comment me-3"></i>
                                    <i class="fa-regular fa-paper-plane me-5"></i>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <i class="fa-regular fa-bookmark bookmark-btn {{ $post->isBookmarkedByUser() ? 'bookmarked' : '' }}"
                                        data-post-id="{{ $post->id }}" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <form class="input-group-custom" action="{{ route('komen-data') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-grup">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.delete-reply').click(function() {
            var replyId = $(this).data('reply-id');
            var replyElement = $('#reply-' + replyId);

            $.ajax({
                url: '/replies/' + replyId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        replyElement.remove();
                        alert('Berhasil menghapus balasan.');
                    } else {
                        alert('Gagal menghapus balasan.');
                    }
                },
                error: function(response) {
                    alert('Gagal menghapus balasan.');
                }
            });
        });

        $('.delete-comment').click(function() {
            var commentId = $(this).data('comment-id');
            var commentElement = $('#comment-' + commentId);

            $.ajax({
                url: '/comments/' + commentId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        commentElement.remove();
                        alert('Berhasil menghapus komentar.');
                    } else {
                        alert('Gagal menghapus komentar.');
                    }
                },
                error: function(response) {
                    alert('Gagal menghapus komentar.');
                }
            });
        });



        $('.like-btn').on('click', function(event) {
            event.stopPropagation();
            let postId = $(this).data('post-id');
            let icon = $(this);

            $.ajax({
                url: '{{ route('like.post') }}',
                type: 'POST',
                data: JSON.stringify({
                    postLike_id: postId
                }),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.liked) {
                        icon.addClass('liked');
                        icon.css('color', 'red');
                    } else {
                        icon.removeClass('liked');
                        icon.css('color', '#fff');
                    }
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
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

        let like = document.getElementById("clickLike");
        console.log(like);
        like.addEventListener('click', function() {
            let userId = document.getElementById("userid").value;
            let commentId = document.getElementById("commentid").value;

            console.log(like.classList)
            if (like.classList.contains('liked')) {
                like.style.color = 'white';
                like.classList.remove('liked');
            } else {
                like.style.color = 'red';
                like.classList.add('liked');
                document.getElementById('formLike').submit()
            }
        })


        function showReplyForm(id) {
            document.getElementById('replyForm-' + id).style.display = 'block';
        }
        document.getElementById("showButton").onclick = function() {
            document.getElementById("inputContainer").style.display = "block";
        };
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.like-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    let postId = this.getAttribute('data-post-id');

                    fetch(`/posts/${postId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                button.style.display = 'none';
                                button.nextElementSibling.style.display = 'inline-block';
                                let likesCount = button.closest('.post').querySelector(
                                    '.me-5.mb-0');
                                likesCount.textContent = parseInt(likesCount.textContent) + 1 +
                                    ' likes';
                            }
                        });
                });
            });
            document.querySelectorAll('.unlike-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    let postId = this.getAttribute('data-post-id');
                    fetch(`/posts/${postId}/unlike`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                button.style.display = 'none';
                                button.previousElementSibling.style.display = 'inline-block';
                                let likesCount = button.closest('.post').querySelector(
                                    '.me-5.mb-0');
                                likesCount.textContent = parseInt(likesCount.textContent) - 1 +
                                    ' likes';
                            }
                        });
                });
            });
        });
    </script>
</body>

</html>
