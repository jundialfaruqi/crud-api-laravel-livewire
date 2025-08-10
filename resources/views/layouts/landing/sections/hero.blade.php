<!-- Hero Section dengan Carousel -->
<section id="home" class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption hero-content">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di CRUD Laravel</h1>
                    <p class="lead mb-4">Sistem manajemen data modern dengan teknologi Laravel dan Livewire</p>
                    <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg me-3">Mulai Sekarang</a>
                    <a href="#pengumuman" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2015&q=80"
                    class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption hero-content">
                    <h1 class="display-4 fw-bold mb-4">Teknologi Terdepan</h1>
                    <p class="lead mb-4">Dibangun dengan Laravel 11, Livewire, dan Bootstrap 5</p>
                    <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg me-3">Akses Dashboard</a>
                    <a href="#berita" class="btn btn-outline-light btn-lg">Lihat Fitur</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption hero-content">
                    <h1 class="display-4 fw-bold mb-4">Keamanan Terjamin</h1>
                    <p class="lead mb-4">Sistem role dan permission yang lengkap untuk keamanan data</p>
                    <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg me-3">Login Aman</a>
                    <a href="#kontak" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>