{{-- main content --}}
<section class="mt-4">
    <div class="container">
        <div class="content">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($post as $i)
                            <div class="card mb-4" style="width: 550px">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex gap-3">
                                        <img style="border-radius: 100px; object-fit: cover"
                                            src="{{ Storage::url($i->user->gambar) }}" width="11%" alt="">
                                        <div>
                                            <h5>{{ $i->user->username }}</h5>
                                            <span>{{ \Carbon\Carbon::parse($i->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="p-2">
                                        <h6 class="title flex-start">{{ $i->deskripsi }}</h6>
                                        <a href="{{ route('detail', $i->id) }}">
                                            <img src="{{ Storage::url($i->gambar) }}" width="532px" alt="">
                                        </a>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex gap-4">
                                                <div>
                                                    <i class="fa-regular fa-heart"></i>
                                                    <span>likes</span>
                                                </div>
                                                <div>
                                                    <i class="fa-regular fa-comment"></i>
                                                    <span>comments</span>
                                                </div>
                                            </div>
                                            <a href="">
                                                <i class="fa-regular fa-bookmark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="follow-head">
                <div class="follow">
                    <div class="follow-body text-white">
                        <h2>Siapa yang harus diikuti</h2>
                        <p>Orang yang mungkin anda kenal</p>
                        @forelse ($follow as $r)
                            <li class="d-flex align-items-center mb-3 gap-3">
                                <img src="{{ Storage::url($r->gambar) }}" alt="user" class="rounded-circle me-2"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <strong class="text-white">{{ $r->username }}</strong><br>
                                    <small class="text-white me-5">{{ $r->nama }}</small>
                                </div>
                                <button class="btn btn-primary btn-sm ms-auto follow-btn"
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
