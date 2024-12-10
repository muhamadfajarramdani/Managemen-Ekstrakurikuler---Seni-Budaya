@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Seni Budaya</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('senbud.tambah_senibudaya') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pembimbing">pembimbing</label>
            <input type="text" name="pembimbing" value="{{ old('pembimbing') }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jadwal">jadwal</label>
            <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('senbud.data') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
