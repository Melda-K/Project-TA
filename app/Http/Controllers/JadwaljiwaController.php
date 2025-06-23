<?php

namespace App\Http\Controllers;

use App\Models\Jadwaljiwa;
use App\Models\Spesialis;
use Illuminate\Http\Request;

class JadwaljiwaController extends Controller
{
    public function index()
    {
        $data['jadwaljiwa'] = Jadwaljiwa::get();
        return view('jadwaljiwa.index', $data);
    }

    public function create()
    {
        $spesialis_kejiwaans = Spesialis::all();
        return view('jadwaljiwa.create', compact('spesialis_kejiwaans'));
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kategori_jadwal' => 'required',
            'hari' => 'required|max:150',
            'jam' => 'required|max:150',
            'id_spesialis_kejiwaan' => 'required',
        ]);

        Jadwaljiwa::create([
            'kategori_jadwal' => $validate['kategori_jadwal'],
            'hari' => $validate['hari'],
            'jam' => $validate['jam'],
            'id_spesialis_kejiwaan' => $validate['id_spesialis_kejiwaan'],
        ]);


        $notification = array(
            'message' => "Data jadwal spesialis berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('jadwaljiwa.index')->with($notification);
    }

    public function edit(string $id_jadwaljiwa, string $id)
    {
        $data['jadwaljiwa'] = Jadwaljiwa::findOrFail($id_jadwaljiwa);
        return view('jadwaljiwa.edit', $data);
    }

    public function update(Request $request, string $id_jadwaljiwa)
    {
        $validate = $request->validate([
            'kategori_jadwal' => 'required',
            'hari' => 'required|max:150',
            'jam' => 'required|max:150',
            'id_spesialis_kejiwaan' => 'required',
        ]);

        $jadwalbk = Jadwaljiwa::findOrFail($id_jadwaljiwa);
        
        $jadwalbk->update([
            'kategori_jadwal' => $validate['kategori_jadwal'],
            'hari' => $validate['hari'],
            'jam' => $validate['jam'],
            'id_spesialis_kejiwaan' => $validate['id_spesialis_kejiwaan'],
        ]);

        $notificaton = array(
            'message' => 'Data jadwal spesialis berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwaljiwa.index')->with($notificaton);
    }
    public function destroy(string $id_jadwaljiwa)
    {
        $jadwaljiwa = Jadwaljiwa::findOrFail($id_jadwaljiwa);

        $jadwaljiwa->delete();

        $notificaton = array(
            'message' => 'Data jadwal spesialis berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwaljiwa.index')->with($notificaton);
    }
}
