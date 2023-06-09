<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6); 
        return view('mahasiswa.index', compact('posts')); 
        with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required', 
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
            'No_Handphone' => 'required', 
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index') 
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim); 
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim); 
        return view('mahasiswas.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Nim)
    {
        $validateData = $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required', 
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
            'No_Handphone' => 'required', 
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        Mahasiswa::where('Nim', $Nim)->update($validateData);

        return redirect()->route('mahasiswa.index') 
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Nim)
    {
        $Mahasiswa = Mahasiswa::where('Nim', $Nim)->delete();
        return redirect()->route('mahasiswa.index') 
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    
}
