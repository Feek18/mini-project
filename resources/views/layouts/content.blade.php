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
                                        src="{{ Storage::url($i->user->gambar) }}"
                                        width="11%" alt="">
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
                                      <img src="{{ Storage::url($i->gambar) }}"
                                          width="532px" alt="">
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
                        {{-- <div class="d-flex align-items-center">
                            <div class="d-flex gap-3">
                                <img style="border-radius: 100%"
                                    src="{{ Storage::url($post->user->gambar) }}"
                                    width="17%" alt="">
                                <div>
                                    <h4>{{ $post->user->username }}</h4>
                                    <span class="text-white">{{ $post->user->nama }}</span>
                                </div>  
                            </div>
                            <a class="text-decoration-none" style="color: #FFDB5C" href="">Follow</a>
                        </div> --}}
                        <div class="d-flex align-items-center mt-3">
                            <div class="d-flex gap-3">
                                <img style="border-radius: 100%"
                                    src="https://images.unsplash.com/photo-1457449940276-e8deed18bfff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    width="17%" alt="">
                                <div>
                                    <h4>arhandev</h4>
                                    <span>Farhan Abdul Hamid</span>
                                </div>
                            </div>
                            <a class="text-decoration-none" style="color: #FFDB5C" href="">Follow</a>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div class="d-flex gap-3">
                                <img style="border-radius: 100%"
                                    src="https://images.unsplash.com/photo-1594751439417-df8aab2a0c11?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    width="17%" alt="">
                                <div>
                                    <h4>imronrev</h4>
                                    <span>Imron Reviady</span>
                                </div>
                            </div>
                            <a class="text-decoration-none" style="color: #FFDB5C" href="">Follow</a>
                        </div>
                        <hr>
                        <span style="font-size: 13px" class="opacity-75">Terms of Service Privacy Policy Cookie Policy
                            Accessibility Ads Info More 2024 Sosmed</span>
                    </div>
                </div>
            </div>
        </div>
</section>
