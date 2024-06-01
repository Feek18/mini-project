{{-- content search --}}
<section class="mt-4">
    <div class="container">
        <form action="{{ route('explore') }}" method="GET"
            class="d-flex justify-content-between gap-1" style="width: 40%">
            <input class="form-control flex-grow-1 me-2" type="text" placeholder="Search"
                aria-label="Search" style="color: #282828;" name="search">
            <button style="border: none" class="btn">
                <i class="fa-solid fa-magnifying-glass fa-xl text-white" style="cursor: pointer;"></i>
            </button>
        </form>
        <div class="content" style="width: 950px;">
            <div class="text-white">
                <div class="d-flex">
                </div>
                <div class="col-md-12">
                    <h3 class="mt-3">Hasil Pencarianmu</h3>
                    <div class="d-flex align-items-center mt-4">
                        <div class="d-flex align-items-center">
                            @if (request()->has('search'))
                                @forelse ($users as $u)
                                    <div class="d-flex mt-3 gap-3 align-items-center">
                                        <img src="{{ Storage::url($u->gambar) }}" alt="user" class="rounded-circle me-2"
                                            style="width: 80px; height: 80px; object-fit: cover">
                                        <div class="gap-3 justify-content-between">
                                            <strong>{{ $u->username }}</strong><br>
                                            <small>{{ $u->nama }}</small>
                                        </div>
                                        @if (auth()->check() && auth()->id() !== $u->id)
                                            @php
                                                $isFollowing = auth()
                                                    ->user()
                                                    ->following()
                                                    ->where('id_follow', $u->id)
                                                    ->exists();
                                            @endphp
                                            <button
                                                class="btn btn-sm ms-auto follow-btn {{ $isFollowing ? 'btn-danger' : 'btn-primary' }}"
                                                data-user-id="{{ $u->id }}">
                                                {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                                            </button>
                                        @endif
                                    </div>
                                @empty
                                    <p class="text-secondary mt-4">Tidak ada hasil yang ditemukan untuk
                                        "{{ request()->get('search') }}"</p>
                                @endforelse
                            @else
                                <p class="text-secondary mt-4">Silakan masukkan kata kunci pencarian.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="follow-head">
                <div class="follow">
                    <div class="follow-body text-white">
                        <h2>Siapa yang harus diikuti</h2>
                        <p>Orang yang mungkin anda kenal</p>
                        @forelse ($recommendations as $r)
                            <li class="d-flex align-items-center mb-3 gap-3">
                                <img src="{{ Storage::url($r->gambar) }}" alt="user" class="rounded-circle me-2"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <strong class="text-white">{{ $r->username }}</strong><br>
                                    <small class="text-white me-5">{{ $r->nama }}</small>
                                </div>
                                <button class="btn btn-warning fw-medium btn-sm ms-auto follow-btn"
                                    data-user-id="{{ $r->id }}">Follow</button>
                            </li>
                        @empty
                            <li>Anda telah memfollow semua orang</li>
                        @endforelse
                        <hr>
                        <span style="font-size: 13px" class="opacity-75">Terms of Service Privacy Policy Cookie Policy
                            Accessibility Ads Info More 2024 Sosmed</span>
                    </div>
                </div>
            </div>
        </div>
</section>
