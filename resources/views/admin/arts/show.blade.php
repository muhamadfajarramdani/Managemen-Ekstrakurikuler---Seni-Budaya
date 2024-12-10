@extends('admin.layouts.app3')

@section('content')
    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap');

        /* Styling Umum */
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #e0f7fa, #e3f2fd);
            color: #333;
        }

        .main-content {
            margin-top: 80px;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #3f51b5, #1a237e);
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2.8em;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2em;
            font-weight: 300;
            margin-top: 0;
        }

        .gallery-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 10px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .art-item-detail {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .art-image-detail {
            max-width: 450px;
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .art-details {
            max-width: 600px;
            flex: 1;
            padding: 10px 20px;
        }

        .art-title {
            font-size: 2.2em;
            margin: 10px 0;
            font-weight: 700;
            color: #3f51b5;
        }

        .art-description {
            font-size: 1.1em;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .art-price {
            font-size: 1.4em;
            color: #1b5e20;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
        }

        .back-btn {
            background-color: #3f51b5;
            color: white;
        }

        .back-btn:hover {
            background-color: #303f9f;
        }

        .edit-btn {
            background-color: #ff9800;
            color: white;
        }

        .edit-btn:hover {
            background-color: #f57c00;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        .add-to-cart-btn {
            background-color: #00c853;
            color: white;
        }

        .add-to-cart-btn:hover {
            background-color: #009624;
        }
    </style>

    <div class="main-content">
        <header class="header">
            <h1>{{ $art->name }}</h1>
            <p>Pelajari lebih dalam tentang karya seni pilihan ini</p>
        </header>

        <!-- Tampilkan Pesan Sukses -->
        @if (session('success'))
            <div
                style="background-color: #00c853; color: white; padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="gallery-container">
            <div class="art-item-detail">
                <!-- Gambar Lukisan -->
                <img src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->name }}" class="art-image-detail">

                <!-- Detail Lukisan -->
                <div class="art-details">
                    <h2 class="art-title">{{ $art->name }}</h2>
                    <p class="art-description">{{ $art->description }}</p>
                    <p class="art-price">Rp {{ number_format($art->price, 0, ',', '.') }}</p>

                    <!-- Tombol Edit -->
                    <a href="{{ route('arts.edit', $art->id) }}" class="btn edit-btn">Edit</a>

                    <!-- Tombol Hapus -->
                    <form id="delete-form-{{ $art->id }}" action="{{ route('arts.destroy', $art->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-btn" onclick="confirmDelete({{ $art->id }})">
                            Hapus
                        </button>
                    </form>

                    <!-- Tombol Masukkan ke Keranjang -->
                    <form action="{{ route('arts.cart.add', $art->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn add-to-cart-btn" style="background-color: #00c853; color: white;">
                            Masukkan ke Keranjang
                        </button>
                    </form>


                    <!-- Tombol Kembali -->
                    <a href="{{ route('arts.index') }}" class="btn back-btn">Kembali ke Galeri</a>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
