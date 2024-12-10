@extends('admin.layouts.app2')

@section('content')
    <style>
        /* Styling Umum */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #333;
        }

        .main-content {
            margin-top: 80px;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #4CAF50, #2e7d32);
            color: white;
            border-bottom: 5px solid #2e7d32;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2em;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
        }

        .form-container input[type="file"] {
            padding: 0;
            margin-top: 10px;
        }

        /* Tombol Edit dan Kembali */
        .form-container button,
        .form-container .back-btn {
            width: 50%;
            padding: 12px 20px;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            display: block;
            /* Membuat tombol menjadi block sehingga ada di bawah */
            margin-left: auto;
            margin-right: auto;
            /* Membuat tombol berada di tengah */
        }


        /* Tombol Perbarui Lukisan */
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        /* Tombol Kembali */
        .form-container .back-btn {
            background-color: #ffa500;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .form-container .back-btn:hover {
            background-color: #e68900;
        }

        /* Styling Gambar */
        .form-container img {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>

    <div class="main-content">
        <header class="header">
            <h1>Edit Karya Seni</h1>
            <p>Perbarui detail dari karya seni ini.</p>
        </header>

        <div class="form-container">
            <!-- Form untuk Edit -->
            <form action="{{ route('arts.update', $art->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <label for="name">Nama Lukisan:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $art->name) }}" required>

                <!-- Deskripsi -->
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" rows="5" required>{{ old('description', $art->description) }}</textarea>

                <!-- Harga -->
                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" value="{{ old('price', $art->price) }}" required>

                <!-- Gambar -->
                <label for="image">Gambar:</label>
                <input type="file" id="image" name="image">
                <p>Gambar sebelumnya:</p>
                <img class="art-image-detail" src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->name }}">

                <!-- Tombol Simpan -->
                <button type="submit">Perbarui Lukisan</button>
                <a href="{{ route('arts.show', $art->id) }}" class="back-btn">Kembali ke Detail</a>
            </form>
        </div>
    </div>
@endsection
