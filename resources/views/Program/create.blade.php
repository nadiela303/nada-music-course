@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Tambah Program Kursus</h3>
        <form action="{{ route('programs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Program</label>
                <input type="text" name="nama_program" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Biaya (Rp)</label>
                <!-- Ubah name="biaya" menjadi name="harga" di bawah ini -->
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('programs.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <button type="submit" class="btn btn-success px-4 fw-semibold">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
