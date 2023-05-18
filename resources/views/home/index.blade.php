@extends('home.layout')

@section('content')
    @include('home.navbar')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-6 fw-bolder text-white mb-2">iPagar: Layanan Pembuatan Pagar, Pengaman Jendela,
                            Dan Pengelasan
                        </h1>
                        <p class="lead fw-normal text-white-50 mb-4">Nikmati banyak layanan yang dapat memanjakan anda untuk
                            pembuatan pagar, pengaman jendela, dan pengelasan</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/auth/login">Pesan Sekarang</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="/auth/register">Daftar Akun</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5" src="assets/undraw_online_stats_0g94.svg" alt="..." />
                </div>
            </div>
        </div>
    </header>

    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Layanan untuk pelanggan iPagar</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-collection"></i></div>
                            <h2 class="h5">Layanan Pemesanan Online</h2>
                            <p class="mb-0">Anda dapat memilih jenis layanan, tanggal, dan jam yang diinginkan melalui
                                aplikasi secara online.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-building"></i></div>
                            <h2 class="h5">Pembaruan Proyek Langsung</h2>
                            <p class="mb-0">Memberikan akses kepada anda untuk melacak progress proyek secara langsung
                                melalui aplikasi.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Konsultasi Virtual</h2>
                            <p class="mb-0">Menyediakan fitur konsultasi virtual melalui chat langsung sehingga anda dapat
                                berinteraksi langsung dengan ahli secara lebih personal.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Rekomendasi Produk</h2>
                            <p class="mb-0">Menyediakan beberapa rekomendasi tentang produk dan material yang digunakan dalam pembuatan pagar, pengelasan, dan pengaman jendela.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"Jangan ragu untuk menghubungi kami melalui website kami untuk
                            mendapatkan konsultasi gratis dan penawaran terbaik. Keamanan dan kepuasan Anda adalah prioritas
                            kami. Segera wujudkan proyek konstruksi Anda dengan bantuan jasa pembuat pagar, pengaman
                            jendela, dan pengelasan terbaik!"</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="fw-bold">
                                Ilham Rumondor
                                <span class="fw-bold text-primary mx-1">/</span>
                                CEO, iPagar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Tips and Trik</h2>
                        <p class="lead fw-normal text-muted mb-5">Blog atau berita yang berisi artikel informatif, panduan perawatan, atau tips keamanan yang bermanfaat bagi pelanggan iPagar</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">Blog post title</h5>
                            </a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">Another blog post title</h5>
                            </a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height
                                of each card. Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">The last blog post title is a little bit longer than
                                    the others</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and
                                make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Evelyn Martinez</div>
                                        <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
