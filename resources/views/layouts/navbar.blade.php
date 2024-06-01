{{-- navbar --}}
<header>
    <div class="d-flex justify-content-center align-items-center mt-2 p-3">
        <div class="d-flex text-white gap-4">
            <a class="text-decoration-none text-white" href="">For You</a>
            @auth
                <a class="nav-link active" href="{{ route('following') }}">Following</a>
            @else
                <a class="nav-link active" href="{{ route('login') }}">Following</a>
            @endauth
        </div>
    </div>
</header>