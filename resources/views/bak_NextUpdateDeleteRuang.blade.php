<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP-IRS Dashboard</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- CSS dan JS dari public -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" type="text/css">
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
    <style>
        .btn-teal {
            width: 45px;
            height: 45px;
            background-color: #028391;
            color: #ffffff;
        }
        .text-blue {
            color: #456DDB;
        }
        .card-body {
            background-color: #FFF2E5;
        }
        .bg-teal {
            background-color: #028391;
        }
        .btn-cyan {
            background-color: #67C3CC;
        }
        .btn-cyan:hover {
            background-color: #028391;
        }
        .table thead th, .table tbody td {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            font-size: 12px;
        }
        .d-flex.gap-3 {
            gap: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <x-sidebar-akademik :akademik="$akademik"></x-sidebar-akademik>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 fw-bold">Selamat Datang 👋</h1>
                    <p class="text-muted">Semester Akademik Sekarang</p>
                </div>
                <div class="position-relative">
                    <button class="btn btn-teal rounded-circle p-2">
                        <span class="material-icons">notifications</span>
                    </button>
                    <span class="notification-badge"></span>
                </div>
            </div>

            <!-- Progress Cards -->
            <div class="card shadow-sm">
                <h5 class="card-header bg-teal text-white text-center">Tinjau dan Hapus Ruang Kelas</h5>
                <div class="card-body d-flex flex-column">
                    <!-- Form Input Ruang -->
                    <div class="mt-4">
                        <form id="formInputRuang">
                            <div class="mb-3">
                                <label for="inputIdRuang" class="form-label">ID Ruang</label>
                                <input type="number" class="form-control" id="inputIdRuang" placeholder="Masukkan ID Ruang">
                            </div>
                            <div class="mb-3">
                                <label for="inputNamaRuang" class="form-label">Nama Ruang</label>
                                <input type="text" class="form-control" id="inputNamaRuang" placeholder="Masukkan Nama Ruang">
                            </div>
                            <div class="mb-3">
                                <label for="inputKapasitasRuang" class="form-label">Kapasitas Ruang</label>
                                <input type="number" class="form-control" id="inputKapasitasRuang" placeholder="Masukkan Kapasitas Ruang">
                            </div>
                            <button type="submit" class="btn btn-cyan w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Validation Logic -->
    <script>
        $(document).ready(function() {
            $('#formInputRuang').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission

                // Get input values
                const idRuang = parseInt($('#inputIdRuang').val().trim(), 10);
                const namaRuang = $('#inputNamaRuang').val().trim();
                const kapasitasRuang = parseInt($('#inputKapasitasRuang').val().trim(), 10);

                // Validation
                let errors = [];

                // Validate ID Ruang
                if (isNaN(idRuang) || idRuang <= 0) {
                    errors.push('ID Ruang harus berupa angka positif.');
                }

                // Validate Nama Ruang
                const namaRuangRegex = /^[a-k][0-9]{3}$/;
                if (!namaRuangRegex.test(namaRuang)) {
                    errors.push('Nama Ruang harus 4 karakter, diawali huruf "a-k", diikuti 3 digit angka.');
                }

                // Validate Kapasitas Ruang
                if (isNaN(kapasitasRuang) || kapasitasRuang < 1 || kapasitasRuang > 100) {
                    errors.push('Kapasitas Ruang harus berupa angka antara 1 hingga 100.');
                }

                // Display errors or success
                if (errors.length > 0) {
                    alert('Error:\n' + errors.join('\n'));
                } else {
                    alert(`Data berhasil disimpan:\nID Ruang: ${idRuang}\nNama Ruang: ${namaRuang}\nKapasitas Ruang: ${kapasitasRuang}`);
                    $(this)[0].reset(); // Reset the form
                }
            });
        });
    </script>
</body>
</html>
