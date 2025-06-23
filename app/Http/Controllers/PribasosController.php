<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pribadi;
use App\Models\Pribados;
use App\Models\Pribasos;
use App\Models\Spesialis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PribasosController extends Controller
{
    public function index()
    {
        $data['pribasos'] = Pribasos::get();
        return view('pribasos.index', $data);
    }

    public function create()
    {
        $data['pribasos'] = Pribasos::pluck('name', 'id');
        return view('pribasos.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:150',
            'permasalahan' => 'required|max:255',
            'penyelesaian' => 'required|max:255',
            'id_guru' => 'required',
            'id_siswa' => 'required',
            'id_pelanggaran' => 'required',
        ]);

        $pribados = Pribasos::create([

            'tanggal' => $validate['tanggal'],
            'permasalahan' => $validate['permasalahan'],
            'penyelesaian' => $validate['penyelesaian'],
            'id_guru' => $validate['id_guru'],
            'id_siswa' => $validate['id_siswa'],
            'id_pelanggaran' => $validate['id_pelanggaran'],
        ]);

        $notification = array(
            'message' => "Data BK- Pribadi/Sosial berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('pribados.index')->with($notification);
    }

    public function edit(string $id_pribadi, string $id)
    {
        $data['pribados'] = Pribasos::findOrFail($id_pribadi);
        return view('pribados.edit', $data);
    }

    public function update(Request $request, string $id_pribadi)
    {

        $validate = $request->validate([
            'tanggal' => 'required|max:150',
            'permasalahan' => 'required|max:255',
            'penyelesaian' => 'required|max:255',
            'id_guru' => 'required',
            'id_siswa' => 'required',
            'id_pelanggaran' => 'required',
        ]);

        $pribados = Pribasos::findOrFail($id_pribadi);

        $pribados->update([
            'tanggal' => $validate['tanggal'],
            'permasalahan' => $validate['permasalahan'],
            'penyelesaian' => $validate['penyelesaian'],
            'id_guru' => $validate['id_guru'],
            'id_siswa' => $validate['id_siswa'],
            'id_pelanggaran' => $validate['id_pelanggaran'],
        ]);

        $notificaton = array(
            'message' => 'Data BK- Pribadi/Sosial berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('pribados.index')->with($notificaton);
    }
    public function destroy(string $id_pribadi)
    {
        $pribados = Pribasos::findOrFail($id_pribadi);

        $pribados->delete();

        $notificaton = array(
            'message' => 'Data BK-Pribadi/Sosial berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('pribados.index')->with($notificaton);
    }
}
