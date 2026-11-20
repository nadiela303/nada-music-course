<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['siswa', 'program', 'user'])->latest()->get();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $programs = Program::all();
        return view('pendaftaran.create', compact('siswas', 'programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'       => 'required|exists:siswas,id',
            'program_id'     => 'required|exists:programs,id',
            'tanggal_daftar' => 'required|date',
            'status'         => 'required|in:Aktif,Selesai',
        ]);

        Pendaftaran::create([
            'siswa_id'       => $request->siswa_id,
            'program_id'     => $request->program_id,
            'user_id'        => Auth::id(),
            'tanggal_daftar' => $request->tanggal_daftar,
            'status'         => $request->status,
        ]);

        return redirect()->route('pendaftarans.index')->with('success', 'Data Pendaftaran berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::with(['siswa', 'program', 'user'])->findOrFail($id);
        return view('pendaftaran.show', compact('pendaftaran'));
    }

    public function edit(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $siswas = Siswa::all();
        $programs = Program::all();
        return view('pendaftaran.edit', compact('pendaftaran', 'siswas', 'programs'));
    }

    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'siswa_id'       => 'required|exists:siswas,id',
            'program_id'     => 'required|exists:programs,id',
            'tanggal_daftar' => 'required|date',
            'status'         => 'required|in:Aktif,Selesai',
        ]);

        $pendaftaran->update([
            'siswa_id'       => $request->siswa_id,
            'program_id'     => $request->program_id,
            'tanggal_daftar' => $request->tanggal_daftar,
            'status'         => $request->status,
        ]);

        return redirect()->route('pendaftarans.index')->with('success', 'Data Pendaftaran berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftarans.index')->with('success', 'Data Pendaftaran berhasil dihapus!');
    }
}
