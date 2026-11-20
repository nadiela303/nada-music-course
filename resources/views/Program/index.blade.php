@extends('layouts.app')

@section('title', 'Program Kursus Musik')

@section('content')
<div class="card-pastel p-4 position-relative overflow-hidden">
    <span class="position-absolute user-select-none" style="top: 14px; right: 20px; font-size: 1.8rem; color: #8761f5; opacity: 0.14;">♫</span>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 position-relative">
        <div>
            <h3 class="fw-bold mb-1" style="color: #3b324c;">
                <span style="color: #7c5dfa;">♫</span> Data Program Kursus Musik
            </h3>
            <p class="text-muted small mb-0">
                Kelola data program dan katalog kelas di Nada Music Course by Diela.
            </p>
        </div>

        <a href="{{ route('programs.create') }}" class="btn btn-pastel fw-semibold px-3 py-2 rounded-3">
            + Tambah Program
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 px-3 small rounded-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Program --}}
    <div class="table-responsive position-relative mb-4">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Program</th>
                    <th>Deskripsi</th>
                    <th style="width: 170px;">Biaya / Harga</th>
                    <th style="width: 155px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $index => $program)
                @php
                    $namaProgram = $program->nama_program ?? $program->nama ?? '-';
                    $deskripsi = $program->deskripsi ?? $program->keterangan ?? '-';
                    $harga = $program->harga ?? $program->biaya ?? null;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #f1ecff; color: #6946df; font-size: 0.85rem;">
                            ♪ {{ $namaProgram }}
                        </span>
                    </td>
                    <td class="small text-muted" style="line-height: 1.55;">
                        {{ \Illuminate\Support\Str::limit($deskripsi, 100) }}
                    </td>
                    <td>
                        @if(is_numeric($harga))
                            <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #eef9f2; color: #22543d; font-size: 0.84rem;">
                                Rp {{ number_format($harga, 0, ',', '.') }}
                            </span>
                        @elseif($harga)
                            <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #eef9f2; color: #22543d; font-size: 0.84rem;">
                                {{ $harga }}
                            </span>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="{{ route('programs.show', $program->id) }}" class="btn btn-info btn-sm text-white fw-semibold">Detail</a>
                            <div class="d-flex gap-1">
                                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-warning btn-sm text-white fw-semibold flex-fill">Edit</a>
                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin hapus program ini?')">
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
                        Belum ada data program kursus musik. ♫
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Bagian Foto / Katalog Program di Bawah --}}
    <hr class="my-4" style="border-color: #ece5fa;">
    <h5 class="fw-bold mb-3" style="color: #3b324c;">
        <span style="color: #7c5dfa;">♪</span> Galeri Foto Program
    </h5>

    <div class="row g-3">
        @forelse($programs as $program)
        @php
            $namaProgram = $program->nama_program ?? $program->nama ?? '-';
            $deskripsi = $program->deskripsi ?? $program->keterangan ?? '';
            $harga = $program->harga ?? $program->biaya ?? null;
            $fotoField = $program->foto ?? $program->gambar ?? $program->image ?? null;

            $fotoUrl = null;

            if ($fotoField) {
                $cleanField = ltrim((string) $fotoField, '/');
                if (str_starts_with($cleanField, 'http')) {
                    $fotoUrl = $cleanField;
                } elseif (file_exists(public_path($cleanField))) {
                    $fotoUrl = asset($cleanField);
                } elseif (file_exists(public_path('images/' . basename($cleanField)))) {
                    $fotoUrl = asset('images/' . basename($cleanField));
                } elseif (file_exists(public_path('storage/' . $cleanField))) {
                    $fotoUrl = asset('storage/' . $cleanField);
                }
            }

            if (!$fotoUrl) {
                $namaLower = strtolower($namaProgram);
                $mapFoto = [
                    'guitar' => 'guitar.jpg',
                    'gitar'  => 'guitar.jpg',
                    'choir'  => 'choir.jpg',
                    'vocal'  => 'vocal.jpg',
                    'vokal'  => 'vocal.jpg',
                    'piano'  => 'piano.jpg',
                ];

                foreach ($mapFoto as $kataKunci => $namaFile) {
                    if (str_contains($namaLower, $kataKunci) && file_exists(public_path('images/' . $namaFile))) {
                        $fotoUrl = asset('images/' . $namaFile);
                        break;
                    }
                }
            }
        @endphp
        <div class="col-md-6 col-lg-3">
            <div class="border rounded-4 overflow-hidden h-100 bg-white" style="border-color: #ece5fa !important;">
                @if($fotoUrl)
                    <img src="{{ $fotoUrl }}" alt="{{ $namaProgram }}" class="w-100" style="height: 150px; object-fit: cover;">
                @else
                    <div class="w-100 d-flex align-items-center justify-content-center" style="height: 150px; background-color: #f6f2ff; color: #7c5dfa; font-size: 2rem;">
                        🎶
                    </div>
                @endif
                <div class="p-3">
                    <div class="fw-bold mb-1" style="color: #3b324c;">{{ $namaProgram }}</div>
                    @if(is_numeric($harga))
                        <div class="small fw-semibold mb-1" style="color: #6946df;">Rp {{ number_format($harga, 0, ',', '.') }}</div>
                    @endif
                    <div class="text-muted small">{{ \Illuminate\Support\Str::limit($deskripsi, 70) }}</div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-muted small">Belum ada foto program untuk ditampilkan.</div>
        @endforelse
    </div>
</div>
@endsection
