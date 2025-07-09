<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use Illuminate\Http\Request;

class SpController extends Controller
{
    public function index()
    {
        $data['sp'] = Sp::get();
        return view('sp.index', $data);
    }

    public function create()
    {
        $data['sp'] = Sp::pluck('name', 'id');
        return view('sp.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'jenis_sp' => 'required|max:100',
            'dokumen_sp' => 'required|mimes:pdf|max:2048',
            'id_siswa' => 'required|integer|max:100',
        ]);

        if ($request->hasFile('dokumen_sp')) {
            $filename = 'dokumen_sp' . time() . '.' . $request->file('dokumen_sp')->extension();
            $path = $request->file('dokumen_sp')->storeAs('public/dokumen_sp', $filename);
            $validate['dokumen_sp'] = basename($path);
        }


        $sp = Sp::create([
            'tanggal' => $validate['tanggal'],
            'jenis_sp' => $validate['jenis_sp'],
            'dokumen_sp' => $validate['dokumen_sp']  ?? null,
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notification = array(
            'message' => "Data SP berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('sp.index')->with($notification);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id_sp)
    {
        $data['sp'] = Sp::findOrFail($id_sp);
        return view('karier.edit', $data);
    }

    public function update(Request $request, string $id_sp)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'jenis_sp' => 'required|max:100',
            'dokumen_sp' => 'required|mimes:pdf|max:2048',
            'id_siswa' => 'required',
        ]);

        // Panggil data SP terlebih dahulu
        $sp = Sp::findOrFail($id_sp);

        if ($request->hasFile('dokumen_sp')) {
            // Hapus file lama jika ada
            if ($sp->dokumentasi != null) {
                \Illuminate\Support\Facades\Storage::delete('public/dokumen_sp/' . $sp->dokumen_sp);
            }

            // Simpan file baru
            $filename = 'dokumen_sp' . time() . '.' . $request->file('dokumen_sp')->extension();
            $path = $request->file('dokumen_sp')->storeAs('public/dokumen_sp', $filename);
            $validate['dokumen_sp'] = basename($path);
        }

        // Update data
        $sp->update([
            'tanggal' => $validate['tanggal'],
            'jenis_sp' => $validate['jenis_sp'],
            'dokumentasi' => $validate['dokumentasi'] ?? $sp->dokumentasi,
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notification = [
            'message' => 'Data SP berhasil diperbaharui',
            'alert-type' => 'success'
        ];

        return redirect()->route('sp.index')->with($notification);
    }


    public function destroy(string $id_sp)
    {
        $sp = Sp::findOrFail($id_sp);
        Storage::delete('public/dokumen_sp/' . $sp->dokumen_sp);

        $sp->delete();

        $notificaton = array(
            'message' => 'Data SP berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('sp.index')->with($notificaton);
    }
}
