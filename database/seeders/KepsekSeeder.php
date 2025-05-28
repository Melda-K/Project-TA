<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KepsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'KepalaSekolah',
            'guard_name' => 'web'
        ]);
        
        $data = [
            [
                'username' => 'Nandang',
                'password' => Hash::make('konseling25'),
                'nip' => '197401212006041008',
                'nama_guru' => 'Nandang Jauharudin, S.TP., M.P',
                'jabatan' => 'Kepala Sekolah',
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

            $user->assignRole('KepalaSekolah');
        }
    }
}