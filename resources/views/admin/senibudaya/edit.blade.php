@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Seni Budaya</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="">

    </form>

    <form action="{{ route('senbud.edit.formulir',  $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
        </div>
        <div class="form-group">
            <label for="nis">Pembimbing</label>
            <input type="text" name="pembimbing" class="form-control" value="{{ old('nis', $user->pembimbing) }}">
        </div>
        <div class="form-group">
            <label for="rombel">Jadwal</label>
            <input type="text" name="jadwal" class="form-control" value="{{ old('rombel', $user->jadwal) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
