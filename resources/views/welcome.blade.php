<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Konseling</title>

    <!-- Fonts & Bootstrap -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vite Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .caption-left {
            position: absolute;
            top: 15%;
            left: 5%;
            color: black;
            width: 55%;
            max-width: 1000px;
            z-index: 10;
            margin-left: 40px;
        }

        .caption-left p {
            font-size: 1rem;
            font-style: italic;
            line-height: 1.6;
            word-break: normal;
            white-space: normal;
        }

        .heading-slider {
            font-size: 1.4rem;
            line-height: 1.4;
            word-break: normal;
            white-space: normal;
        }

        @media (max-width: 768px) {
            .caption-left {
                width: 90%;
                left: 5%;
                top: 10%;
            }

            .caption-left h4 {
                font-size: 1.2rem;
            }

            .caption-left p {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body class="antialiased">
    @if (Route::has('login'))
    <div class="sm:right-0 p-6 text-end">
        @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600">Beranda</a>
        @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600">Masuk Akun</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600">Daftar Akun</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="container-fluid px-0">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active position-relative">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="...">
                    <div class="caption-left">
                        <h3 class="fw-bold text-uppercase mb-3 heading-slider">
                            SISTEM KONSELING DIGITAL DI SMK NEGERI 1 BOJONGPICUNG DENGAN RUJUKAN KE SPESIALIS KEJIWAAN
                        </h3>
                        <p class="fst-italic">
                            Sebuah WEB Layanan Bimbingan dan Konseling <br>
                            di Sekolah dan Spesialis Kejiwaan (Seperti Psikolog dan Psikiater). <br>
                            Berfokus pada kesehatan mental siswa/remaja melalui berbagai layanan konseling dan terapi.
                        </p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider/BK.png') }}" class="d-block w-100 h-auto" alt="...">
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

    <div class="max-w-7xl mx-auto px-5 py-10">
        <div class="flex flex-wrap md:flex-nowrap gap-10 items-start">
            <div class="card w-80 flex-shrink-0">
                <div class="card-body">
                    <h5 class="card-title font-bold">Informasi Poin Pelanggaran</h5>
                    <p class="card-text">
                        Menampilkan data-data poin pelanggaran tata tertib di SMKN&nbsp;1&nbsp;Bojongpicung
                    </p>
                    <a href="{{ Storage::url('public/pdf/Data Tatib SMK.pdf') }}" target="_blank" class="btn btn-success mt-3">
                        Lihat Data
                    </a>
                </div>
            </div>

            <div class="card w-80 flex-shrink-0">
                <div class="card-body">
                    <h5 class="card-title font-bold">Informasi Konseling</h5>
                    <p class="card-text">
                        Menampilkan informasi terkait kesehatan mental untuk siswa SMKN&nbsp;1&nbsp;Bojongpicung
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Lihat Data</a>
                </div>
            </div>

            <div class="flex-1 text-start">
                <h5 class="text-xl font-extrabold text-purple-700">Hai Sobat BK!!</h5>
                <p class="text-lg text-gray-800 font-medium">
                    Butuh teman bicara atau bantuan? <span class="text-indigo-600 font-bold">Kami siap mendampingimu</span> melalui layanan konseling <span class="text-indigo-600 font-semibold">online dan offline.</span>
                </p>
                <ol class="ps-4 mt-3 text-gray-700 leading-relaxed">
                    <li><b class="text-gray-900">Masalah Belajar:</b> Kesulitan belajar, cara belajar efektif, atau tugas yang menumpuk</li>
                    <li><b class="text-gray-900">Karier:</b> Bingung setelah lulus mau kerja, wirausaha / kuliah dimana?</li>
                    <li><b class="text-gray-900">Sosial:</b> Masalah pertemanan, pergaulan, atau komunikasi</li>
                    <li><b class="text-gray-900">Pribadi:</b> Kepercayaan diri, masalah keluarga, atau stress</li>
                </ol>
                <p class="mt-3 text-gray-800">
                    Silahkan Datang ke BK. Kami Siap Membimbing dengan Sepenuh Hati...
                    <br>
                    <span class="font-bold text-green-700">Guru BK Peduli Siswa dalam Masalah dan Perkembangan Siswa</span>
                </p>
            </div>
        </div>
    </div>
</body>

</html>