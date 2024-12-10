@extends('admin.layouts.app2')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eskul dan Seni Budaya SMK Wikrama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            :root {
                --primary-color: #ffc107;
                --secondary-color: #343a40;
                --light-color: #f8f9fa;
                --shadow-color: rgba(0, 0, 0, 0.2);
            }

            body {
                background-color: var(--light-color);
                font-family: Arial, sans-serif;
            }

            .hero {
                display: flex;
                align-items: center;
                /* Vertikal tengah */
                justify-content: center;
                /* Horizontal tengah */
                flex-direction: column;
                /* Agar teks di atas dan tombol di bawah berada dalam satu kolom */
                padding: 50px 15px;
                background: url('{{ asset('assets/images/Gedung.jpg') }}') no-repeat center center/cover;
                color: white;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                position: relative;
            }

            /* Overlay untuk kecerahan */
            .hero-overlay {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                /* Warna gelap, bisa diubah */
                filter: brightness(50%);
                /* Menurunkan kecerahan gambar */
                z-index: 1;
                /* Pastikan overlay di atas gambar */
                border-radius: 10px;
            }

            /* Teks tetap terang */
            .hero-text {
                position: relative;
                z-index: 2;
                /* Pastikan teks berada di atas overlay */
                text-align: center;
                /* Agar teks horizontal terpusat */
            }

            /* Style untuk teks */
            .hero h1 {
                font-size: 2.5rem;
                font-weight: bold;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                animation: slideInText 1.5s;
            }

            .hero p {
                font-size: 1.2rem;
                animation: fadeInText 2s;
            }



            .btn-primary {
                background-color: var(--primary-color);
                border: none;
                padding: 10px 20px;
                transition: all 0.3s;
            }

            .btn-primary:hover {
                background-color: #e0a800;
                transform: scale(1.05);
            }

            .activities h2 {
                margin-bottom: 40px;
                font-size: 2rem;
                font-weight: bold;
                color: var(--secondary-color);
            }

            .activity-card {
                background-color: white;
                border: none;
                border-radius: 10px;
                box-shadow: 0 4px 10px var(--shadow-color);
                padding: 20px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .activity-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 6px 15px var(--shadow-color);
            }

            footer {
                background-color: var(--secondary-color);
                color: white;
                padding: 20px 0;
                text-align: center;
            }

            @keyframes fadeInText {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2rem;
                }

                .hero p {
                    font-size: 1rem;
                }

                .activities h2 {
                    font-size: 1.8rem;
                }
            }
        </style>
    </head>

    <body>

        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.5rem;"></i>
                <div>{{ Session::get('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <header class="hero container mt-4">
            <div class="hero-overlay"></div> <!-- Overlay untuk kecerahan -->
            <div class="hero-text">
                <h1>Selamat Datang di Eskul dan Seni Budaya SMK Wikrama!</h1>
                <p>Mengembangkan kreativitas dan bakat siswa melalui berbagai kegiatan ekstrakurikuler.</p>
                <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-primary">Esktrakurikuler dan Seni Budaya</a>
            </div>
        </header>


        <div class="container activities">
            <h2 class="text-center" style="margin-top: 2rem">Kegiatan Ekstrakurikuler dan Seni Budaya</h2>
            <div class="row g-4">
                <!-- PASKIBRA -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-flag fa-3x mb-3" style="color: #007bff;"></i>
                        <h5 class="card-title">PASKIBRA</h5>
                        <p class="card-text">Latihan kepemimpinan dan nasionalisme melalui kegiatan PASKIBRA.</p>
                    </div>
                </div>
                <!-- Seni Musik -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-music fa-3x mb-3" style="color: #28a745;"></i>
                        <h5 class="card-title">Seni Musik</h5>
                        <p class="card-text">Ikuti kegiatan musik dan ciptakan lagu-lagu yang keren dan kuasai alat-alat
                            musik.</p>
                    </div>
                </div>
                <!-- Seni Melukis -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-paint-brush fa-3x mb-3" style="color: #dc3545;"></i>
                        <a class="card-title text-decoration-none text-dark fs-5" href="{{ route('arts.index') }}">Seni Melukis</a>
                        <p class="card-text">Ekspresikan diri Kamu dan Perasaanmu melalui media seni melukis.</p>
                    </div>
                </div>
                <!-- Basket -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-basketball-ball fa-3x mb-3" style="color: #f39c12;"></i>
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Tingkatkan kemampuan bermain basket dan raih prestasi.</p>
                    </div>
                </div>
                <!-- Badminton -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <img src="{{ asset('assets/images/shuttlecock.png') }}" alt="Badminton"
                            style="width: 70px; margin-bottom: 1rem; align-self: center;">
                        <h5 class="card-title">Badminton</h5>
                        <p class="card-text">Kuasai teknik permainan bulu tangkis.</p>
                    </div>
                </div>
                <!-- Seni Tari -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <img src="{{ asset('assets/images/senitari.png') }}" alt="Seni Tari"
                            style="width: 2rem; margin-bottom: 1rem; align-self: center;">
                        <h5 class="card-title">Seni Tari</h5>
                        <p class="card-text">Ekspresikan budaya dan keindahan melalui gerakan tari.</p>
                    </div>
                </div>
                <!-- Angklung -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-music fa-3x mb-3" style="color: #8e44ad;"></i>
                        <h5 class="card-title">Angklung</h5>
                        <p class="card-text">Belajar seni musik tradisional dengan angklung.</p>
                    </div>
                </div>
                <!-- Paduan Suara -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-users fa-3x mb-3" style="color: #27ae60;"></i>
                        <h5 class="card-title">Paduan Suara</h5>
                        <p class="card-text">Kolaborasi suara indah dalam harmoni.</p>
                    </div>
                </div>
                <!-- Teater -->
                <div class="col-12 col-md-4">
                    <div class="card activity-card text-center">
                        <i class="fas fa-theater-masks fa-3x mb-3" style="color: #2c3e50;"></i>
                        <h5 class="card-title">Teater</h5>
                        <p class="card-text">Ekspresikan kreativitas melalui seni peran.</p>
                    </div>
                </div>
            </div>
        </div>


        <footer style="margin-top: 2rem">
            <p>&copy; 2024 SMK Wikrama. Semua Hak Dilindungi.</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
