<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelanggaranController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        if (Auth::check()) {
            $userRole = Auth::user()->roles->first()->name;

            if ($userRole == 'Siswa') {
                $siswa = Siswa::where('id_user', $userId)->first();

                if ($siswa) {
                    $pelanggaran = Pelanggaran::with('siswa', 'guru')
                        ->select(
                            'pelanggarans.id_pelanggaran',
                            'pelanggarans.id_siswa',
                            'pelanggarans.id_guru',
                            'pelanggarans.tanggal',
                            'pelanggarans.point_pelanggaran',
                            'pelanggarans.keterangan',
                            'pelanggarans.jmlh_pelanggaran',
                            'pelanggarans.saldo_pelanggaran'
                        )
                        ->join(DB::raw('(
                    SELECT id_siswa, MAX(id_pelanggaran) as max_id
                    FROM pelanggarans
                    GROUP BY id_siswa
                    ) as p2'), function ($join) {
                            $join->on('pelanggarans.id_pelanggaran', '=', 'p2.max_id');
                        })
                        ->get();

                    $data['pelanggarans'] = $pelanggaran;
                    return view('pelanggaran.index', $data);
                }
            } else {
                $pelanggaran = Pelanggaran::with('siswa', 'guru')
                    ->select(
                        'pelanggarans.id_pelanggaran',
                        'pelanggarans.id_siswa',
                        'pelanggarans.id_guru',
                        'pelanggarans.tanggal',
                        'pelanggarans.point_pelanggaran',
                        'pelanggarans.keterangan',
                        'pelanggarans.jmlh_pelanggaran',
                        'pelanggarans.saldo_pelanggaran'
                    )
                    ->join(DB::raw('(
                    SELECT id_siswa, MAX(id_pelanggaran) as max_id
                    FROM pelanggarans
                    GROUP BY id_siswa
                    ) as p2'), function ($join) {
                        $join->on('pelanggarans.id_pelanggaran', '=', 'p2.max_id');
                    })
                    ->get();

                $data['pelanggarans'] = $pelanggaran;
                return view('pelanggaran.index', $data);
            }
        }
    }


    public function create()
    {
        $data['pelanggarans'] = Pelanggaran::all();
        return view('pelanggaran.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'point_pelanggaran' => 'required|max:100',
            'jmlh_pelanggaran' => 'required|max:100',
            'keterangan' => 'required|max:100',
            'id_siswa' => 'required',
            'id_guru' => 'required',
        ]);

        // $saldo = 0;
        // $hasil = $saldo + $validate['jmlh_pelanggaran'];
        // $id_siswa = $validate['id_siswa'];

        $id_siswa = $validate['id_siswa'];
        $saldoSebelumnya = Pelanggaran::where('id_siswa', $id_siswa)
            ->latest()
            ->first()
            ->saldo_pelanggaran ?? 0;
        $hasil = $saldoSebelumnya + $validate['jmlh_pelanggaran'];

        $pelanggaran = Pelanggaran::create([

            'tanggal' => $validate['tanggal'],
            'point_pelanggaran' => $validate['point_pelanggaran'],
            'jmlh_pelanggaran' => $validate['jmlh_pelanggaran'],
            'saldo_pelanggaran' => $hasil,
            'keterangan' => $validate['keterangan'],
            'id_siswa' => $validate['id_siswa'],
            'id_guru' => $validate['id_guru'],
        ]);

        $notification = array(
            'message' => "Data pelanggran siswa berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('pelanggaran.index')->with($notification);
    }

    public function edit(string $id_pelanggaran)
    {
        $data['pelanggaran'] = Pelanggaran::findOrFail($id_pelanggaran);
        $data['pelanggarans'] = Pelanggaran::all();

        return view('pelanggaran.edit', $data);
    }

    public function update(Request $request, string $id_pelanggaran)
    {
        $pelanggaran = Pelanggaran::findOrFail($id_pelanggaran);

        $validate = $request->validate([
            'tanggal' => 'required|max:255',
            'point_pelanggaran' => 'required|max:100',
            'jmlh_pelanggaran' => 'required|max:100',
            'keterangan' => 'required|max:100',
            'id_siswa' => 'required',
            'id_guru' => 'required',
        ]);

        $id_siswa = $validate['id_siswa'];
        $saldoSebelumnya = Pelanggaran::where('id_siswa', $id_siswa)
            ->latest()
            ->first()
            ->saldo_pelanggaran ?? 0;
        $hasil = $saldoSebelumnya + $validate['jmlh_pelanggaran'];


        $pelanggaran->update([
            'tanggal' => $validate['tanggal'],
            'point_pelanggaran' => $validate['point_pelanggaran'],
            'jmlh_pelanggaran' => $validate['jmlh_pelanggaran'],
            'saldo_pelanggaran' => $hasil,
            'keterangan' => $validate['keterangan'],
            'id_siswa' => $validate['id_siswa'],
            'id_guru' => $validate['id_guru'],
        ]);

        $notificaton = array(
            'message' => 'Data pelanggaran siswa berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('pelanggaran.index')->with($notificaton);
    }
    public function destroy(string $id_pelanggaran)
    {
        $pelanggaran = Pelanggaran::findOrFail($id_pelanggaran);

        $pelanggaran->delete();

        $notificaton = array(
            'message' => 'Data pelanggaran siswa berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('pelanggaran.index')->with($notificaton);
    }

    public function show($id_pelanggaran)
    {
        $pelanggaran = Pelanggaran::with('siswa')->findOrFail($id_pelanggaran);
        $siswa = $pelanggaran->siswa;

        return view('pelanggaran.detail', compact('pelanggaran', 'siswa'));
    }
}
