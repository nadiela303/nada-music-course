<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranApiController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['siswa', 'program'])->latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar data pendaftaran berhasil diambil',
            'data' => $pendaftarans,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'program_id' => 'required|exists:programs,id',
            'tanggal_daftar' => 'nullable|date',
            'tanggal' => 'nullable|date',
            'status' => 'nullable|string|max:50',
        ]);

        $pendaftaran = Pendaftaran::create($validated);
        $pendaftaran->load(['siswa', 'program']);

        return response()->json([
            'status' => true,
            'message' => 'Data pendaftaran berhasil ditambahkan',
            'data' => $pendaftaran,
        ], 201);
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['siswa', 'program'])->find($id);

        if (!$pendaftaran) {
            return response()->json([
                'status' => false,
                'message' => 'Data pendaftaran tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail data pendaftaran',
            'data' => $pendaftaran,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json([
                'status' => false,
                'message' => 'Data pendaftaran tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'siswa_id' => 'sometimes|required|exists:siswas,id',
            'program_id' => 'sometimes|required|exists:programs,id',
            'tanggal_daftar' => 'nullable|date',
            'tanggal' => 'nullable|date',
            'status' => 'nullable|string|max:50',
        ]);

        $pendaftaran->update($validated);
        $pendaftaran->load(['siswa', 'program']);

        return response()->json([
            'status' => true,
            'message' => 'Data pendaftaran berhasil diperbarui',
            'data' => $pendaftaran,
        ], 200);
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json([
                'status' => false,
                'message' => 'Data pendaftaran tidak ditemukan',
            ], 404);
        }

        $pendaftaran->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data pendaftaran berhasil dihapus',
        ], 200);
    }
}
