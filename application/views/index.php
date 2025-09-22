<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Rekomendasi Suplemen Omega 3</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .hero-section {
        background: linear-gradient(135deg, #007bff, #00c6ff);
        color: white;
        padding: 100px 0;
    }

    .feature-icon {
        font-size: 3rem;
        color: #007bff;
    }

    .cta-section {
        background-color: #007bff;
        color: white;
    }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#home">
                <i class="bi bi-capsule-pill text-primary"></i> Omega3 DSS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">Cara Kerja</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('auth');?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Sistem Pendukung Keputusan Rekomendasi Suplemen Omega 3</h1>
                    <p class="lead mb-4">Dapatkan rekomendasi suplemen Omega 3 yang tepat berdasarkan kebutuhan
                        kesehatan Anda.</p>
                    <a href="<?=base_url('pages')?>" class="btn btn-light btn-lg">Mulai Rekomendasi Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://cdn.prod.website-files.com/5ef788f07804fb7d78a4127a/61cc20621f33166101a1472a_decision%20support%20system-min.jpeg"
                        class="img-fluid rounded shadow" alt="DSS">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Apa Itu Sistem Pendukung Keputusan?</h2>
                    <p class="lead">Sistem Pendukung Keputusan (SPK) adalah sistem berbasis komputer yang
                        mendukung para pengambil keputusan dalam menangani masalah pengambilan
                        keputusan yang kompleks dan multikriteria, dengan mengintegrasikan data, model, dan
                        antarmuka yang mudah digunakan untuk mengevaluasi dan memprioritaskan alternatif
                        (Alam Bhuiyan & Hammad, 2023). </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <!-- <section id="features" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Fitur Utama</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <i class="bi bi-graph-up feature-icon mb-3"></i>
                            <h4 class="card-title">Analisis Cerdas</h4>
                            <p class="card-text">Sistem menganalisis data Anda menggunakan metode Decision Support
                                System (DSS) untuk hasil akurat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <i class="bi bi-person-lines-fill feature-icon mb-3"></i>
                            <h4 class="card-title">Personalisasi</h4>
                            <p class="card-text">Rekomendasi disesuaikan dengan usia, jenis kelamin, dan kondisi
                                kesehatan spesifik Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <i class="bi bi-shield-check feature-icon mb-3"></i>
                            <h4 class="card-title">Keamanan Terjamin</h4>
                            <p class="card-text">Semua rekomendasi berdasarkan pedoman medis dan data terpercaya, bukan
                                pengganti konsultasi dokter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- How It Works Section -->
    <!-- <section id="how-it-works" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Cara Kerja Sistem</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-person-plus feature-icon text-primary mb-3"></i>
                            <h5>1. Isi Profil</h5>
                            <p>Masukkan data dasar seperti usia, berat badan, dan riwayat kesehatan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-cpu feature-icon text-primary mb-3"></i>
                            <h5>2. Analisis AI</h5>
                            <p>Sistem memproses data menggunakan algoritma DSS untuk menentukan kebutuhan Omega 3 Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-check-lg feature-icon text-primary mb-3"></i>
                            <h5>3. Dapatkan Rekomendasi</h5>
                            <p>Terima saran suplemen, dosis, dan tips penggunaan yang optimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Pendukung Keputusan Omega 3.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
</body>

</html>