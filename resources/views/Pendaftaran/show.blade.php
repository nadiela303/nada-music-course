@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Detail Pendaftaran Kursus</h3>

        <div class="mb-3">
            <label class="form-label text-muted fw-semibold">Nama Siswa</label>
            <!-- Diubah dari ->nama jadi ->nama_siswa -->
            <p class="fs-5 fw-bold text-dark">{{ $pendaftaran->siswa->nama_siswa ?? '-' }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted fw-semibold">Program Kursus</label>
            <p class="fs-5 fw-bold text-dark">{{ $pendaftaran->program->nama_program ?? '-' }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted fw-semibold">Tanggal Pendaftaran</label>
            <p class="fs-5 fw-bold text-dark">{{ $pendaftaran->tanggal_daftar ?? '-' }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted fw-semibold">Status</label>
            <p>
                <span class="badge {{ $pendaftaran->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $pendaftaran->status }}
                </span>
            </p>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('pendaftarans.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <a href="{{ route('pendaftarans.edit', $pendaftaran->id) }}" class="btn btn-warning px-4 fw-semibold text-white">Edit Data</a>
        </div>
    </div>
</div>
@endsection
