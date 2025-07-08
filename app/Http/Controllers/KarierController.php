<?php

namespace App\Http\Controllers;

use App\Models\Karier;
use Illuminate\Http\Request;

class KarierController extends Controller
{
    public function index()
    {
        $data['karier'] = Karier::get();
        return view('karier.index', $data);
    }

    public function create()
    {
        $data['karier'] = Karier::pluck('name', 'id');
        return view('karier.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'kampus' => 'required|max:100',
            'prodi' => 'required|max:100',
            'keterangan' => 'required|max:100',
            'id_siswa' => 'required',
        ]);

        $karier = Karier::create([
            'tanggal' => $validate['tanggal'],
            'kampus' => $validate['kampus'],
            'prodi' => $validate['prodi'],
            'keterangan' => $validate['keterangan'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notification = array(
            'message' => "Data BK-Karier berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('karier.index')->with($notification);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id_karier)
    {
        $data['karier'] = Karier::findOrFail($id_karier);
        return view('karier.edit', $data);
    }

    public function update(Request $request, string $id_karier)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'kampus' => 'required|max:100',
            'prodi' => 'required|max:100',
            'keterangan' => 'required|max:100',
            'id_siswa' => 'required',
        ]);

        $karier = Karier::findOrFail($id_karier);

        $karier->update([
            'tanggal' => $validate['tanggal'],
            'kampus' => $validate['kampus'],
            'prodi' => $validate['prodi'],
            'keterangan' => $validate['keterangan'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notificaton = array(
            'message' => 'Data BK-Karier berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('karier.index')->with($notificaton);
    }

    public function destroy(string $id_karier)
    {
        $karier = Karier::findOrFail($id_karier);

        $karier->delete();

        $notificaton = array(
            'message' => 'Data BK-Karier berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('karier.index')->with($notificaton);
    }
}
