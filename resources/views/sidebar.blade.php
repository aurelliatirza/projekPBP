<!-- resources/views/sidebar.blade.php -->
@php
    use Illuminate\Support\Facades\Auth;
 
    // Mendapatkan user yang terautentikasi
    $user = Auth::user();  // Correct method to get the currently authenticated user

    // Memastikan user ada sebelum mencoba mengakses roles
    $userRole = $user ? ($user->roles1 ?? '') : '';
    $userRole2 = $user ? ($user->roles2 ?? '') : '';
@endphp

<div class="sidebar p-4 text-white position-relative">
    @if ($userRole == 'akademik')
        <!-- SIDEBAR AKADEMIK -->
        <div class="text-center mb-4">
            <div class="profile-img rounded-circle mx-auto mb-3">
                <!-- Profile image placeholder -->
            </div>
            <h2 class="fs-4 fw-bold">{{ $akademik->nama }}</h2>
            <p class="small opacity-75">NIP. {{ $akademik->nip }}</p>
            <p class="small opacity-75">Tenaga Kependidikan</p>
            <p class="small opacity-75">Periode</p>
        </div>

        <nav class="nav flex-column gap-2 mb-4">
            <a href="#" class="nav-link active rounded d-flex align-items-center">
                <span class="material-icons me-3">home</span>
                Beranda
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">description</span>
                Pembagian Ruang
            </a>
        </nav>

        @elseif ($userRole2 == 'dekan')
        <!-- SIDEBAR DEKAN -->
        <div class="text-center mb-4">
            <div class="profile-img rounded-circle mx-auto mb-3">
                <!-- Profile image placeholder -->
            </div>
            <h2 class="fs-4 fw-bold">{{ $dekan->dosen_nama }}</h2>
            <p class="small opacity-75">NIP. {{ $dekan->nip }}</p>
            {{-- <p class="small opacity-75">{{ $dekan->prodi_nama }}</p> --}}
            <p class="small opacity-75">Fisika</p>
        </div>

        <nav class="nav flex-column gap-2 mb-4">
            <a href="#" class="nav-link active rounded d-flex align-items-center">
                <span class="material-icons me-3">home</span>
                Beranda
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">description</span>
                Persetujuan Ruang
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">assessment</span>
                Persetujuan Jadwal Kuliah
            </a>
        </nav>


    @elseif ($userRole == 'dosen' && $userRole2 == '')
        <!-- SIDEBAR DOSEN -->
        <div class="text-center mb-4">
            <div class="profile-img rounded-circle mx-auto mb-3">
                <!-- Profile image placeholder -->
            </div>
            <h2 class="fs-4 fw-bold">{{ $dosen->dosen_nama }}</h2>
            <p class="small opacity-75">NIP. {{ $dosen->nip }}</p>
            <p class="small opacity-75">{{ $dosen->prodi_nama }}</p>
        </div>

        <nav class="nav flex-column gap-2 mb-4">
            <a href="#" class="nav-link active rounded d-flex align-items-center">
                <span class="material-icons me-3">home</span>
                Beranda
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">description</span>
                IRS Mahasiswa
            </a>
        </nav>

    @elseif ($userRole2 == 'kaprodi')
        <!-- SIDEBAR KAPRODI -->
        <div class="text-center mb-4">
            <div class="profile-img mb-3">
                <span class="material-icons" style="font-size: 48px; color: var(--primary-color)">person</span>
                <!-- Profile image placeholder -->
            </div>
            <h2 class="fs-4 fw-bold">{{ $kaprodi->dosen_nama}}</h2>
            <p class="small opacity-75">NIP. {{ $kaprodi->nip }}</p>
            <p class="small opacity-75">{{ $kaprodi->prodi_nama }}</p>
        </div>

        <nav class="nav flex-column gap-2 mb-4">
            <a href="#" class="nav-link active rounded d-flex align-items-center">
                <span class="material-icons me-3">home</span>
                Beranda
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">description</span>
                Daftar Prodi
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center p-3">
                <span class="material-icons me-3">assessment</span>
                Hasil Studi
            </a>
        </nav>

    @elseif ($userRole == 'mahasiswa')
        <!-- SIDEBAR MAHASISWA -->
        <div class="text-center mb-4">
            <div class="profile-img mb-3">
                <span class="material-icons" style="font-size: 48px; color: var(--primary-color)">person</span>
            </div>
            <h2 class="fs-4 fw-bold">{{ $mahasiswa->nama_mhs }}</h2>
            <p class="small opacity-75">NIM. {{ $mahasiswa->nim }}</p>
            <p class="small opacity-75">S1 {{ $mahasiswa->prodi_nama }}</p>
            <p class="small opacity-75">Dosen Wali: {{ $mahasiswa->nama_doswal }}</p>
            <p class="small opacity-75">NIP. {{ $mahasiswa->nip }}</p>
        </div>

        <nav class="nav flex-column gap-2 mb-4">
            <a href="#" class="nav-link active rounded d-flex align-items-center">
                <span class="material-icons me-3">home</span>
                Beranda
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">description</span>
                Rencana Studi
            </a>
            <a href="#" class="nav-link rounded d-flex align-items-center">
                <span class="material-icons me-3">assessment</span>
                Hasil Studi
            </a>
        </nav>
    @endif

    <!-- Logout Button -->
    <button class="btn btn-logout position-absolute bottom-0 mb-4 rounded-3">Keluar</button>

    <!-- Wave decoration -->
    <div class="wave-decoration"> 
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 35%; width: 35%;">
            <path d="M0.00,49.98 C150.00,150.00 349.20,-49.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg>
    </div>
</div>