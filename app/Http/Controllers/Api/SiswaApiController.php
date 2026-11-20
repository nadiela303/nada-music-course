<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaApiController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar data siswa berhasil diambil',
            'data' => $siswas,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'sometimes|required_without:nama|string|max:255',
            'nama' => 'sometimes|required_without:nama_siswa|string|max:255',
            'no_hp' => 'nullable|string|max:30',
            'telepon' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
        ]);

        $siswa = Siswa::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa,
        ], 201);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail data siswa',
            'data' => $siswa,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'nama_siswa' => 'sometimes|required|string|max:255',
            'nama' => 'sometimes|required|string|max:255',
            'no_hp' => 'nullable|string|max:30',
            'telepon' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
        ]);

        $siswa->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa,
        ], 200);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        $siswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data siswa berhasil dihapus',
        ], 200);
    }
}
