<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'no_hp'      => 'required|string|max:15',
            'alamat'     => 'required|string',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'no_hp'      => 'required|string|max:15',
            'alamat'     => 'required|string',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
