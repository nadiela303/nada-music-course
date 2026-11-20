<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('program.index', compact('programs'));
    }

    public function create()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric',
        ]);

        Program::create($request->all());

        return redirect()->route('programs.index')->with('success', 'Data program kursus berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('program.show', compact('program'));
    }

    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('program.edit', compact('program'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('programs.index')->with('success', 'Data program kursus berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Data program kursus berhasil dihapus!');
    }
}
