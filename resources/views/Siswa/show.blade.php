@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Detail Siswa</h3>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Nama Siswa</label>
            <p class="fs-5 fw-bold text-dark">{{ $siswa->nama }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Alamat</label>
            <p class="fs-5 text-dark">{{ $siswa->alamat }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">No Telepon</label>
            <p class="fs-5 text-dark">{{ $siswa->telepon }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('siswas.index') }}" class="btn btn-secondary px-4">Kembali</a>
        </div>
    </div>
</div>
@endsection
