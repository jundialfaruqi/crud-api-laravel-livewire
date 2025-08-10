<!-- Footer -->
<footer id="kontak" class="text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('image/logo/brand.svg') }}" alt="Logo" style="height: 40px;"
                        class="me-2">
                    <h5 class="mb-0 fw-bold">CRUD Laravel</h5>
                </div>
                <p class="text-light">Sistem manajemen data modern yang dibangun dengan teknologi terdepan untuk
                    memenuhi kebutuhan bisnis Anda.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3">Menu</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#home" class="text-light text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="#pengumuman"
                            class="text-light text-decoration-none">Pengumuman</a></li>
                    <li class="mb-2"><a href="#berita" class="text-light text-decoration-none">Berita</a></li>
                    <li class="mb-2"><a href="{{ route('auth.login') }}"
                            class="text-light text-decoration-none">Login</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Fitur</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">User Management</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Role & Permission</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Dashboard Analytics</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">API Integration</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:info@crudlaravel.com" class="text-light text-decoration-none">info@crudlaravel.com</a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        <a href="tel:+6281234567890" class="text-light text-decoration-none">+62 812-3456-7890</a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        <span class="text-light">Jakarta, Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4 text-light">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light">&copy; 2024 CRUD Laravel. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <small class="text-light">
                    Built with <i class="bi bi-heart-fill text-danger"></i> using Laravel & Livewire
                </small>
            </div>
        </div>
    </div>
</footer>