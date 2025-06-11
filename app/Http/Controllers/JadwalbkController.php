<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalbkController extends Controller
{

    public function index()
    {
        $data['jadwalbk'] = Jadwal::get();
        return view('jadwalbk.index', $data);
    }

    public function create()
    {
        $data['jadwalbk'] = Jadwal::pluck('name', 'id');
        return view('jadwalbk.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'hari' => 'required|max:150',
            'jam' => 'required|max:150',
            'id_guru' => 'required',
            'id_spesialis_kejiwaan' => 'required',
        ]);

        $jadwalbk = Jadwal::create([
            'hari' => $validate['hari'],
            'jam' => $validate['jam'],
            'id_guru' => $validate['id_guru'],
            'id_spesialis_kejiwaan' => $validate['id_spesialis_kejiwaan'],
        ]);

        $notification = array(
            'message' => "Data jadwal berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('jadwalbk.index')->with($notification);
    }

    public function edit(string $id_jadwal, string $id)
    {
        $data['jadwalbk'] = Jadwal::findOrFail($id_jadwal);
        return view('jadwalbk.edit', $data);
    }

    public function update(Request $request, string $id_jadwal)
    {

        $validate = $request->validate([
            'hari' => 'required|max:150',
            'jam' => 'required|max:150',
            'id_guru' => 'required',
            'id_spesialis_kejiwaan' => 'required',
        ]);

        $jadwalbk = Jadwal::findOrFail($id_jadwal);

        $jadwalbk->update([
            'hari' => $validate['hari'],
            'jam' => $validate['jam'],
            'id_guru' => $validate['id_guru'],
            'id_spesialis_kejiwaan' => $validate['id_spesialis_kejiwaan'],
        ]);

        $notificaton = array(
            'message' => 'Data jadwal BK berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwalbk.index')->with($notificaton);
    }
    public function destroy(string $id_jadwal)
    {
        $jadwalbk = Jadwal::findOrFail($id_jadwal);

        $jadwalbk->delete();

        $notificaton = array(
            'message' => 'Data jadwal berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwalbk.index')->with($notificaton);
    }
}
