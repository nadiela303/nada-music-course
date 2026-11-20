@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto mt-4">
    <div class="card shadow border-0 p-4 rounded-4">
        <h3 class="fw-bold mb-4">Edit Data Siswa</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $siswa->no_hp) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('siswas.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <button type="submit" class="btn btn-primary px-4 fw-semibold">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
