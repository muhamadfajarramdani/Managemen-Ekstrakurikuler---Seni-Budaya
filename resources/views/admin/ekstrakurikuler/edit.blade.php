@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ekstrakurikuler</h1>
        <form action="{{ route('ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Input untuk nama ekstrakurikuler -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $ekstrakurikuler->nama }}">
            </div>

            <!-- Input untuk pembimbing -->
            <div class="mb-3">
                <label for="pembimbing" class="form-label">Pembimbing</label>
                <input type="text" name="pembimbing" class="form-control" id="pembimbing" value="{{ $ekstrakurikuler->pembimbing }}">
            </div>

            <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="text" name="jadwal" value="{{ $ekstrakurikuler->jadwal }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', isset($ekstrakurikuler) ? $ekstrakurikuler->deskripsi : '') }}</textarea>
            </div>

            <!-- Tombol submit -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
