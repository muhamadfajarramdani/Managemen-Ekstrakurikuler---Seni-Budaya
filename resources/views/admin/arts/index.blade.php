@extends('admin.layouts.app3')

@section('content')
    <style>
        /* Styling Umum */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
            color: #333;
            background-image: url(https://t3.ftcdn.net/jpg/07/19/24/36/360_F_719243633_OgFd73z4fa0CyQYdQBSy14uQF0UYqOVN.jpg);
            background-size: cover;
            /* Menyesuaikan ukuran gambar dengan layar */
            background-position: center;
            /* Memposisikan gambar di tengah */
            background-repeat: no-repeat;
            /* Mencegah gambar berulang */
        }


        .main-content {
            margin-top: 80px;
            padding: 30px;
        }

        .header {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #d8942d, #3d50ac);
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .header h1 {
            font-size: 3em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .header p {
            font-size: 1.3em;
            font-weight: 300;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .add-btn {
            display: inline-block;
            margin: 30px 0;
            font-size: 1.2em;
            padding: 12px 30px;
            background-color: #4CAF50;
            color: white;
            border-radius: 30px;
            text-decoration: none;
            transition: transform 0.3s ease, background-color 0.3s;
        }

        .add-btn:hover {
            background-color: #45a049;
            transform: scale(1.1);
            text-decoration: none;
            color: white;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery {
            display: grid;
            /*ini untuk mengatur dalam 1 bari ada berapa kartu */
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
        }

        .art-item {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 10px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: auto;
            width: 200px;
            height: auto;
        }

        .art-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .art-image {
            max-width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .art-item:hover .art-image {
            transform: scale(1.05);
        }

        .art-details {
            padding: 10px 5px;
        }

        .art-title {
            font-size: 1em;
            /* Ukuran teks lebih kecil */
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
            letter-spacing: 0.5px;
        }

        .art-description {
            font-size: 0.8em;
            /* Ukuran deskripsi lebih kecil */
            color: #777;
            margin-bottom: 10px;
            line-height: 1.4;
            text-align: justify;
        }

        .art-price {
            font-size: 0.9em;
            color: #ff9800;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            align-items: center;
            padding: 1px 0;
            background-color: #333;
            color: white;
            font-size: 1em;
            position: relative;
        }

        .footer a {
            color: #ff9800;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;

        }

        /* Animasi Scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease-out;
        }

        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    @if (Session::has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ Session::get('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

    <div class="main-content">
        <header class="header">
            <h1>Penjualan Karya Seni</h1>
            <p>Temukan karya seni unik dari berbagai seniman lokal yang penuh makna dan keindahan!</p>
        </header>

        <div class="gallery-container">
            <a href="{{ route('arts.create') }}" class="add-btn">+ Tambah Karya</a>
            <section class="gallery">
                @foreach ($arts as $art)
                    <div class="art-item fade-in" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                        <a href="{{ route('arts.show', $art->id) }}">
                            <img src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->name }}" class="art-image">
                        </a>
                        <div class="art-details">
                            <h2 class="art-title">{{ $art->name }}</h2>
                            <p class="art-description">{{ Str::limit($art->description, 100) }}</p>
                            <p class="art-price">Rp {{ number_format($art->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </div>

    <footer class="footer">
        <p>© 2024 Penjualan Karya Seni | <a href="#">Dukungan untuk seniman lokal</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add fade-in animation
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.fade-in');
            window.addEventListener('scroll', () => {
                items.forEach(item => {
                    if (item.getBoundingClientRect().top < window.innerHeight - 50) {
                        item.classList.add('fade-in-visible');
                    }
                });
            });
        });
    </script>
@endsection
