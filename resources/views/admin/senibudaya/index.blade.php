@extends('admin.layouts.app')

@section('title', 'Daftar Seni Budaya')

@section('content')
    <div class="container mt-4" data-aos="fade-down">
        <div class="bg-gradient text-center p-4 mb-4 rounded">
            <h1 class="mb-0 text-white">Daftar Seni Budaya</h1>
        </div>

        <a href="{{ route('senbud.create') }}" class="btn btn-success mb-4 shadow-sm btn-add">
            <i class="fas fa-plus"></i> Tambah Seni Budaya
        </a>
        <a href="{{ route('export_excel_senibudaya') }}" class="btn btn-success mb-4 shadow-sm">Export Excel</a>

        
        <a href="{{ route('download_pdf_senbud', $senibudayas->first()->id) }}" class="btn btn-success mb-4 shadow-sm">Export PDF</a>


        @if (Session::has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ Session::get('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

        <div class="row">
            @foreach ($senibudayas as $senibudaya)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-primary card-custom">
                        <div class="card-header text-white text-center"
                            style="background: linear-gradient(90deg, #343a40, #9a8ab5);">
                            <h5 class="mb-0">{{ $senibudaya->nama }}</h5>
                        </div>
                        <div class="card-body">
                            <h6>Pembimbing: <span class="text-muted">{{ $senibudaya->pembimbing }}</span></h6>
                            <p><strong>Jadwal:</strong> <span class="text-muted">{{ $senibudaya->jadwal }}</span></p>
                            <p class="card-text">{{ $senibudaya->deskripsi }}</p>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('senbud.edit', $senibudaya->id) }}" class="btn btn-warning btn-sm rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form id="delete-form-{{ $senibudaya->id }}"
                                action="{{ route('senbud.hapus', $senibudaya->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $senibudaya->id }})">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        body {
            background-color: #e9ecef;
        }

        .bg-gradient {
            background: linear-gradient(90deg, #343a40, #9a8ab5);
        }

        .btn-add {
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #28a745;
            box-shadow: 0 4px 15px rgba(0, 255, 0, 0.2);
        }

        .card-custom {
            background-color: #ffffff;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-custom:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>

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
                    // Mengirimkan form penghapusan
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

@endsection
