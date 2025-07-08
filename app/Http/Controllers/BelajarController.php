<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $data['belajar'] = Belajar::get();
        return view('belajar.index', $data);
    }

    public function create()
    {
        $data['belajar'] = Belajar::pluck('name', 'id');
        return view('belajar.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:150',
            'permasalahan' => 'required|max:255',
            'mapel' => 'required|max:100',
            'keterangan' => 'required|max:150',
            'id_guru' => 'required',
            'id_siswa' => 'required',
        ]);

        $belajar = Belajar::create([
            'tanggal' => $validate['tanggal'],
            'permasalahan' => $validate['permasalahan'],
            'mapel' => $validate['mapel'],
            'keterangan' => $validate['keterangan'],
            'id_guru' => $validate['id_guru'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notification = array(
            'message' => "Data BK-Belajar berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('belajar.index')->with($notification);
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id_belajar, string $id)
    {
        $data['belajar'] = Belajar::findOrFail($id_belajar);
        return view('belajar.edit', $data);
    }

    public function update(Request $request, string $id_jadwal)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:150',
            'permasalahan' => 'required|max:255',
            'mapel' => 'required|max:100',
            'keterangan' => 'required|max:150',
            'id_guru' => 'required',
            'id_siswa' => 'required',
        ]);

        $belajar = Belajar::findOrFail($id_jadwal);

        $belajar->update([
            'tanggal' => $validate['tanggal'],
            'permasalahan' => $validate['permasalahan'],
            'mapel' => $validate['mapel'],
            'keterangan' => $validate['keterangan'],
            'id_guru' => $validate['id_guru'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notificaton = array(
            'message' => 'Data BK-Belajar berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('belajar.index')->with($notificaton);
    }

    public function destroy(string $id_belajar)
    {
        $belajar = Belajar::findOrFail($id_belajar);

        $belajar->delete();

        $notificaton = array(
            'message' => 'Data BK-Belajar berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('belajar.index')->with($notificaton);
    }
}
