<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data program berhasil diambil',
            'data' => Program::all(),
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
        ]);

        $program = Program::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Program berhasil ditambahkan',
            'data' => $program,
        ], 201);
    }

    public function show($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => false,
                'message' => 'Program tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail program',
            'data' => $program,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => false,
                'message' => 'Program tidak ditemukan',
            ], 404);
        }

        $program->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Program berhasil diupdate',
            'data' => $program,
        ], 200);
    }

    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => false,
                'message' => 'Program tidak ditemukan',
            ], 404);
        }

        $program->delete();

        return response()->json([
            'status' => true,
            'message' => 'Program berhasil dihapus',
        ], 200);
    }
}
