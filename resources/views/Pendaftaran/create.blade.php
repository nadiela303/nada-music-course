@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Tambah Pendaftaran Kursus</h3>
        <form action="{{ route('pendaftarans.store') }}" method="POST">
            @csrf

            <!-- Pilihan Siswa -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan Program Kursus -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Program</label>
                <select name="program_id" class="form-control" required>
                    <option value="">-- Pilih Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pendaftaran -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pendaftaran</label>
                <input type="date" name="tanggal_daftar" class="form-control" required>
            </div>

            <!-- Status Pendaftaran -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('pendaftarans.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <button type="submit" class="btn btn-success px-4 fw-semibold">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
