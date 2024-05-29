{{-- footer --}}
<footer style="background-color: #FFDB5C">
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="text-dark">Jangan ketinggalan berita terbaru</h1>
                <p class="text-dark">Login untuk pengalaman terbaru</p>
            </div>
            <div>
                <button class="btn btn-outline-dark border-3 py-2 px-4" style="background-color: transparent;">
                    <a class="text-decoration-none text-dark fw-medium" href="{{ route('login') }}">Login</a>
                </button>
                <button class="btn btn-dark py-2 px-4">
                    <a class="text-decoration-none text-white" href="{{ route('regis') }}">Register</a>
                </button>
            </div>
        </div>
    </div>
</footer>