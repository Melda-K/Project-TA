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
            'dokumen_sp' => 'required|max:255',
            'id_siswa' => 'required',
        ]);

        $sp = Sp::create([
            'tanggal' => $validate['tanggal'],
            'jenis_sp' => $validate['jenis_sp'],
            'dokumen_sp' => $validate['dokumen_sp'],
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
            'dokumen_sp' => 'required|max:255',
            'id_siswa' => 'required',
        ]);

        $sp = Sp::findOrFail($id_sp);

        $sp->update([
            'tanggal' => $validate['tanggal'],
            'jenis_sp' => $validate['jenis_sp'],
            'dokumen_sp' => $validate['dokumen_sp'],
            'id_siswa' => $validate['id_siswa'],
        ]);

        $notificaton = array(
            'message' => 'Data SP berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('sp.index')->with($notificaton);
    }

    public function destroy(string $id_sp)
    {
        $sp = Sp::findOrFail($id_sp);

        $sp->delete();

        $notificaton = array(
            'message' => 'Data SP berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('sp.index')->with($notificaton);
    }
}
