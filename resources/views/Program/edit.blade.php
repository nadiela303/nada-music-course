@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Edit Program Kursus</h3>
        <form action="{{ route('programs.update', $program->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Program</label>
                <input type="text" name="nama_program" class="form-control" value="{{ $program->nama_program }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $program->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Biaya (Rp)</label>
                <input type="number" name="harga" class="form-control" value="{{ $program->harga }}" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('programs.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <button type="submit" class="btn btn-primary px-4 fw-semibold">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
