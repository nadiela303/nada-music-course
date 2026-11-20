@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Detail Program Kursus</h3>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Nama Program</label>
            <p class="fs-5 fw-bold text-dark">{{ $program->nama_program }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Deskripsi</label>
            <p class="fs-5 text-dark">{{ $program->deskripsi }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Biaya</label>
            <!-- Ubah $program->biaya menjadi $program->harga di bawah ini -->
            <p class="fs-5 text-dark">Rp {{ number_format($program->harga, 0, ',', '.') }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('programs.index') }}" class="btn btn-secondary px-4">Kembali</a>
        </div>
    </div>
</div>
@endsection
