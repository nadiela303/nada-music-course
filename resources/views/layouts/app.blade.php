<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - Nada Music Course by Diela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 85px;
        }
        body {
            position: relative;
            font-family: 'Poppins', sans-serif;
            background-color: #f6f2ff;
            background-image: radial-gradient(#cbb9ff 1.2px, transparent 1.2px);
            background-size: 22px 22px;
            color: #3b324c;
            overflow-x: hidden;
        }
        .navbar-pastel {
            background-color: rgba(255, 255, 255, 0.97);
            border-bottom: 2px solid #ede6fa;
            backdrop-filter: blur(6px);
        }
        .brand-pastel {
            color: #6b48e8 !important;
        }
        .nav-link-pastel {
            color: #55496b !important;
            font-weight: 500;
            border-radius: 8px;
            padding: 6px 14px !important;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }
        .nav-link-pastel:hover, .nav-link-pastel.active {
            background-color: #6b48e8;
            color: #ffffff !important;
            box-shadow: 0 3px 10px rgba(107, 72, 232, 0.22);
        }
        .hero-banner {
            background: linear-gradient(120deg, rgba(107, 72, 232, 0.9), rgba(157, 123, 255, 0.85));
            color: #ffffff;
            padding: 26px 0;
            margin-bottom: 24px;
            border-bottom: 2px solid #dfd4ff;
        }
        .btn-pastel {
            background-color: #9d7bff;
            border-color: #9d7bff;
            color: #ffffff;
        }
        .btn-pastel:hover {
            background-color: #8761f5;
            border-color: #8761f5;
            color: #ffffff;
        }
        .btn-pastel-soft {
            background-color: #efe9ff;
            border-color: #dfd4ff;
            color: #6946df;
        }
        .btn-pastel-soft:hover {
            background-color: #e2d7ff;
            color: #5734cf;
        }
        .card-pastel {
            background-color: #ffffff;
            border: 1px solid #ece5fa;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(138, 108, 224, 0.08);
        }

        /* Hiasan nada-nada di pinggir kiri & kanan */
        .bg-music-decor {
            position: fixed;
            z-index: 1;
            pointer-events: none;
            user-select: none;
            color: #6b48e8;
            line-height: 1;
        }

        /* Seragamkan semua tabel di seluruh halaman */
        .table {
            border-color: #e4dcf7 !important;
            margin-bottom: 0 !important;
        }
        .table > thead > tr > th {
            background-color: #e8dffb !important;
            color: #473a63 !important;
            font-weight: 600;
            border-color: #d9ccf7 !important;
            padding: 12px 14px;
            vertical-align: middle;
        }
        .table > tbody > tr > td {
            border-color: #ece5fa !important;
            padding: 12px 14px;
            vertical-align: middle;
            color: #3b324c;
            background-color: #ffffff;
        }
        .table > tbody > tr:nth-child(even) > td {
            background-color: #faf8ff !important;
        }

        /* Tombol aksi tabel versi pastel soft */
        .table .btn-info {
            background-color: #d7effa !important;
            border-color: #bce4f7 !important;
            color: #1e5a78 !important;
            font-weight: 500;
        }
        .table .btn-info:hover {
            background-color: #c2e5f5 !important;
            border-color: #a7d9f0 !important;
            color: #16465e !important;
        }

        .table .btn-warning {
            background-color: #fff1c9 !important;
            border-color: #f7e2a8 !important;
            color: #7a5400 !important;
            font-weight: 500;
        }
        .table .btn-warning:hover {
            background-color: #fce7ad !important;
            border-color: #f2d78c !important;
            color: #5e4000 !important;
        }

        .table .btn-danger {
            background-color: #fde0e6 !important;
            border-color: #f9c4cf !important;
            color: #8c243b !important;
            font-weight: 500;
        }
        .table .btn-danger:hover {
            background-color: #fac9d3 !important;
            border-color: #f5aab9 !important;
            color: #6e182b !important;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#mainPastelNav" data-bs-offset="110" tabindex="0">

    {{-- Hiasan nada-nada di pinggir kiri & kanan --}}
    <div class="bg-music-decor" style="top: 150px; left: 26px; font-size: 2rem; opacity: 0.22; transform: rotate(-12deg);">♪</div>
    <div class="bg-music-decor" style="top: 320px; left: 38px; font-size: 1.6rem; opacity: 0.18; transform: rotate(10deg);">♫</div>
    <div class="bg-music-decor" style="top: 500px; left: 24px; font-size: 2.2rem; opacity: 0.2; transform: rotate(-8deg);">♬</div>
    <div class="bg-music-decor" style="bottom: 85px; left: 32px; font-size: 1.8rem; opacity: 0.22; transform: rotate(12deg);">♪ ♫</div>

    <div class="bg-music-decor" style="top: 165px; right: 28px; font-size: 2.1rem; opacity: 0.22; transform: rotate(14deg);">♫</div>
    <div class="bg-music-decor" style="top: 345px; right: 36px; font-size: 1.7rem; opacity: 0.18; transform: rotate(-11deg);">♪</div>
    <div class="bg-music-decor" style="top: 525px; right: 26px; font-size: 2rem; opacity: 0.2; transform: rotate(9deg);">♩</div>
    <div class="bg-music-decor" style="bottom: 40px; right: 30px; font-size: 1.8rem; opacity: 0.24; letter-spacing: 4px;">♪ ♫ ♬</div>

    @auth
    <nav id="mainPastelNav" class="navbar navbar-expand-lg navbar-pastel sticky-top py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold fs-5 brand-pastel m-0 d-flex align-items-center gap-2" href="{{ route('beranda') }}">
                <i class="bi bi-music-note-beamed"></i>
                <span>Nada Music Course</span>
            </a>

            <div class="navbar-nav flex-row align-items-center gap-1 gap-md-2">
                <a class="nav-link nav-link-pastel {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Beranda</span>
                </a>
                <a class="nav-link nav-link-pastel {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="{{ route('programs.index') }}">
                    <i class="bi bi-music-note-list"></i>
                    <span>Program</span>
                </a>
                <a class="nav-link nav-link-pastel {{ request()->routeIs('pendaftarans.*') ? 'active' : '' }}" href="{{ route('pendaftarans.index') }}">
                    <i class="bi bi-clipboard-check-fill"></i>
                    <span>Pendaftaran</span>
                </a>
                <a class="nav-link nav-link-pastel {{ request()->routeIs('siswas.*') ? 'active' : '' }}" href="{{ route('siswas.index') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Siswa</span>
                </a>
                <a class="btn btn-pastel-soft btn-sm fw-semibold ms-2 px-3 rounded-pill d-inline-flex align-items-center gap-1" href="/sesi/logout" onclick="return confirm('Yakin ingin logout?')">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <section class="hero-banner text-center">
        <div class="container">
            <h4 class="fw-bold mb-1">@yield('banner_title', '♪ Nada Music Course by Diela')</h4>
            <p class="mb-0 small opacity-90">@yield('banner_subtitle', 'Piano • Gitar • Vokal • Choir — Ruang Belajar Musik')</p>
        </div>
    </section>
    @endauth

    <div class="container mt-3 mb-5 position-relative" style="z-index: 2;">
        @yield('content')

        <footer class="text-center text-muted small mt-5 pt-2">
            Nada Music Course • by Diela
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
