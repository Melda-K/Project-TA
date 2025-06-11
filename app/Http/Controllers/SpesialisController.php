<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Spesialis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SpesialisController extends Controller
{
    public function index()
    {
        $data['spesialis'] = Spesialis::get();
        return view('spesialis.index', $data);
    }

    public function create()
    {
        $data['spesialis'] = User::pluck('name', 'id');
        return view('spesialis.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nama' => 'required|max:150',
            'spesialis' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);
        
        $user = new User();
        $user->name = $validate['nama'];
        $user->username = $validate['username'];
        $user->password = Hash::make('konseling25');
        $user->save();

        $spesialis = Spesialis::create([

            'nama' => $validate['nama'],
            'spesialis' => $validate['spesialis'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $notification = array(
            'message' => "Data spesialis kejiwaan berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('spesialis.index')->with($notification);
    }

    public function edit(string $id_spesialis_kejiwaan, string $id)
    {
        $data['spesialis'] = Spesialis::findOrFail($id_spesialis_kejiwaan);
        $data['user'] = Spesialis::findOrFail($id);
    
        return view('spesialis.edit', $data);
    }
    
    public function update(Request $request, string $id_spesialis_kejiwaan)
    {
        
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nama' => 'required|max:150',
            'spesialis' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);

        $spesialis = Spesialis::findOrFail($id_spesialis_kejiwaan);
        $user = User::find($spesialis->id_user);

        $user->name = $validate['nama'];
        $user->username = $validate['username'];
        $user->save();

        $user->update([
            'username' => $validate['username'],
            'name' => $validate['nama'],
        ]);

        $spesialis->update([
            'nama' => $validate['nama'],
            'spesialis' => $validate['spesialis'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $notificaton = array(
            'message' => 'Data spesialis kejiwaan berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('spesialis.index')->with($notificaton);
    }
    public function destroy(string $id_spesialis_kejiwaan)
    {
        $spesialis = Spesialis::findOrFail($id_spesialis_kejiwaan);

        $spesialis->delete();

        $notificaton = array(
            'message' => 'Data spesialis kejiwaan berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('spesialis.index')->with($notificaton);
    }

}