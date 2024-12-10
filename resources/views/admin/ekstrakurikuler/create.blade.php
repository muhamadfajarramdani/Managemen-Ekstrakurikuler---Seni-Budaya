@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Ekstrakurikuler</h1>
    <form action="{{ route('ekstrakurikuler.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Ekstrakurikuler</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pembimbing">Pembimbing</label>
            <input type="text" name="pembimbing" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jadwal">Jadwal</label>
            <input type="text" name="jadwal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', isset($ekstrakurikuler) ? $ekstrakurikuler->deskripsi : '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
