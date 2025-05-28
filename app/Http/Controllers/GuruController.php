<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $data['guru'] = Guru::get();
        return view('guru.index', $data);
    }

    public function create()
    {
        $data['guru'] = User::pluck('name', 'id');
        return view('guru.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nip' => 'required|max:255',
            'nama_guru' => 'required|max:150',
            'jabatan' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);
        
        $user = new User();
        $user->name = $validate['nama_guru'];
        $user->username = $validate['username'];
        $user->password = Hash::make('konseling25');
        $user->save();

        $guru = Guru::create([

            'nip' => $validate['nip'],
            'nama_guru' => $validate['nama_guru'],
            'jabatan' => $validate['jabatan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        if ($validate['jabatan'] == 'Wali Kelas X' || $validate['jabatan'] == 'Wali Kelas XI' || $validate['jabatan'] == 'Wali Kelas XII') {
            $user->assignRole('WaliKelas');    
        } elseif ($validate['jabatan'] == 'Guru BK') {
            $user->assignRole('BK');
        } elseif ($validate['jabatan'] == 'Kepala Sekolah') {
            $user->assignRole('KepalaSekolah');
        } elseif ($validate['jabatan'] == 'Guru Pengajar') {
            $user->assignRole('GuruPengajar');
        }

        // $user->assignRole('Guru');


        $notification = array(
            'message' => "Data guru berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('guru.index')->with($notification);
    }

    public function edit(string $id_guru, string $id)
    {
        $data['guru'] = Guru::findOrFail($id_guru);
        $data['user'] = Guru::findOrFail($id);
    
        return view('guru.edit', $data);
    }
    
    public function update(Request $request, string $id_guru)
    {
        // $guru = Guru::findOrFail($id_guru);

        $validate = $request->validate([
            'username' => 'required|max:255',
            'nip' => 'required|max:255',
            'nama_guru' => 'required|max:150',
            'jabatan' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);

        $guru = Guru::findOrFail($id_guru);
        $user = User::find($guru->id_user);

        $user->name = $validate['nama_guru'];
        $user->username = $validate['username'];
        $user->save();

        $user->update([
            'username' => $validate['username'],
            'name' => $validate['nama_guru'],
        ]);

        $guru->update([
            'nip' => $validate['nip'],
            'nama_guru' => $validate['nama_guru'],
            'jabatan' => $validate['jabatan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $notificaton = array(
            'message' => 'Data guru berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('guru.index')->with($notificaton);
    }
    public function destroy(string $id_guru)
    {
        $guru = Guru::findOrFail($id_guru);

        $guru->delete();

        $notificaton = array(
            'message' => 'Data guru berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('guru.index')->with($notificaton);
    }

}