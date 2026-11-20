@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Edit Pendaftaran Kursus</h3>
        <form action="{{ route('pendaftarans.update', $pendaftaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Pilihan Siswa -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $pendaftaran->siswa_id == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama_siswa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan Program Kursus (Ditambahkan kembali agar muncul) -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Program</label>
                <select name="program_id" class="form-control" required>
                    <option value="">-- Pilih Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}" {{ $pendaftaran->program_id == $program->id ? 'selected' : '' }}>
                            {{ $program->nama_program }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pendaftaran -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pendaftaran</label>
                <input type="date" name="tanggal_daftar" value="{{ $pendaftaran->tanggal_daftar }}" class="form-control" required>
            </div>

            <!-- Status Pendaftaran -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Aktif" {{ $pendaftaran->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Selesai" {{ $pendaftaran->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('pendaftarans.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <button type="submit" class="btn btn-success fw-semibold px-4">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
