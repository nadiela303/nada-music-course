@extends('layouts.app')

@section('title', 'Beranda')
@section('banner_title', '♪ Nada Music Course by Diela')
@section('banner_subtitle', 'Piano • Gitar • Vokal • Choir — Ruang Belajar Musik')

@section('content')
    {{-- Bagian 1: Sambutan & Tombol Ajak Daftar --}}
    <section id="sec-sambutan" class="card card-pastel p-4 mb-4 text-center">
        <span class="badge rounded-pill btn-pastel-soft mb-2 px-3 py-2 mx-auto">
            ♪ Selamat Datang
        </span>
        <h4 class="fw-bold mb-2" style="color: #5538c7;">Ruang Belajar Musik untuk Semua</h4>
        <p class="text-muted mb-3 mx-auto" style="max-width: 620px;">
            Pilih kelas Piano, Gitar, Vokal, atau Choir dan nikmati proses belajar musik secara bertahap.
        </p>
        <div>
            <a href="{{ route('pendaftarans.index') }}" class="btn btn-pastel px-4 py-2 rounded-3 fw-bold">
                ♫ Daftar Kelas Sekarang
            </a>
        </div>
    </section>

    {{-- Bagian 2: Pilihan Kelas Musik --}}
    <section id="sec-program" class="card card-pastel p-4 mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="fw-bold m-0" style="color: #5538c7;">
                <i class="bi bi-music-note-beamed me-1"></i> Pilihan Kelas Musik
            </h5>
            <a href="{{ route('programs.index') }}" class="btn btn-pastel-soft btn-sm rounded-pill px-3 fw-medium">
                Lihat Semua Program →
            </a>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="p-3 rounded-4 border h-100" style="background-color: #faf8ff; border-color: #e7defa !important;">
                    <div class="fw-bold mb-1" style="color: #6b48e8;">♪ Piano</div>
                    <p class="small text-muted mb-0">Latihan teknik jari, membaca notasi, dan harmoni lagu dari dasar.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-3 rounded-4 border h-100" style="background-color: #faf8ff; border-color: #e7defa !important;">
                    <div class="fw-bold mb-1" style="color: #6b48e8;">♫ Gitar</div>
                    <p class="small text-muted mb-0">Penguasaan chord, ritme petikan/genjrengan, serta melodi iringan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-3 rounded-4 border h-100" style="background-color: #faf8ff; border-color: #e7defa !important;">
                    <div class="fw-bold mb-1" style="color: #6b48e8;">♬ Vokal</div>
                    <p class="small text-muted mb-0">Teknik pernapasan, pitch control, artikulasi, dan ekspresi bernyanyi.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-3 rounded-4 border h-100" style="background-color: #faf8ff; border-color: #e7defa !important;">
                    <div class="fw-bold mb-1" style="color: #6b48e8;">♩ Choir</div>
                    <p class="small text-muted mb-0">Harmonisasi suara kelompok, kekompakan tempo, dan latihan ansambel.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian 3: Akses Cepat Data Sistem --}}
    <section id="sec-akses" class="card card-pastel p-4 mb-4">
        <h5 class="fw-bold mb-3" style="color: #5538c7;">
            <i class="bi bi-compass me-1"></i> Akses Cepat Data Sistem
        </h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('programs.index') }}" class="btn btn-pastel-soft rounded-pill px-4 fw-medium">
                <i class="bi bi-music-note-list me-1"></i> Data Program
            </a>
            <a href="{{ route('pendaftarans.index') }}" class="btn btn-pastel-soft rounded-pill px-4 fw-medium">
                <i class="bi bi-clipboard-check-fill me-1"></i> Data Pendaftaran
            </a>
            <a href="{{ route('siswas.index') }}" class="btn btn-pastel-soft rounded-pill px-4 fw-medium">
                <i class="bi bi-people-fill me-1"></i> Data Siswa
            </a>
        </div>
    </section>

    {{-- Bagian 4: Kelas Ini Pas Untuk vs Sebaiknya Tunda Dulu --}}
    <section id="sec-kecocokan" class="mb-2">
        <div class="row g-4">
            {{-- Kotak Kiri: Pas Untuk --}}
            <div class="col-lg-6">
                <div class="p-4 rounded-4 h-100" style="background-color: #eefaf3; border: 1.5px solid #bfe8cf;">
                    <h5 class="fw-bold mb-3" style="color: #1f6b43;">
                        Kelas ini pas banget buat kamu yang:
                    </h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #c8eed8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #2ea866; flex-shrink: 0;">✓</span>
                            <span class="small fw-medium" style="color: #244e38;">Baru mulai dari nol dan ingin belajar musik step-by-step sampai bisa</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #c8eed8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #2ea866; flex-shrink: 0;">✓</span>
                            <span class="small fw-medium" style="color: #244e38;">Suka melodi yang lembut dan ingin main musik dengan penuh perasaan</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #c8eed8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #2ea866; flex-shrink: 0;">✓</span>
                            <span class="small fw-medium" style="color: #244e38;">Ingin mengasah bakat musik anak lewat bimbingan yang santai tapi serius</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #c8eed8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #2ea866; flex-shrink: 0;">✓</span>
                            <span class="small fw-medium" style="color: #244e38;">Ingin lebih percaya diri saat bermain Piano, Gitar, Vokal, maupun Choir</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kotak Kanan: Sebaiknya Tunda Dulu --}}
            <div class="col-lg-6">
                <div class="p-4 rounded-4 h-100" style="background-color: #fff1f4; border: 1.5px solid #f7c7d2;">
                    <h5 class="fw-bold mb-3" style="color: #8f2942;">
                        Sebaiknya tunda dulu kalau kamu:
                    </h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #f9ced8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #de5b76; flex-shrink: 0;">✕</span>
                            <span class="small fw-medium" style="color: #692233;">Belum sempat meluangkan waktu sebentar untuk latihan rutin</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #f9ced8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #de5b76; flex-shrink: 0;">✕</span>
                            <span class="small fw-medium" style="color: #692233;">Kurang nyaman dengan sesi praktik langsung saat belajar</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #f9ced8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #de5b76; flex-shrink: 0;">✕</span>
                            <span class="small fw-medium" style="color: #692233;">Mengharapkan hasil instan tanpa menikmati proses latihannya</span>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm" style="border: 1px solid #f9ced8; width: fit-content; max-width: 100%;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width: 20px; height: 20px; font-size: 0.72rem; background-color: #de5b76; flex-shrink: 0;">✕</span>
                            <span class="small fw-medium" style="color: #692233;">Belum siap berkomitmen mengikuti kelas secara rutin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
