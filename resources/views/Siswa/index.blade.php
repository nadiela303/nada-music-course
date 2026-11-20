@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="card-pastel p-4 position-relative overflow-hidden">
    <span class="position-absolute user-select-none" style="top: 14px; right: 20px; font-size: 1.8rem; color: #8761f5; opacity: 0.14;">♪</span>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 position-relative">
        <div>
            <h3 class="fw-bold mb-1" style="color: #3b324c;">
                <span style="color: #7c5dfa;">♬</span> Data Siswa Kursus
            </h3>
            <p class="text-muted small mb-0">
                Daftar siswa yang terdaftar di Nada Music Course by Diela.
            </p>
        </div>

        <a href="{{ route('siswas.create') }}" class="btn btn-pastel fw-semibold px-3 py-2 rounded-3">
            + Tambah Siswa
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
                    <th>No. HP / Kontak</th>
                    <th>Alamat</th>
                    <th style="width: 155px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $index => $siswa)
                @php
                    $namaSiswa = $siswa->nama_siswa ?? $siswa->nama ?? $siswa->name ?? '-';
                    $kontak = $siswa->no_hp ?? $siswa->telepon ?? $siswa->hp ?? $siswa->email ?? '-';
                    $alamat = $siswa->alamat ?? '-';
                    $initial = mb_strtoupper(mb_substr(trim($namaSiswa), 0, 1));
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span
                                class="d-inline-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0"
                                style="width: 34px; height: 34px; background-color: #f1ecff; color: #6946df; font-size: 0.85rem;"
                            >
                                {{ $initial ?: '♪' }}
                            </span>
                            <span class="fw-semibold">{{ $namaSiswa }}</span>
                        </div>
                    </td>
                    <td>
                        @if($kontak !== '-')
                            <span class="badge rounded-pill px-3 py-2 fw-medium" style="background-color: #f6f2ff; color: #4c3f6d; border: 1px solid #e4dafc;">
                                {{ $kontak }}
                            </span>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="small text-muted" style="max-width: 280px; line-height: 1.55;">
                        {{ \Illuminate\Support\Str::limit($alamat, 80) }}
                    </td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="{{ route('siswas.show', $siswa->id) }}" class="btn btn-info btn-sm text-white fw-semibold">Detail</a>
                            <div class="d-flex gap-1">
                                <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-warning btn-sm text-white fw-semibold flex-fill">Edit</a>
                                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin hapus data siswa ini?')">
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
                    <td colspan="5" class="text-center text-muted py-4">
                        Belum ada data siswa. ♪
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
