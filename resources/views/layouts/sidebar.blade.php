{{-- sidebar --}}
<section style="sidebar">
    <div class="card border-end border-white p-4" style="width: 280px; min-height: 200vh; background-color: #151515">
        <div class="sidebar">
            <a class="text-decoration-none text-white" style="font-size: 32px" href="{{ route('profil') }}">My Account</a>
            <p class="text-white">ayo login</p>
            <hr class="text-white">
            <div class="mt-4">
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="{{ route('index') }}" class="nav-link">
                            <i class="fa-solid fa-house me-3"></i>Home
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="{{ route('explore') }}" class="nav-link">
                            <i class="fa-solid fa-magnifying-glass me-3"></i>Explore
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="{{ route('notify') }}" class="nav-link">
                            <i class="fa-solid fa-bell me-3"></i>Notifikasi
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="" class="nav-link">
                            <i class="fa-solid fa-plus me-3"></i>Postingan
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="" class="nav-link">
                            <i class="fa-solid fa-bookmark me-3"></i>Bookmarks
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="" class="nav-link">
                            <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>Logout
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-white" href="{{ route('login') }}" class="nav-link">
                            <i class="fa-solid fa-arrow-right-to-bracket me-3"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
