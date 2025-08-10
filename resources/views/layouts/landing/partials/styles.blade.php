<style>
    /* Navbar styling */
    .navbar {
        transition: background-color 0.3s ease;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.1) !important;
    }

    .navbar.bg-dark {
        background-color: rgba(0, 0, 0, 0.9) !important;
    }

    .hero-section {
        height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .carousel-item {
        height: 100vh;
    }

    .carousel-item img {
        height: 100vh;
        object-fit: cover;
    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        z-index: 10;
    }

    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .navbar-brand img {
        height: 40px;
    }

    /* Footer Styling */
    footer {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    footer a:hover {
        color: #f8f9fa !important;
        transition: color 0.3s ease;
    }

    /* Section Styling */
    #pengumuman {
        background-color: #f8f9fa;
    }

    /* Smooth scroll offset for fixed navbar */
    html {
        scroll-padding-top: 80px;
    }

    /* Badge styling */
    .badge {
        font-size: 0.75rem;
    }

    /* Card image hover effect */
    .card img {
        transition: transform 0.3s ease;
    }

    .card:hover img {
        transform: scale(1.05);
    }

    /* Social media icons hover effect */
    footer .fs-4:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }
</style>