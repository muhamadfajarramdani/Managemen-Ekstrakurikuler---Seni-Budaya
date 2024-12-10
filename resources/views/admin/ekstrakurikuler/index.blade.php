@extends('admin.layouts.app')

@section('title', 'Daftar Ekstrakurikuler')

@section('content')

    <div class="container mt-4">
        <div class="bg-gradient text-center p-4 mb-4 rounded">
            <h1 class="mb-0 text-white">Daftar Ekstrakurikuler</h1>
        </div>

        <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-success mb-4 btn-add">
            <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
        </a>
        <a href="{{ route('export_excel_ekstrakurikuler') }}" class="btn btn-success mb-4">Export Excel</a>



            <a href="{{ route('download_pdf', $ekstrakurikulers->first()->id) }}" class="btn btn-success mb-4">Export Pdf</a>


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
            @foreach ($ekstrakurikulers as $ekstrakurikuler)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $ekstrakurikuler['nama'] }}</h5>
                        </div>
                        <div class="card-body">
                            <h6>Pembimbing: <span>{{ $ekstrakurikuler['pembimbing'] }}</span></h6>
                            <p><strong>Jadwal:</strong> <span>{{ $ekstrakurikuler->jadwal }}</span></p>
                            <p>{{ $ekstrakurikuler->deskripsi }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('ekstrakurikuler.edit', $ekstrakurikuler->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form id="delete-form-{{ $ekstrakurikuler->id }}"
                                action="{{ route('ekstrakurikuler.destroy', $ekstrakurikuler->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $ekstrakurikuler->id }})">
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
        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Card */
        .card {
            background-color: #e0f7fa;
            /* Biru muda yang cerah */
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            /* Bayangan lebih dalam */
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(90deg, #343a40, #9a8ab5);
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .card-body {
            padding: 15px;
            font-size: 14px;
            color: #555;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: right;
        }


        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-4 {
            flex: 0 0 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
        }


        .bg-gradient {
            background: linear-gradient(90deg, #343a40, #9a8ab5);
            padding: 20px;
            border-radius: 10px;
        }

        .text-white {
            color: #fff;
        }


        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .rounded {
            border-radius: 10px;
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
