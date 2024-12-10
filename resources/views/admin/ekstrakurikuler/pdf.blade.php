<div class="container mt-4" data-aos="fade-down">
    <div class="bg-gradient text-center p-4 mb-4 rounded">
        <h1 class="mb-0 text-white">Daftar Ekstrakurikuler</h1>
    </div>

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
                <div class="card shadow-sm border-primary card-custom">
                    <div class="card-header text-white text-center"
                        style="background: linear-gradient(90deg, #343a40, #9a8ab5);">
                        <h5 class="mb-0">{{ $ekstrakurikuler->nama }}</h5>
                    </div>
                    <div class="card-body">
                        <h6>Pembimbing: <span class="text-muted">{{ $ekstrakurikuler->pembimbing }}</span></h6>
                        <p><strong>Jadwal:</strong> <span class="text-muted">{{ $ekstrakurikuler->jadwal }}</span></p>
                        <p class="card-text">{{ $ekstrakurikuler->deskripsi }}</p>
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

    .text-gradient {
        background: linear-gradient(90deg, #343a40, #9a8ab5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 2.5rem;
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data ini tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form after confirmation
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
