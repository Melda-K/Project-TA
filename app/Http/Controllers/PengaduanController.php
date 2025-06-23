<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelanggaran;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $data['pengaduan'] = Pengaduan::get();
        return view('pengaduan.index', $data);
    }

    public function create()
    {
        // $data['pengaduan'] = Pengaduan::pluck('name', 'id');
        // return view('pengaduan.create', $data);
        $gurus = Guru::all();
        return view('pengaduan.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggal_pengaduan' => 'required|date',
            'guru_id' => 'required|exists:gurus,id',
            'jenis_pengaduan' => 'required|string',
            'isi_keluhan' => 'required|string',
            'dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $filePath = null;
        if ($request->hasFile('dokumentasi')) {
            $filePath = $request->file('dokumentasi')->store('dokumentasi', 'public');
        }

        Pengaduan::create([
            'nama' => $request->nama,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            'guru_id' => $request->guru_id,
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'isi_keluhan' => $request->isi_keluhan,
            'dokumentasi' => $filePath,
        ]);

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim!');
    }
    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
