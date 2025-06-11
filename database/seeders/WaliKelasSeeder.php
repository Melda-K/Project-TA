<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'WaliKelas','guard_name' => 'web',]);
                $data = [
                    [
                        'username' => 'Imas',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Hj.Imas Hartina, S.P',
                        'jabatan' => 'Wali Kelas ATPH',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'username' => 'Diyah',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Diyah Widyawati, S.Hut., M.P',
                        'jabatan' => 'Wali Kelas ATPH',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'username' => 'Meli',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Meli Sugiasih, S.Pd., M.MPd',
                        'jabatan' => 'Wali Kelas APHP',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'username' => 'Ahmad',
                        'password' => Hash::make('konseling25'),
                        'nip' => '198309192010011011',
                        'nama_guru' => 'Ahmad Irsan S, S.Pd',
                        'jabatan' => 'Wali Kelas XI APHP 2',
                        'jenis_kelamin' =>'L',
                    ],
                    [
                        'username' => 'Rusli',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Rusli Haruna, S.Kom',
                        'jabatan' => 'Wali Kelas XII TKJ 4',
                        'jenis_kelamin' =>'L',
                    ],
                ];
        
                foreach ($data as $item) {
                    $user = User::create([
                        'name' => $item['nama_guru'],
                        'username' => $item['username'],
                        'password' => $item['password'],
                    ]);
        
                    DB::table('gurus')->insert([
                        [
                            'nip' => $item['nip'],
                            'nama_guru' => $item['nama_guru'],
                            'jabatan' => $item['jabatan'],
                            'jenis_kelamin' => $item['jenis_kelamin'],
                            'id_user' => $user->id,
                        ],
                    ]);
        
                    $user->assignRole('WaliKelas');
                }
    }
}