@extends('layouts.app')

@section('title', 'Data Pendaftaran')

@section('content')
<div class="card-pastel p-4 position-relative overflow-hidden">
    <span class="position-absolute user-select-none" style="top: 14px; right: 20px; font-size: 1.8rem; color: #8761f5; opacity: 0.14;">♫</span>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 position-relative">
        <div>
            <h3 class="fw-bold mb-1" style="color: #3b324c;">
                <span style="color: #7c5dfa;">♪</span> Data Pendaftaran Kursus
            </h3>
            <p class="text-muted small mb-0">
                Relasi pendaftaran siswa dan pilihan program di Nada Music Course by Diela.
            </p>
        </div>

        <a href="{{ route('pendaftarans.create') }}" class="btn btn-pastel fw-semibold px-3 py-2 rounded-3">
            + Tambah Pendaftaran
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 px-3 small rounded-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive position-relative">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Siswa</th>
                    <th>Program Musik</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th style="width: 155px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftarans as $index => $pendaftaran)
                @php
                    $namaSiswa = $pendaftaran->siswa->nama_siswa
                        ?? $pendaftaran->siswa->nama
                        ?? $pendaftaran->siswa->name
                        ?? $pendaftaran->nama_siswa
                        ?? '-';

                    $namaProgram = $pendaftaran->program->nama_program
                        ?? $pendaftaran->program->nama
                        ?? $pendaftaran->nama_program
                        ?? '-';

                    $rawTanggal = $pendaftaran->tanggal_daftar
                        ?? $pendaftaran->tanggal
                        ?? $pendaftaran->created_at
                        ?? null;

                    if ($rawTanggal) {
                        try {
                            $tanggalTampil = \Carbon\Carbon::parse($rawTanggal)->translatedFormat('d M Y');
                        } catch (\Exception $e) {
                            $tanggalTampil = (string) $rawTanggal;
                        }
                    } else {
                        $tanggalTampil = '-';
                    }

                    $status = $pendaftaran->status ?? 'Terdaftar';
                    $statusLower = strtolower($status);

                    if (str_contains($statusLower, 'aktif') || str_contains($statusLower, 'lunas') || str_contains($statusLower, 'terdaftar') || str_contains($statusLower, 'diterima')) {
                        $badgeBg = '#e8f7ee';
                        $badgeColor = '#22543d';
                    } elseif (str_contains($statusLower, 'batal') || str_contains($statusLower, 'tolak') || str_contains($statusLower, 'nonaktif')) {
                        $badgeBg = '#fdecef';
                        $badgeColor = '#7a233d';
                    } else {
                        $badgeBg = '#f1ecff';
                        $badgeColor = '#6946df';
                    }
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-semibold">{{ $namaSiswa }}</td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #f1ecff; color: #6946df;">
                            ♪ {{ $namaProgram }}
                        </span>
                    </td>
                    <td class="small">{{ $tanggalTampil }}</td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: {{ $badgeBg }}; color: {{ $badgeColor }};">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="{{ route('pendaftarans.show', $pendaftaran->id) }}" class="btn btn-info btn-sm text-white fw-semibold">Detail</a>
                            <div class="d-flex gap-1">
                                <a href="{{ route('pendaftarans.edit', $pendaftaran->id) }}" class="btn btn-warning btn-sm text-white fw-semibold flex-fill">Edit</a>
                                <form action="{{ route('pendaftarans.destroy', $pendaftaran->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin hapus pendaftaran ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-semibold w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        Belum ada data pendaftaran. ♪
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
