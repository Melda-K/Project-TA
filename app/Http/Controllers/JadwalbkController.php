<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'id_guru' => 'required',
        ]);

        $jadwalbk = Jadwal::create([
            'hari' => $validate['hari'],
            'id_guru' => $validate['id_guru'],
        ]);

        $notification = array(
            'message' => "Data jadwal BK berhasil ditambahkan",
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
            'id_guru' => 'required',
        ]);

        $jadwalbk = Jadwal::findOrFail($id_jadwal);

        $jadwalbk->update([
            'hari' => $validate['hari'],
            'id_guru' => $validate['id_guru'],
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
            'message' => 'Data jadwal BK berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwalbk.index')->with($notificaton);
    }
}
