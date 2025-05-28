
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Konseling</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    @if (Route::has('login'))
    <div class="sm:right-0 p-6 text-right">
        @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Beranda</a>
        @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Masuk Akun</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Daftar Akun</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="max-w-7xl mx-auto">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="..">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="..">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="..">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="flex max-w-7xl mx-auto gap-10 p-10">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b>Informasi Poin Pelanggaran</b></h5>
                <p class="card-text">Menampilkan data-data poin pelanggaran tata tertib di SMKN 1 Bojongpicung</p><br>
                <a href="{{ Storage::url('public/pdf/Data Tatib SMK.pdf') }}" target="_blank" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b>Informasi Konseling</b></h5>
                <p class="card-text">Menampilkan informasi terkait kesehatan mental untuk siswa</p><br>
                <a href="#" class="btn btn-primary">Lihat Data</a>
            </div>
        </div>
    </div>
</body>
</html>
