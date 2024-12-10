

<style>
    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

    /* Styling Umum */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #e0f7fa);
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 700px;
        margin: 50px auto;
        padding: 30px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h1 {
        font-size: 2.5em;
        font-weight: 600;
        margin-bottom: 20px;
        color: #3f51b5;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    label {
        font-size: 1.1em;
        font-weight: 500;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    input, textarea, select {
        width: 100%;
        padding: 10px 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1em;
        margin-top: 5px;
        outline: none;
        transition: all 0.3s ease;
    }

    input:focus, textarea:focus {
        border-color: #3f51b5;
        box-shadow: 0 0 5px rgba(63, 81, 181, 0.5);
    }

    .form-control {
        font-size: 1em;
    }

    button {
        background: #3f51b5;
        color: white;
        font-size: 1.2em;
        font-weight: 500;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
    }

    button:hover {
        background: #303f9f;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
        background: #f44336;
        color: white;
        font-size: 1.2em;
        font-weight: 300;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 20px;
    }

    input[type="file"] {
        border: none;
        padding: 5px 0;
    }

    .note {
        font-size: 0.9em;
        color: #777;
        margin-top: 10px;
        text-align: left;
    }

    /* Responsive */
    @media (max-width: 768px) {
        h1 {
            font-size: 2em;
        }
    }
</style>

<div class="container">
    <h1>🎨 Tambahkan Karya Seni Baru</h1>
    <form action="{{ route('arts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Karya</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama karya seni" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4"
                placeholder="Ceritakan tentang karya ini..." required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga (Rp)</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Masukkan harga karya seni"
                required>
        </div>
        <div class="form-group">
            <label for="image">Unggah Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            <small class="note">* File yang diunggah harus berupa gambar (JPEG, PNG).</small>
        </div>
        <button type="submit">💾 Simpan Karya</button>
        <div class="btn-back">
            <a href="{{ route('arts.index') }}" class="btn back-btn">Kembali</a>
        </div>
    </form>
</div>

