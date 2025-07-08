<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pribadi;
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
            'jenis_konseling' => 'required|max:255',
            'permasalahan' => 'required|max:255',
            'penyelesaian' => 'required|max:255',
            'id_siswa' => 'required',
        ]);

        $pribasos = Pribasos::create([

            'tanggal' => $validate['tanggal'],
            'jenis_konseling' => $validate['jenis_konseling'],
            'permasalahan' => $validate['permasalahan'],
            'penyelesaian' => $validate['penyelesaian'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notification = array(
            'message' => "Data BK- Pribadi/Sosial berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('pribasos.index')->with($notification);
    }

    public function edit(string $id)
    {
        $pribasos = Pribasos::findOrFail($id);
        return view('pribasos.edit', compact('pribasos'));
    }

    public function update(Request $request, string $id_pribasos)
    {

        $validate = $request->validate([
            'tanggal' => 'required|max:150',
            'jenis_konseling' => 'required|max:255',
            'permasalahan' => 'required|max:255',
            'penyelesaian' => 'required|max:255',
            'id_siswa' => 'required',
        ]);

        $pribasos = Pribasos::findOrFail($id_pribasos);

        $pribasos->update([
            'tanggal' => $validate['tanggal'],
            'jenis_konseling' => $validate['jenis_konseling'],
            'permasalahan' => $validate['permasalahan'],
            'penyelesaian' => $validate['penyelesaian'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notificaton = array(
            'message' => 'Data BK- Pribadi/Sosial berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('pribasos.index')->with($notificaton);
    }
    public function destroy(string $id_pribasos)
    {
        $pribasos = Pribasos::findOrFail($id_pribasos);

        $pribasos->delete();

        $notificaton = array(
            'message' => 'Data BK-Pribadi/Sosial berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('pribasos.index')->with($notificaton);
    }
}
